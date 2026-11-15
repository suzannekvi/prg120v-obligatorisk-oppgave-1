<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slett Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <script src="funksjoner.js"></script>

<h1>Slett student</h1>

<?php
$sqlsetning = "SELECT * FROM student";
$sqlresultat = mysqli_query($db, $sqlsetning)
    or die ("ikke mulig å hente data fra databasen");
$antallRader = mysqli_num_rows($sqlresultat);
?>

<form method="post" action="slettstudent.php"
    id="slettstudent" name="slettstudent"
    onSubmit="return bekreft()">
    brukernavn <select id="brukernavn" name="brukernavn" required>
        <option value="">Velg brukernavn</option>
        
    <?php
    for ($r=1;$r<=$antallRader;$r++)
    {
        $rad = mysqli_fetch_array($sqlresultat);
        $brukernavn = $rad["brukernavn"];
        $fornavn = $rad["fornavn"];
        $etternavn = $rad["etternavn"];
        print("<option value='$brukernavn'>$brukernavn - $fornavn $etternavn</option>");
    }
    ?>
    </select> <br/>
    <input type="submit" value="Slett student"
    id="slettstudentknapp" name="slettstudentknapp"/>
</form>

<?php
if (isset($_POST["slettstudentknapp"]))
{
    $brukernavn = $_POST["brukernavn"];

    // Sjekker om studenten finnes
    $sqlsetning = "SELECT * FROM student WHERE brukernavn='$brukernavn'";
    $sqlresultat = mysqli_query($db, $sqlsetning)
        or die ("ikke mulig å hente data fra databasen");

    $antallRader = mysqli_num_rows($sqlresultat);

    if ($antallRader == 0)
    {
        print("Studenten finnes ikke i databasen");
    }
    else
    {
        // Sletter studenten fra databasen
        $sqlsetning = "DELETE FROM student WHERE brukernavn='$brukernavn'";
        mysqli_query($db, $sqlsetning)
        or die ("ikke mulig å slette data fra databasen");

        print("Studenten med brukernavn: $brukernavn er nå slettet fra databasen");
    }
}
?>

<div class="knapp">
        <button><a href="index.html">Tilbake til forsiden</a></button>
    </div>

</body>
</html>
