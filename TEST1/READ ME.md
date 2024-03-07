
# CSV Generator and Importer

This project is a simple web application for generating and importing CSV files into an SQLite database.

## Requirements

- PHP (version 7.2 or higher)
- SQLite extension for PHP
- Web server (e.g., Apache, Nginx)
- Browser with JavaScript enabled

## Installation

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/yourusername/your-repo.git
   cd your-repo
Configure PHP:
Make sure PHP is installed on your server, and the required extensions are enabled. Refer to your server's documentation for PHP configuration.

## Setup SQLite Database:

Create an empty SQLite database file (e.g., db.sqlite3) in the project root.
Ensure the web server has write permissions for the project directory.
Update Database Configuration:
Open import_csv.php and update the database connection settings if necessary.
**composer install**
## Configure Web Server:
Set up your web server to point to the project's public directory. Ensure that URL rewriting is enabled (for clean URLs).

## Access the Application:
Open your browser and navigate to the application URL. For example, http://localhost/your-repo.

## Usage
## CSV Generator:

Access the CSV Generator by visiting the /generate_csv.php URL.
Enter the desired number of variations and click "Generate CSV."
The generated CSV file will be saved in the output directory.
## CSV Importer:

Access the CSV Importer by visiting the /import_csv.php URL.
Choose the CSV file to import using the file input.
Click "Import CSV" to upload and import the file into the SQLite database.
## Troubleshooting
If you encounter any issues during the installation or execution of the application, check the error logs and verify the server and PHP configurations.
