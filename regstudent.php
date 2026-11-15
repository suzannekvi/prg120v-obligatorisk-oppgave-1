<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrer Student</title>
</head>
<body>
    
<?php
include("database.php");
?>


<h1>Registrer student</h1>

<form method="post" action="regstudent.php" id="registerstudent" name="registerstudent">
    brukernavn <input type="text" name="brukernavn" id="brukernavn" required /> <br/>
    fornavn <input type="text" name="fornavn" id="fornavn" required /> <br/>
    etternavn <input type="text" name="etternavn" id="etternavn" required /> <br/>
    klassekode
    <select name="klassekode" id="klassekode" required>
        <option value="">Velg klassekode</option>

    <?php
        $sqlsetning = "SELECT * FROM klasse";
        $sqlresultat = mysqli_query($db, $sqlsetning) 
         or die ("ikke mulig å hente data fra databasen");

        $antallRader = mysqli_num_rows($sqlresultat);

        for ($r=1;$r<=$antallRader;$r++)
        {
            $rad = mysqli_fetch_array($sqlresultat);
            $klassekode = $rad["klassekode"];
            $klassenavn = $rad["klassenavn"];
            print("<option value='$klassekode'>$klassekode - $klassenavn</option>");
        }
        ?>
    </select> <br/>
    <input type="submit" value="Registrerstudent" id="Registrerstudent" name="Registrerstudent"/>
    <input type="reset" value="Nullstill" id="Nullstill" name="Nullstill" /> <br/>
</form>

<?php
        if (isset($_POST["Registrerstudent"])) {
              }
              $brukernavn = $_POST["brukernavn"];
              $fornavn = $_POST["fornavn"];
              $etternavn = $_POST["etternavn"];
              $klassekode = $_POST["klassekode"];

            if (!$brukernavn || !$fornavn || !$etternavn || !$klassekode) {
                echo "Alle felt må fylles ut";
            } else {
                $sqlsetning = "SELECT * FROM student WHERE brukernavn='$brukernavn'";
                $sqlresultat = mysqli_query($db, $sqlsetning) 
                or die("ikke mulig å hente data fra databasen");
                $antallRader = mysqli_num_rows($sqlresultat);

                if ($antallRader != 0) {
                    echo "Brukernavnet er allerede registrert i databasen";
                } else {
                    $sqlsetning = "INSERT INTO student (brukernavn, fornavn, etternavn, klassekode) 
                    VALUES ('$brukernavn', '$fornavn', '$etternavn', '$klassekode')";
                    mysqli_query($db, $sqlsetning) or die
                    ("ikke mulig å registrere data i databasen");

                    echo "Studenten er nå registrert: $brukernavn, $fornavn, $etternavn og $klassekode";
                }
            }


</body>
</html>