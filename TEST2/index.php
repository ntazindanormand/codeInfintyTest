	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>CSV Generator and Importer</title>
		<style>
			body {
				background-color: #f4f4f4; /* Choose a background color */
				display: flex;
				justify-content: center;
				align-items: center;
				height: 100vh;
				margin: 0;
			}

			.container {
				background-color: #ffffff; /* Choose a container background color */
				padding: 20px;
				border-radius: 10px;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			}

			button {
				background-color: #3498db; /* Choose a button color */
				color: #ffffff;
				padding: 10px 15px;
				border: none;
				border-radius: 5px;
				cursor: pointer;
				margin-top: 10px;
			}
		</style>
	</head>

	<body>
		<?php
		session_start();
		?>
		<div class="container">
			<h1>Data Generator</h1>
			<form action="generate_csv.php" method="post">
				<label for="num_variations">Number of entries:</label>
				<input type="number" id="num_variations" name="num_variations" min="1" required>
				<button type="submit">Generate CSV</button>
			</form>

			<h1>Data Importer</h1>
			<form action="import_csv.php" method="post" enctype="multipart/form-data">
				<label for="file">Select CSV file to import:</label>
				<input type="file" id="file" name="csvFile" accept=".csv" required>
				<button type="submit">Import CSV</button>
			</form>

			<?php
			if (isset($_SESSION['message'])) {
				echo '<p style="color: green; font-weight: bold;">' . $_SESSION['message'] . '</p>';
				unset($_SESSION['message']);
			}
			?>
		</div>
	</body>

	</html>
