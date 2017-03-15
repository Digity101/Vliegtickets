<?php
// Maakt verbinding
include 'config.php';
include 'functies.php';
// Start the session
session_start();
?>


<!DOCTYPE html>
<html lang="nl" id="htmlpag1">

    <head>
        <title>Geen scam</title>
        <link href="icon.ico" rel="shortcut icon">
        <meta charset="UTF-8">
		<link href="Styles.css" rel="stylesheet">
        <script src="jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" media="all" /> 
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript"></script>
        <script src="jquery.cycle.lite.js"></script>
        <script src="JSpag1.js"></script>

    </head>


    <body id="Body">
        <div class=FormWrapper>
            <form action="zoeken.php" method="get">
                <datalist id="landen">

                  
  <?php
  $query = "SELECT `vertrekplaats` AS name FROM VLUCHT
UNION
SELECT `aankomstplaats` AS name FROM VLUCHT";
  $resultaat= mysqli_query($conn, $query);
  // Doet de while loop totdat er geen row is en fetch_row dus False geeft,
  While ($row = mysqli_fetch_assoc($resultaat)){
	echo "<option value='".$row["name"]."' id='".$row["name"]."'></option>";
  }
  ?>


                </datalist>
                <input type="checkbox" name="Retour" checked id="Retour"><label for="Retour">Retour </label><br>
                <label for="Vertrek">Vertrekken van:</label><br>
                <input list="landen" name="Vertrek" id="Vertrek" class="VInput" onblur="DatalistRemove();" required onfocus="DatalistAdd();"><br>
                <label for="Aankomst"> Aankomen in:</label><br>
                <input list="landen" name="Aantkomst" id="Aankomst" class="VInput" required><br>
                <label for="DatumVLuchtheen">Datum van de vluchtheen</label><br>
                <input type="date" name="DatumVlucht" id="DatumVLuchtheen" class="VInput" <?php echo"min='". date("Y-m-d") . "' value='" .date("Y-m-d") ."'";?> oninput="MinTerug();"  required>
                <label for="Terug" class="TerugCl"><br>Datum van de vlucht terug<br></label>
                <input type="date" name="Terug" id="Terug" class="TerugCl" required><br>
                <label for="AantalPers" >Aantal Personen<br></label>
                <input type="number" name="AantalPers" id="Aantalpers" class="VInput" value="1" min="1" required  oninput="CheckAantalPers();ValiPers();">
                <label for="AantalVolw" class="PersVer"> <br>Aantal Volwassenen (18+)<br></label>
                <input type="number" name="AantalVolw" id="AantalVolw" class="PersVer" value="1" min="1" required  oninput="ValiPers();">
                <label for="AantalKind" class="PersVer"> <br>Aantal Kinderen (2-18)<br></label>
                <input type="number" name="AantalKind" id="AantalKind" class="PersVer" value="0" min="0" required  oninput="ValiPers();">
                <label for="AantalBaby" class="PersVer"> <br> Aantal Baby's (0-2)<br></label>
                <input type="number" name="AantalBaby" id="AantalBaby" class="PersVer" value="0" min="0" required  oninput="ValiPers();"><br>
                <input type="submit" name="Zoek een vlucht" id="Submit1">
                
            </form>

        </div>
		<br>
		<div class=FormWrapper>
            <form action="gegevens.php" method="get">
			Boekingsnummer: <input type="text" name="Boekingsnummer">
			<br><input type="submit" name="Zoek" id="Submit1">
		</form>

		</div>
		<div class="RO" id="RO1">
			<a href="http://v15groep1.helenparkhurst.net/zoeken.php?Vertrek=Nederland&Aantkomst=Noorwegen&DatumVlucht=2017-04-20=&AantalPers=2">Nu van nederland naar noorwegen op 20 april 2 personen voor maar €734,33 per persoon</a>
		</div>
		<div class="RO" id="RO2">
			<a href="http://v15groep1.helenparkhurst.net/zoeken.php?Vertrek=Finland&Aantkomst=Nederland&DatumVlucht=2017-04-20&AantalPers=2">of nu van finland naar nederland op 20 april met 2 personen voor maar €0,36</a>   	
		</div>
		<div class="RO" id="RO3">
			<a href="http://v15groep1.helenparkhurst.net/zoeken.php?Vertrek=Nederland&Aantkomst=Spanje&DatumVlucht=2017-04-13&AantalPers=2"> Of mischien toch naar spanje met 2 personen op 13 april voor maar €377,69 p.p.</a>
		</div>
    </body>

</html>

<?php
mysqli_close($conn);
?>
