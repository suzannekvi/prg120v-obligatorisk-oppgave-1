<?php
$host = "b-studentsql-1.usn.no";
$username = "DITT_BRUKERNAVN";
$password = "DITT_PASSORD";
$database = "DITT_DATABASENAVN";

$db = mysqli_connect($host, $username, $password, $database);

if (!$db) {
    die("Tilkobling feilet: " . mysqli_connect_error());
}

mysqli_set_charset($db, "utf8mb4");

?>
