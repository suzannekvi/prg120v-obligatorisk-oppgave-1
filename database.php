<?php
/// henter databaseinfo
$host = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_DATABASE');

// kobler til databasen
$db = mysqli_connect($host, $username, $password, $database);

 // Sjekker tilkoblingen
if (!$db) {
die("Connection failed " . mysqli_connect_error());
} 
?>