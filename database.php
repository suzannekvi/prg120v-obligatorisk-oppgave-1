<?php
// Databaseopplysninger
$host = "b-studentsql-1.usn.no";
$username = "sukvi5012";
$password = "a618sukvi5012";
$database = "sukvi5012";

// Kobler til databasen
$db = mysqli_connect($host, $username, $password, $database);

// Sjekker tilkoblingen
if (!$db) {
    die("Tilkobling feilet: " . mysqli_connect_error());
}

// Setter tegnsett
mysqli_set_charset($db, "utf8mb4");

?>