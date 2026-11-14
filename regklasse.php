<?php
include("database.php");
?>

<h1>Registrer klasse</h1>
<form method="post" action="regklasse.php" id="registerklasse" name="registerklasse">
  Klassekode <input type="text" name="klassekode" id="klassekode" required><br>
  Klassenavn <input type="text" name="klassenavn" id="klassenavn" required><br>
  Studiekode <input type="text" name="studiekode" id="studiekode" required><br>
  <input type="submit" value="Registrer klasse" id="registrerKlasseKnapp" name="registrerKlasseKnapp">
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill"/> <br />
</form> 

<?php

