<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vis klasser</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="visning">
<?php
include("database.php");
?>


<h1>Viser alle registerte klasser</h1>

<?php
$sqlSetning = "SELECT * FROM klasse";

$sql_resultat = mysqli_query($db, $sqlSetning) or die("ikke mulig å hente data fra databasen");

$antallRader = mysqli_num_rows($sql_resultat);

print("<table border='1'>");
print("<tr>
        <th align='left'>Klassekode</th>
        <th align='left'>Klassenavn</th>
        <th align='left'>Studiumkode</th>
    </tr>");

for ($r = 1; $r <= $antallRader; $r++) {
    $rad = mysqli_fetch_array($sql_resultat);
    $klassekode = $rad["klassekode"];
    $klassenavn = $rad["klassenavn"];
    $studiumkode = $rad["studiumkode"];

    print("<tr>
    <td>$klassekode</td>
    <td>$klassenavn</td>
    <td>$studiumkode</td>
    </tr>");
}

print("</table>");
?>


    <div class="knapp">
        <button><a href="index.html">Tilbake til forsiden</a></button>
    </div>
    
</div>
</body>
</html>




