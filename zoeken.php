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
	<table style="width:100%">
		<tr>
			<th>Vertrek</th>
			<th>Aankomst</th> 
			<th>Datum</th>
			<th>Vluchtnummer</th>
		</tr>
    <?php
	$VertrekLand = $_POST["Vertrek"];
	$AankomLand = $_POST["Aantkomst"];
	$DatumVertrek = $_POST["DatumVlucht"];

  $query =  'SELECT VertrekLand, Aankomstland, VertrekDatum, Fluchtnummer FROM dummy1 
  WHERE VertrekLand = "' .$VertrekLand.'"AND AankomstLand = "'.$AankomLand.'" AND VertrekDatum="'.$DatumVertrek.'"';
  $resultaat= mysqli_query($conn, $query);
  //Doet de while loop totdat er geen row is en fetch_row dus False geeft,
  While ($row = mysqli_fetch_assoc($resultaat)){
  print_r($row);
	echo  '<tr> 
			<td>'.$row["VertrekLand"].'</td>
			<td>'.$row["Aankomstland"].'</td>
			<td>'.$row["VertrekDatum"].'</td>
			<td>'.$row["Fluchtnummer"].'</td>
		</tr>';
  }
  ?>
    <Table>
    </body>
</html>

<?php
mysqli_close($conn);
?>