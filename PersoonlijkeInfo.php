<?php
include 'config.php';
session_start();
$_SESSION["post2"] = $_POST;
?>
<html> 
    <head>
        <title>Geen scam</title>
        <link href="icon.ico" rel="shortcut icon">
        <meta charset="UTF-8">
        <link href="Styles.css" rel="stylesheet">
        <script src="/jquery-3.1.1.min.js"></script>
        <script src="jquery.cycle.lite.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>
        <script src="JSpag1.js"></script>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
    </head>


    <body id="Body">
		<div class="FormWrapper">
        <form action="Bevestiging.php" method="post">
		
            <?php
            /*http://stackoverflow.com/questions/160550/zip-code-us-postal-code-validation*/
			echo"<pre>";
             print_r($_SESSION["post"]);
             echo"</pre>";
			 for($i = 1;$i < $_SESSION["post"]["AantalPers"] + 1; $i++){
                echo "Persoon Nummer" . $i . "<br>
                <input required type=\"text\" id=\"Voornaam" . $i ."\" name=\"Voornaam" . $i . "\"><label for\"Voornaam" . $i ."\> Voornaam persoon " . $i . "</label><br>
                <input required type=\"text\" id=\"Achternaam" . $i ."\" name=\"Achternaam" . $i . "\"><label for\"Achternaam" . $i ."\> Achternaam persoon " . $i . "</label><br>
                <input required type=\"text\" id=\"Land" . $i ."\" name=\"Land" . $i . "\"><label for\"Land" . $i ."\> Land persoon " . $i . "</label><br>
                <input required type=\"text\" id=\"Stad" . $i ."\" name=\"Stad" . $i . "\"><label for\"Stad" . $i ."\> Stad persoon " . $i . "</label><br>
                <input required type=\"text\" id=\"Postcode" . $i ."\" name=\"Postcode" . $i . "\"><label for\"Postcode" . $i ."\> Postcode persoon " . $i . "</label><br>
                <input required type=\"date\" id=\"Geboortedatum" . $i ."\" name=\"Geboortedatum" . $i . "\"><label for\"Geboortedatum" . $i ."\> Geboortedatum persoon " . $i . "</label><br>
                <input required type=\"email\" id=\"Email" . $i ."\" name=\"Email" . $i . "\"><label for\"Email" . $i ."\> Email persoon " . $i . "</label><br>
                <input required type=\"number\" id=\"TelefoonNummer" . $i ."\" name=\"TelefoonNummer" . $i . "\"><label for\"TelefoonNummer" . $i ."\> TelefoonNummer persoon " . $i . "</label><br>";
                }
            ?>
			<input type="Submit" name="Submit3" id="Submit3">
		</div>
        </form>
    </body>
</html>

<?php
mysqli_close($conn);
?>
