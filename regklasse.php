<?php
include("database.php");
?>

<h1>Registrer klasse</h1>
<form method="post" action="regklasse.php" id="registerKlasse" name="registerKlasse">
  Klassekode <input type="text" name="klassekode" id="klassekode" required /> <br/>
  Klassenavn <input type="text" name="klassenavn" id="klassenavn" required /> <br/>
  Studiumkode <input type="text" name="studiumkode" id="studiumkode" required /> <br/>
  <input type="submit" value="Registrer klasse" id="Registrerklasse" name="Registrerklasse"/>
  <input type="reset" value="Nullstill" id="Nullstill" name="Nullstill" /> <br/>
</form> 

<?php
    if (isset($_POST["Registrerklasse"])) {
        $klassekode = $_POST['klassekode'];
        $klassenavn = $_POST['klassenavn'];
        $studiumkode = $_POST['studiumkode'];

        if (!$klassekode || !$klassenavn || !$studiumkode)
        {
            echo "Alle felt må fylles ut";
        } else {
        
         $sqlsetning = "SELECT * FROM klasse WHERE klassekode='$klassekode'";
         $sqlresultat = mysqli_query($db, $sqlsetning) or die ("ikke mulig å hente data fra databasen");
         $antallRader = mysqli_num_rows($sqlresultat);

         if
         ($antallRader != 0)
         {
            echo "Klassen er allerede registrert i databasen";
         }
         else
         {
            $sqlsetning = "INSERT INTO klasse (klassekode, klassenavn, studiumkode) 
            VALUES ('$klassekode', '$klassenavn', '$studiumkode')";
            mysqli_query($db, $sqlsetning) or die ("ikke mulig å registrere data i databasen");
            echo "Klassen er nå registrert:$klassekode, $klassenavn og $studiumkode";
         }
         
      
        }
    }
    ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrer klasse</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="knapp">
        <button><a href="index.html">Tilbake til forsiden</a></button>
    </div>
</body>
</html>