<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="nl">

    <head>
        <title>Geen scam</title>
        <link href="icon.ico" rel="shortcut icon">
        <meta charset="UTF-8">
        <link href="/MikaGithubtest/Vliegtickets/Styles.css" rel="stylesheet">
    </head>

    <body>
        Koop hier goedkope vliegtickets
        <form action="idk.php" method="post">
            <input type="checkbox" checked name="Retour" id="Retour"><label for="Retour">Retour</label><br>
            <input list="landen" name="Vertrek" id="Vertrek"><label for="Vertrek">Vertrek</label><br>
            <input type="date" name="Terug" id="Terug" class="TerugCl"><label for="Terug" class="TerugCl">Terug<br></label>
            <input list="landen" name="Aantkomst" id="Aankomst"><label for="Aankomst"> Aankomst</label><br>
            <datalist id="landen">
                <option value="1"></option>
                <option value="2"></option>
            </datalist>
            <input type="date" name="DatumVlucht" id="DatumVLuchtheen"><label for="DatumVLuchtheen">Datum vlucht heen</label><br>

            <input type="submit" name="Zoek een vlucht">
        </form>


    </body>
    <!-- http://stackoverflow.com/questions/25867236/change-div-color-with-css-checked-selector
http://stackoverflow.com/questions/16989585/css-3-slide-in-from-left-transition

-->
</html>
