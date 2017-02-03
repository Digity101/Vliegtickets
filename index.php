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
            <input list="landen" name="Vertrek" id="Vertrek"><label for="Vertrek">Vertrek</label>
            <input list="landen" name="Aantkomst" id="Aankomst"><label for="Aankomst"> Aankomst</label>
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
            <input type="date" name="DatumVlucht" id="DatumVLucht"><label for="DatumVLucht">Datum vlucht</label>
            
            <input type="submit" name="Zoek een vlucht">
        </form>


    </body>

</html>
