<?php
// (A) DATABASE SETTINGS - CHANGE TO YOUR OWN !
define("DB_HOST", "localhost");
define("DB_NAME", "filmhouse_cinema");
define("DB_CHARSET", "utf8mb4");
define("DB_USER", "phpmyadmin");
define("DB_PASSWORD", "MAD-44W");

// (B) CONNECT TO DATABASE
$pdo = new PDO(
  "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
  DB_USER, DB_PASSWORD, [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NAMED
]);

$stmt = $pdo->prepare("SELECT * FROM `movie_details`");
$stmt->execute();
$movies = $stmt->fetchAll();