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
        <meta charset="UTF-8">
        <link href="Styles.css" rel="stylesheet">
        <script src="jquery-3.1.1.min.js"></script>
        <script src="JSpag1.js"></script>
    </head>


    <body>
	<Form action="placeholder.php" method="post">
    <?php
	$VertrekLand = $_POST["Vertrek"];
	$AankomLand = $_POST["Aantkomst"];
	$DatumVertrek = $_POST["DatumVlucht"];
    
	$query =  'SELECT VertrekLand, Aankomstland, VertrekDatum, Vluchtnummer FROM dummy1 
	WHERE VertrekLand = "' .$VertrekLand.'"AND AankomstLand = "'.$AankomLand.'" AND VertrekDatum="'.$DatumVertrek.'"';
    
	tabel("Heenreis",$query, $conn, 1);
    
	if($_POST["Retour"]){	
		$VertrekLand = $_POST["Aantkomst"];
		$AankomLand = $_POST["Vertrek"];
		$DatumVertrek = $_POST["Terug"];
    
		$query =  'SELECT VertrekLand, Aankomstland, VertrekDatum, Vluchtnummer FROM dummy1 
		WHERE VertrekLand = "' .$VertrekLand.'"AND AankomstLand = "'.$AankomLand.'" AND VertrekDatum="'.$DatumVertrek.'"';
		tabel("Terugreis",$query, $conn,1);
	}
	
	IF(mysqli_num_rows(mysqli_query($conn, $query))!=0){
		echo'<input type="submit" value="Submit">';
		return;
	}
  ?>
  </Form>
    </body>
</html>

<?php
mysqli_close($conn);
?>