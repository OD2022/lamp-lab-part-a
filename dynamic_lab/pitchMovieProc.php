<?php


$host = $_ENV['DB_HOST']; 
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'] ;
$dbname = "filmhouse_cinema";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start(); // Start the session

if (isset($_SESSION['username'])) {
    $user_name = $_SESSION['username'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Create a prepared statement
        $stmt = $conn->prepare("INSERT INTO movie_details (working_title, storyline, themes, budget_range, number_of_cast, number_of_crew, production_time, username) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters
        $stmt->bind_param("ssssiiis", $working_title, $storyline, $themes, $budget_range, $number_of_cast, $number_of_crew, $production_time, $user_name);

        // Escape and set values
        $working_title = $_POST['working_title'];
        $storyline = $_POST['storyline'];
        $themes = implode(", ", array_map(function($theme) use ($conn) {
            return mysqli_real_escape_string($conn, $theme);
        }, $_POST['themes']));
        $budget_range = $_POST['budget_range'];
        $number_of_cast = $_POST['number_of_cast'];
        $number_of_crew = $_POST['number_of_crew'];
        $production_time = $_POST['production_time'];

        // Execute the statement
        if ($stmt->execute()) {
            echo "Film details added successfully!";
            header("Location: ./dashboard.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}



?>
