# Project Description

This project involves creating an HTML form to capture user input and store it in a MongoDB database. The form includes various input fields for collecting data. Upon submission, the data is sent to the MongoDB database.

## Installation

Follow these steps to set up and run the project:

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/your-username/your-repo.git
   cd your-repo
   ```

2. **Install Dependencies:**
   Run Composer to install the required dependencies.
   ```bash
   composer install
   ```

3. **Configure MongoDB Extension:**
   Ensure that the MongoDB extension is uncommented in the PHP ini file. If not installed, download the MongoDB extension suitable for your PHP version and system architecture from [https://pecl.php.net/package/mongodb/](https://pecl.php.net/package/mongodb/).

4. **Create Database and Collection:**
   - MongoDB Database: `formDB`
   - Collection: `formData`

## Usage

1. **Open Local Host Terminal:**
   Open the terminal in the project directory.

2. **Run the Application:**
   Start the local server.
   ```bash
   php -S localhost:{YOUR_PORT_NUMBER}
   ```
   Replace `{YOUR_PORT_NUMBER}` with the desired port, e.g., 8000.

3. **Access the Form:**
   Open your browser and visit [http://localhost:{YOUR_PORT_NUMBER}](http://localhost:{YOUR_PORT_NUMBER}) to use the application.

4. **Submit the Form:**
   Fill in the form and click the "POST" button. A success message will appear if the data is sent successfully. If there's an error, an appropriate error message will be displayed, such as attempting to insert a duplicate ID.

## MongoDB Setup

1. **Install MongoDB:**
   Follow the MongoDB installation guide at [https://docs.mongodb.com/manual/installation/](https://docs.mongodb.com/manual/installation/).

2. **Start MongoDB:**
   Ensure that your MongoDB server is running.

3. **Create Database:**
   Create a new MongoDB database named `formDB`.

4. **Create Collection:**
   Verify the existence of the `formData` collection within the `formDB` database.


