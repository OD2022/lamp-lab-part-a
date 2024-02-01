<?php
session_start();

// Database connection details
$host = "localhost"; 
$username = "phpmyadmin";
$password = "MAD-44W"; 
$database = "filmhouse_cinema"; 

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"]; // Hash the password

    // Insert user data into the database
    $sql = "INSERT INTO Users (email, password, username) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $password, $username);


    // Execute the query
    if ($stmt->execute()) {
        header("Location: ./pitchMovie.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
}

$conn->close();
?>
