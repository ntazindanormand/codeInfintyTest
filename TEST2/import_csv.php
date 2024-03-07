	<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	// Function to import CSV file into SQLite database
	function importCsvToDatabase($db, $csvFile)
	{
		// Truncate the table before importing
		$db->exec('DELETE FROM csv_import');

		// Import data from CSV file
		$stmt = $db->prepare('
			INSERT INTO csv_import (Name, Surname, Initials, Age, DateOfBirth)
			VALUES (:name, :surname, :initials, :age, :dateOfBirth)
		');

		$file = fopen($csvFile, 'r');
		$header = fgetcsv($file); // Skip the header

		while (($row = fgetcsv($file)) !== false) {
			$params = array_combine($header, $row);
			$stmt->bindValue(':name', $params['Name']);
			$stmt->bindValue(':surname', $params['Surname']);
			$stmt->bindValue(':initials', $params['Initials']);
			$stmt->bindValue(':age', $params['Age']);
			$stmt->bindValue(':dateOfBirth', $params['DateOfBirth']);
			$stmt->execute();
		}

		fclose($file);

		echo "CSV file imported successfully.";
	}

	// Create or open the database
	$db = new SQLite3('db.sqlite3');

	// Create the table
	$db->exec('
		CREATE TABLE IF NOT EXISTS csv_import (
			Id INTEGER PRIMARY KEY,
			Name TEXT,
			Surname TEXT,
			Initials TEXT,
			Age INTEGER,
			DateOfBirth TEXT
		)
	');

	// Check if a file is uploaded
	if (isset($_FILES['csvFile']) && $_FILES['csvFile']['error'] == UPLOAD_ERR_OK) {
		// Import CSV file into database
		importCsvToDatabase($db, $_FILES['csvFile']['tmp_name']);
	} else {
		echo "Error uploading file.";
	}

	// Close the database connection
	$db->close();

	?>
