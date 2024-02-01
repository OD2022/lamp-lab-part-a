<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    body {
        background-color: #000;
        color: #fff;
        font-family: 'Arial', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    form {
        background-color: #333;
        padding: 2em;
        border-radius: 1em;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        width: 40%; 
        display: flex;
        flex-direction: column;
    }

    input {
        width: 90%;
        padding: 1em;
        margin: auto;
        margin-bottom: 1em;
        border: 1px solid #555;
        border-radius: 0.5em;
        background-color: #444;
        color: #fff;
        height: auto;
    }

    input[type="submit"] {
        background-color: #00ff00; 
        color: #fff;
        cursor: pointer;
        width: 90%;
    }

    input[type="submit"]:hover {
        background-color: #009900;
    }

    a {
        color: #007BFF;
        text-decoration: none;
    }
    .companyInfo{
        width: 70%;
        font-family: Helvetica;
        font-size: 0.8em;
    }
</style>
</head>
<body>
    <p>Green Screen Forest - Home of Indie Crowdfunding</p>
    <form action="login_proc.php" method="post">
        <h2>Login</h2>
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
        <p>Don't Have an account?<a href="./sign_up.php">Sign Up</a></p>
    </form>
</body>
</html>
