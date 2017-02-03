<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="nl">

    <head>
        <title>Geen scam</title>
        <link href="icon.ico" rel="shortcut icon">
        <meta charset="UTF-8">
        <link href="/styles.css" rel="stylesheet">
    </head>

    <body>
        Koop hier goedkope vliegtickets
        <form action="idk.php" method="post">
            
            <input list="landen" name="Vertrek" id="Vertrek"><label for="Vertrek">Vertrek</label><br>
            <input list="landen" name="Aantkomst" id="Aankomst"><label for="Aankomst"> Aankomst</label><br>
            <datalist id="landen">
                <?php
                $query = mysqli_query($conn,"SELECT Land FROM myTable");
                $land = mysqli_fetch_all($query,MYSQLI_ASSOC);
                foreach ($land as $key => $value) {
                    foreach ($value as $key => $v) {
                        echo "<option value='".$v."'>";
                    }
                }
                ?>
            </datalist>
            <input type="date" name="DatumVlucht" id="DatumVLuchtheen"><label for="DatumVLuchtheen">Datum vlucht heen</label>
            
            <input type="submit" name="Zoek een vlucht">
        </form>


    </body>
<!-- http://stackoverflow.com/questions/25867236/change-div-color-with-css-checked-selector
    http://stackoverflow.com/questions/16989585/css-3-slide-in-from-left-transition

-->
</html>
