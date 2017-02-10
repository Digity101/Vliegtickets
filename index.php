<!--<?php
include 'config.php';
?>-->
<!DOCTYPE html>
<html lang="nl">

    <head>
        <title>Geen scam</title>
        <link href="icon.ico" rel="shortcut icon">
        <meta charset="UTF-8">
        <link href="/MikaGithubtest/Vliegtickets/Styles.css" rel="stylesheet">
    </head>

    <body>
        <div class=FormWrapper>
        <form action="idk.php" method="post">
            <datalist id="landen">
                <option value="1"></option>
                <option value="2"></option>
            </datalist>
            <input type="checkbox" checked name="Retour" id="Retour"><label for="Retour">Retour</label><br>
            <label for="Vertrek">Vertrek</label><br>
            <input list="landen" name="Vertrek" id="Vertrek" class="VInput"><br>
            <label for="Aankomst"> Aankomst</label><br>
            <input list="landen" name="Aantkomst" id="Aankomst" class="VInput"><br>
            <label for="DatumVLuchtheen">Datum vlucht heen</label><br>
            <input type="date" name="DatumVlucht" id="DatumVLuchtheen" class="VInput"><br>
            <label for="Terug" class="TerugCl">Terug<br></label>
            <input type="date" name="Terug" id="Terug" class="TerugCl" class="VInput"><br>
            <input type="submit" name="Zoek een vlucht">
        </form>
        </div>

    </body>
    <!-- http://stackoverflow.com/questions/25867236/change-div-color-with-css-checked-selector
http://stackoverflow.com/questions/16989585/css-3-slide-in-from-left-transition
http://stackoverflow.com/questions/3789844/how-to-make-a-greyed-out-html-form
-->
</html>
