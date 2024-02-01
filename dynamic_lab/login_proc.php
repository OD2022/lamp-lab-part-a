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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];  
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT username FROM Users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($username);
        $stmt->fetch();
        $_SESSION['username'] = $username; 
        echo "I logged in succesfully";
        header("Location: ./dashboard.php");
        exit();  
    } else {
        echo "Invalid credentials!";
    }
    $stmt->close();
    $conn->close();
}
?>