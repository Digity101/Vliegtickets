<?php
// Maakt verbinding
include 'config.php';
include 'functies.php';
// Start the session
session_start();
?>


<!DOCTYPE html>
<html lang="nl">

    <head>
        <title>Geen scam</title>
        <link href="icon.ico" rel="shortcut icon">
        <meta charset="UTF-8">
		<link href="Styles.css" rel="stylesheet">
        <script src="/jquery-3.1.1.min.js"></script>
        <script src="jquery.cycle.lite.js"></script>
        <script src="JSpag1.js"></script>

    </head>


    <body id="Body">
        <div class=FormWrapper>
            <form action="zoeken.php" method="post">
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
                <input type="checkbox" name="Retour" checked id="Retour"><label for="Retour">Retour</label><br>
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
            <form action="index.php" method="post">
			<input type="text" name="Boekingsnummer">
			<input type="submit" name="Zoek" id="Submit1">
			</form>
		<?php
		?>
		</div>
    </body>
</html>
<script>
$( document ).ready(function() {
  // Find all inputs on the DOM which are bound to a datalist via their list attribute.
var inputs = document.querySelectorAll('input[list]');
for (var i = 0; i < inputs.length; i++) {
  // When the value of the input changes...
  inputs[i].addEventListener('change', function() {
    var optionFound = false,
      datalist = this.list;
    // Determine whether an option exists with the current value of the input.

    for (var j = 0; j < datalist.options.length; j++) {
        if (this.value == datalist.options[j].value) {
            optionFound = true;
            break;
        }
    }
    // use the setCustomValidity function of the Validation API
    // to provide an user feedback if the value does not exist in the datalist
    if (optionFound) {
      this.setCustomValidity('');
    } else {
      this.setCustomValidity('Please select a valid value.');
    }
  });
}
if ( $('#DatumVLuchtheen')[0].type != 'date' ) $('#DatumVLuchtheen').datepicker();
if ( $('#Terug')[0].type != 'date' ) $('#Terug').datepicker();
});
</script>
<?php
mysqli_close($conn);
?>
