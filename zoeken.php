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
        <link href="Styles.css" rel="stylesheet">
        <script src="jquery-3.1.1.min.js"></script>
        <script src="JSpag1.js"></script>
    </head>
    <body id="Body">
    <?php
	$_SESSION["post"] = $_GET;
	echo"<div class=FormWrapper2>";


	$Opties =  'SELECT MIN(prijs) AS prijs, datumvertrek FROM VLUCHT 
	WHERE vertrekplaats = "'.$_SESSION["post"]["Vertrek"].'" AND aankomstplaats = "'.$_SESSION["post"]["Aantkomst"].'" 
    AND datumvertrek BETWEEN DATE_ADD("'.$_SESSION["post"]["DatumVlucht"].'", INTERVAL -7 DAY) AND DATE_ADD("'.$_SESSION["post"]["DatumVlucht"].'", INTERVAL 7 DAY)
    GROUP BY 2 ORDER BY 2';
    Suggestie("Andere Datums Heenreis",$Opties, $conn,"DatumVlucht","heen");
	echo '<Form action="PersoonlijkeInfo.php" method="post" id="zoeken">'; 
	$query =  'SELECT vertrekplaats, aankomstplaats, datumvertrek, Vnr, prijs, vrijeplaatsen FROM VLUCHT 
	WHERE vrijeplaatsen >"'.$_SESSION["post"]["AantalPers"].'" AND vertrekplaats = "' .$_SESSION["post"]["Vertrek"].'"AND aankomstplaats = "'.$_SESSION["post"]["Aantkomst"].'" AND datumvertrek="'.$_SESSION["post"]["DatumVlucht"].'"';
	tabel("Heenreis",$query, $conn);
    echo '</Form> ';  
    
	if($_SESSION["post"]["Retour"]){
		$Optiesterug =  'SELECT MIN(prijs) AS prijs, datumvertrek FROM VLUCHT 
	WHERE vertrekplaats = "'.$_SESSION["post"]["Aantkomst"].'" AND aankomstplaats = "'.$_SESSION["post"]["Vertrek"].'" 
    AND datumvertrek BETWEEN DATE_ADD("'.$_SESSION["post"]["Terug"].'", INTERVAL -7 DAY) AND DATE_ADD("'.$_SESSION["post"]["Terug"].'", INTERVAL 7 DAY)
    GROUP BY 2 ORDER BY 2';
    Suggestie("Andere Datums Terugreis",$Optiesterug, $conn,"Terug","terug");
	echo'<Form action="PersoonlijkeInfo.php" method="post">'; 
		$query =  'SELECT vertrekplaats, aankomstplaats, datumvertrek, Vnr, prijs, vrijeplaatsen FROM VLUCHT 
		WHERE  vrijeplaatsen >"'.$_SESSION["post"]["AantalPers"].'" AND vertrekplaats = "' .$_SESSION["post"]["Aantkomst"].'"AND aankomstplaats = "'.$_SESSION["post"]["Vertrek"].'" AND datumvertrek="'.$_SESSION["post"]["Terug"].'"';
		tabel("Terugreis",$query, $conn);
	}
	
	IF(mysqli_num_rows(mysqli_query($conn, $query))!=0){
		echo'<input type="submit" value="Submit" form="zoeken">';
		return;
	}
	
  ?>

  </div>
    </body>
</html>
<?php
mysqli_close($conn);
?>

