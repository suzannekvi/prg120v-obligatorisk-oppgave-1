<?php
include("database.php");
?>

<h1>Registrer klasse</h1>
<form method="post" action="regklasse.php" id="registerKlasse" name="registerKlasse">
  Klassekode <input type="text" name="klassekode" id="klassekode" required /> <br/>
  Klassenavn <input type="text" name="klassenavn" id="klassenavn" required /> <br/>
  Studiekode <input type="text" name="studiekode" id="studiekode" required /> <br/>
  <input type="submit" value="Registrer klasse" id="Registrerklasse" name="Registrerklasse"/>
  <input type="reset" value="Nullstill" id="Nullstill" name="Nullstill" /> <br/>
</form> 

<?php
    if (isset($_POST["Registrerklasse"])) {
        $klassekode = $_POST['klassekode'];
        $klassenavn = $_POST['klassenavn'];
        $studiekode = $_POST['studiekode'];

        if (!klassekode || !klassenavn || !studiekode)
        {
            echo "Alle felt må fylles ut";
        } else {

         include("database.php");
        
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
            $sqlsetning = "INSERT INTO klasse VALUES ('$klassekode', '$klassenavn', '$studiekode')";
            mysqli_query($db, $sqlsetning) or die ("ikke mulig å registrere data i databasen");
            echo "Klassen er nå registrert:$klassekode, $klassenavn og $studiekode";
         }
         
      
        }
    }
    ?>
    
