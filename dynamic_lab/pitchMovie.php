<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php"); 
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitch Movie</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
body {
    background-color: #097969;
    color: white;
    font-family: 'Arial', sans-serif;
    margin: 0;
    display: flex;
    flex-direction: column;
}

.container {
    background-color: black;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    width: 60%;
    margin: 1em;
    height: 100%;
}

form {
    display: flex;
    flex-direction: column;
    padding: 3em;
    gap: 2em;
    height: auto;
}


input,
textarea,
select {
    padding: 1em;
    font-size: 0.8em;
    border-radius: 10px;
    border: none;
}

textarea {
    height: 10em;
}

.checkbox-container {
    display: flex;
    gap: 1em;
}

.checkbox-label {
    font-size: 1em;
}

button {
    background-color: transparent;
    color: #fff;
    padding: 10px;
    cursor: pointer;
    border: 1px solid white;
    border-radius: 10px;
    font-size: 16px;
}

button:hover {
    background-color: #45a049;
}

.submit-poster{
    border-radius: 10px;
    background-color: transparent;
    border: 1px solid white;
}
/* (C) NAVIGATION BAR */
nav {
  background: transparent;
  padding: 1em;
  margin-bottom: 2em; /* Added margin beneath the nav bar */
  color: black;
}

ul {
  list-style-type: none;
  display: flex;
  justify-content: space-between;
  margin: 0;
  padding: 0;
}

li {
  display: inline;
}

a {
  text-decoration: none;
  color: white;
  font-weight: bold;
  position: relative;
}

a::after {
  content: '';
  display: block;
  width: 0;
  height: 2px;
  background: white;
  position: absolute;
  bottom: -5px;
  transition: width 0.3s ease;
}

a:hover::after {
  width: 100%;
}

</style>
<body>

<nav>
    <ul>
    <li><a href="./dashboard.php">Home</a></li>
        <li><a href="./login.php">Login</a></li>
        <li><a href="./pitchMovie.php">Pitch Movie</a></li>
        <li><a href="./sign_up.php">Sign Up</a></li>
        <li><a href="./logout.php">Log Out</a></li>
    </ul>
    </nav>

<div class="container">
    <form action="pitchMovieProc.php" method="post">
        <h1>Film Details</h1>

        <input type="text" id="working_title" name="working_title" placeholder="Working Title" required>

        <textarea id="storyline" name="storyline" placeholder="Plot" required></textarea>

        <div class="checkbox-container">
            <span class="checkbox-label">Themes:</span>
            <input type="checkbox" id="action" name="themes[]" value="action">
            <label for="action">Action</label>

            <input type="checkbox" id="drama" name="themes[]" value="drama">
            <label for="drama">Drama</label>

            <input type="checkbox" id="comedy" name="themes[]" value="comedy">
            <label for="comedy">Comedy</label>

            <input type="checkbox" id="sci-fi" name="themes[]" value="sci-fi">
            <label for="sci-fi">Sci-Fi</label>
        </div>

        <select id="budget_range" name="budget_range" required>
            <option value="" disabled selected>Select Budget Max</option>
            <?php
                for ($i = 1; $i <= 10; $i++) {
                    $value = $i * 1000;
                    echo "<option value='$value'>$" . number_format($value) . "</option>";
                }
            ?>
        </select>

        <input type="number" id="number_of_cast" name="number_of_cast" min="1" placeholder="Cast Size" required>

        <input type="number" id="number_of_crew" name="number_of_crew" min="1" placeholder="Crew Size" required>

        <select id="production_time" name="production_time" required>
            <option value="" disabled selected>Estimated Production Time</option>
            <?php
                for ($i = 1; $i <= 24; $i++) {
                    echo "<option value='$i'>$i month" . ($i > 1 ? 's' : '') . "</option>";
                }
            ?>
        </select>

        <button type="submit">Submit</button>
    </form>
</div>


<script src="script.js"></script>
</body>
</html>
