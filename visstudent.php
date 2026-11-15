<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vis Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Viser alle registerte studenter</h1>

<?php
$sqlSetning = "SELECT * FROM student";
$sql_resultat = mysqli_query($db, $sqlSetning) or 
die("ikke mulig å hente data fra databasen");
$antallRader = mysqli_num_rows($sql_resultat);

print("<table border='1'>");
print("<tr>
        <th align='left'>Brukernavn</th>
        <th align='left'>Fornavn</th>
        <th align='left'>Etternavn</th>
        <th align='left'>Klassekode</th>
    </tr>");

    for ($r = 1; $r <= $antallRader; $r++) {
        $rad = mysqli_fetch_array($sql_resultat);
        $brukernavn = $rad["brukernavn"];
        $fornavn = $rad["fornavn"];
        $etternavn = $rad["etternavn"];
        $klassekode = $rad["klassekode"];

        print("<tr>
        <td>$brukernavn</td>
        <td>$fornavn</td>
        <td>$etternavn</td>
        <td>$klassekode</td>
        </tr>");
    }

    print("</table>");
?>


<div class="knapp">
        <button><a href="index.html">Tilbake til forsiden</a></button>
    </div>
</body>
</html>
