<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php';

// Connect to MongoDB
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// Select the database and collection
$database = $mongoClient->selectDatabase('formDB');
$collection = $database->selectCollection('formData');

// Create a unique index on the idNumber field
$collection->createIndex(['idNumber' => 1], ['unique' => true]);

// Validate and process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $idNumber = $_POST["idNumber"];
    $dob = $_POST["dob"];

    // Insert data into MongoDB
    try {
        $result = $collection->insertOne([
            'name' => $name,
            'surname' => $surname,
            'idNumber' => $idNumber,
            'dob' => $dob,
        ]);

        echo json_encode(  "Data saved successfully!");


        exit;
    } catch (MongoDB\Driver\Exception\BulkWriteException $e) {
        // Check for duplicate key error (code 11000)
        if ($e->getCode() == 11000) {
            echo json_encode( "Duplicate ID Number. Please go back and check your input and try again.");
            exit;
        }

        // Handle other MongoDB write errors
        echo json_encode(["error" => "An error occurred. Please try again later."]);
        exit;
    } catch (Exception $e) {
        echo json_encode(["error" => "An unexpected error occurred. Please try again later."]);
        exit;
    }
}

// Validation functions
function validateName($value) {
    //  validation logic for names
    return preg_match("/^[a-zA-Z\s]+$/", $value);
}

function validateIdNumber($value) {
    return preg_match("/^\d{13}$/", $value);
}

function validateDOB($value, $idNumber) {
    $idDob = substr($idNumber, 0, 6);

    if ($idDob !== preg_replace("/[^0-9]/", "", $value)) {
        return false;
    }

    return true;
}
?>
