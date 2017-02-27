<?php
// Maakt verbinding
include 'config.php';
// Start the session
session_start();
?>

<?php
// Maakt verbinding
include 'config.php';
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
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
    </head>


    <body id="Body">
        <div class=FormWrapper>
            <form action="zoeken.php" method="post">
                <datalist id="landen">
                  
  <?php
  $query = "SELECT Landen FROM Landen";
  $resultaat= mysqli_query($conn, $query);
  // Doet de while loop totdat er geen row is en fetch_row dus False geeft,
  While ($row = mysqli_fetch_assoc($resultaat)){
	echo "<option value='".$row["Landen"]."' id='".$row["Landen"]."'></option>";
  }
  ?>

                </datalist>
                <input type="checkbox" name="Retour" checked id="Retour"><label for="Retour">Retour</label><br>
                <label for="Vertrek">Vertrekken van:</label><br>
                <input list="landen" name="Vertrek" id="Vertrek" class="VInput" onblur="DatalistRemove();" required onfocus="DatalistAdd();"><br>
                <label for="Aankomst"> Aankomen in:</label><br>
                <input list="landen" name="Aantkomst" id="Aankomst" class="VInput" required><br>
                <label for="DatumVLuchtheen">Datum van de vluchtheen</label><br>
                <input type="date" name="DatumVlucht" id="DatumVLuchtheen" class="VInput" required>
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
                <script>                    
                </script>
            </form>

        </div>
    </body>
</html>

<?php
mysqli_close($conn);
?>
