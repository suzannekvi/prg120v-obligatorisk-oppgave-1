  <!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slett klasse</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="visning">
        
<?php
// Kobler til databasen
include("database.php");
?>

<?php
//henter alle registrerte klasser fra databasen
$sqlsetning= "SELECT * FROM klasse";
$sqlresultat = mysqli_query($db, $sqlsetning) 
or die ("ikke mulig å hente data fra databasen");
$antallRader = mysqli_num_rows($sqlresultat);
?>

<script src="funksjoner.js">
</script>


<h1>Slett klasse</h1>


<form method="post" action="slettklasse.php"
 id="slettKlasse" name="slettKlasse" 
 onSubmit="return bekreft()">

 Klassekode <select name="klassekode" id="klassekode" required>
  <option value="">Velg klassekode</option>


  <?php
  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad = mysqli_fetch_array($sqlresultat);
    $klassekode = $rad["klassekode"];
    $klassenavn = $rad["klassenavn"];
    print("<option value='$klassekode'>$klassekode - $klassenavn</option>");
  }
  ?>
  </select> <br/>
    <input type="submit" value="Slett klasse" 
    id="slettklasseknapp" name="slettklasseknapp"/>
</form>


<?php
if (isset($_POST["slettklasseknapp"]))
{
    $klassekode = $_POST["klassekode"];

    // Sjekker om klassen finnes
    $sqlsetning = "SELECT * FROM klasse WHERE klassekode='$klassekode'";
    $sqlresultat = mysqli_query($db, $sqlsetning)
        or die("Ikke mulig å hente data fra databasen");

    $antallRader = mysqli_num_rows($sqlresultat);

    if ($antallRader == 0)
    {
        print("Klassen finnes ikke");
    }
    else
    {
        $sqlsetning = "SELECT * FROM student WHERE klassekode='$klassekode'";
        $sqlresultat = mysqli_query($db, $sqlsetning)
            or die("Ikke mulig å hente data fra databasen");

        $antallStudenter = mysqli_num_rows($sqlresultat);

        if ($antallStudenter != 0)
        {
            print("Klassen kan ikke slettes fordi det finnes studenter i klassen. Slett studentene først.");
        }
        else
        {
            // Sletter klassen
            $sqlsetning = "DELETE FROM klasse WHERE klassekode='$klassekode'";
            mysqli_query($db, $sqlsetning)
                or die("Ikke mulig å slette data i databasen");

            print("Følgende klasse er nå slettet: $klassekode");
        }
    }
}
?>

 <div class="knapp">
        <button><a href="index.html">Tilbake til forsiden</a></button>
    </div>

</div>
</body>
</html>