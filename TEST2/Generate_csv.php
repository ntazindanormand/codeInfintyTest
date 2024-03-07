<?php

session_start();

if (isset($_POST['num_variations'])) {
    // Get number of rows from form
    $numRows = $_POST['num_variations'];

    // Generate CSV file
    generateCSV($numRows);
    $_SESSION['message'] = "CSV file generated with " . $numRows . " variations.";
    header("Location: index.php");
    exit();
} else {
    // redirect to index.php if no number of rows is specified
    header("Location: index.php");
}


// Function to generate a CSV file
function generateCSV($numRows)
{
	// Set the timezone to the appropriate value
    date_default_timezone_set('UTC');
    // Create arrays of names and surnames
    $names = array("Arteta", "Raya", "Saliba", "Gabriel", "Saliba", "Rice", "Havertz", "Odegaard", "Martinelli", "Jesus", "Saka", "Ramsdale", "White", "Tomiyasu", "Timber", "Elneny", "Trossard", "Nelson", "Emile", "Zincheko");

    $surnames = array("Mikel", "David", "William", "John", "Declan", "Kai", "Martin", "Gabz", "Partey", "Thomas", "Anderson", "Mbappe", "Tamara", "White", "Harris", "Mausey", "Thompson", "klay", "Curry", "Lebron");

    // Check if the output folder exists, if not creates it
    if (!file_exists("output")) {
        mkdir("output");
    }
    // Open file for writing in output folder and with a specific name "output.csv"
    $file = fopen("output/output.csv", "w");

    //  header row
    fputcsv($file, array("Id", "Name", "Surname", "Initials", "Age", "DateOfBirth"));

    // array to store used data
    $usedData = array();

    // Loop to generate specified number of rows
    for ($i = 1; $i <= $numRows; $i++) {
        // Randomly select a name and surname
        $name = $names[array_rand($names)];
        $surname = $surnames[array_rand($surnames)];
        $initials = substr($name, 0, 1);
        // Randomly select an age between 18 and 60
        $age = mt_rand(18, 60);
		// Get the current year
       $currentYear = date('Y');
        // Randomly select month and day
      $month = mt_rand(1, 12);
       $day = mt_rand(1, 28);
		// Calculate the birth year to make the age accurate
      $birthYear = $currentYear - $age;
        // Generate date of birth
      $dateOfBirth = date("Y-m-d", strtotime("$birthYear-$month-$day"));

        // key to check for the data in the hash table
        $key = "$name$surname$initials$age$dateOfBirth";
        //check if the data already exists
        if (array_key_exists($key, $usedData)) {
            $i--;
            continue;
        }
        //add the current data to usedData array
        $usedData[$key] = true;

        // Write data row
        fputcsv($file, array($i, $name, $surname, $initials, $age, $dateOfBirth));
    }

    // Close file
    fclose($file);
}
?>