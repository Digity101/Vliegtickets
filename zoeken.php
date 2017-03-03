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
        <link href="/Styles.css" rel="stylesheet">
        <script src="/jquery-3.1.1.min.js"></script>
        <script src="/JSpag1.js"></script>
    </head>
    <body>
    <?php
	$_SESSION["post"] = $_POST;
	echo"<pre>";
	print_r($_SESSION);
	echo"</pre>";
	
	$Opties =  'SELECT MIN(Prijs) AS Prijs, VertrekDatum FROM dummy1 
	WHERE VertrekLand = "'.$_SESSION["post"]["Vertrek"].'" AND AankomstLand = "'.$_SESSION["post"]["Aantkomst"].'" 
    AND VertrekDatum BETWEEN DATE_ADD("'.$_SESSION["post"]["DatumVlucht"].'", INTERVAL -2 DAY) AND DATE_ADD("'.$_SESSION["post"]["DatumVlucht"].'", INTERVAL 2 DAY)
    GROUP BY 2 ORDER BY 2';
    Suggestie("Andere Datums",$Opties, $conn,"DatumVlucht");

	echo '<Form action="placeholder.php" method="post" id="zoeken">'; 
	$query =  'SELECT VertrekLand, Aankomstland, VertrekDatum, Vluchtnummer, Prijs FROM dummy1 
	WHERE VertrekLand = "' .$_SESSION["post"]["Vertrek"].'"AND AankomstLand = "'.$_SESSION["post"]["Aantkomst"].'" AND VertrekDatum="'.$_SESSION["post"]["DatumVlucht"].'"';
	tabel("Heenreis",$query, $conn);
    echo '</Form>';  
    
	if($_POST["Retour"]){
		$Optiesterug =  'SELECT MIN(Prijs) AS Prijs, VertrekDatum FROM dummy1 
	WHERE VertrekLand = "'.$_SESSION["post"]["Aantkomst"].'" AND AankomstLand = "'.$_SESSION["post"]["Vertrek"].'" 
    AND VertrekDatum BETWEEN DATE_ADD("'.$_SESSION["post"]["Terug"].'", INTERVAL -2 DAY) AND DATE_ADD("'.$_SESSION["post"]["Terug"].'", INTERVAL 2 DAY)
    GROUP BY 2 ORDER BY 2';
	
    Suggestie("Andere Datums",$Optiesterug, $conn,"Terug");
	echo'<Form action="placeholder.php" method="post">'; 
		$query =  'SELECT VertrekLand, Aankomstland, VertrekDatum, Vluchtnummer FROM dummy1 
		WHERE VertrekLand = "' .$_SESSION["post"]["Aantkomst"].'"AND AankomstLand = "'.$_SESSION["post"]["Vertrek"].'" AND VertrekDatum="'.$_SESSION["post"]["Terug"].'"';
		tabel("Terugreis",$query, $conn);
	}
	
	IF(mysqli_num_rows(mysqli_query($conn, $query))!=0){
		echo'<input type="submit" value="Submit" form="zoeken">';
		return;
	}
  ?>
    </body>
</html>
