
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
            <form action="idk.php" method="post">
                <datalist id="landen">
                           <?php
  $query = "SELECT VertrekLand FROM dummy1";
  $resultaat= mysqli_query($conn, $query);
  While ($row = mysqli_fetch_array($resultaat)){
	$VertrekLand[] = $row;
  }

  foreach ($VertrekLand as $key => $value) {
    foreach ($value as $key => $v) {
      echo "<option value='".$v."' id='".$v."'></option>";
    }
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
    <!-- http://stackoverflow.com/questions/25867236/change-div-color-with-css-checked-selector
http://stackoverflow.com/questions/16989585/css-3-slide-in-from-left-transition
http://stackoverflow.com/questions/3789844/how-to-make-a-greyed-out-html-form
-->
</html>

<?php
mysqli_close($conn);
?>