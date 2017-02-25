
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
        <link href="/Styles.css" rel="stylesheet">
        <script src="/jquery-3.1.1.min.js"></script>
        <script src="/JSpag1.js"></script>
    </head>


    <body>
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
                <label for="Vertrek">Vertrek</label><br>
                <input list="landen" name="Vertrek" id="Vertrek" class="VInput" onblur="DatalistEdit();" required><br>
                <label for="Aankomst"> Aankomst</label><br>
                <input list="landen" name="Aantkomst" id="Aankomst" class="VInput" required><br>
                <label for="DatumVLuchtheen">Datum vlucht heen</label><br>
                <input type="date" name="DatumVlucht" id="DatumVLuchtheen" class="VInput" required><br>
                <label for="Terug" class="TerugCl">Terug<br></label>
                <input type="date" name="Terug" id="Terug" class="TerugCl" class="VInput" required><br>
                <input type="submit" name="Zoek een vlucht">
            </form>

        </div>
    </body>
</html>

<?php
mysqli_close($conn);
?>