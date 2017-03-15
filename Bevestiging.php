<?php
include 'config.php';
session_start();
$_SESSION["post3"] = $_POST;
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
	<div class="Formwrapper2">
	<pre><?php
		$Bookingid = uniqid();
		$Ticketids = array();
		$Bookpersv = $_SESSION["post3"][1][0];
		$Bookpersa = $_SESSION["post3"][1][1];
		$Bookperst = $_SESSION["post3"]["Tel"];
		$Bookperse = $_SESSION["post3"]["Email"];
		$Bookpersw = $_SESSION["post3"]["Stad"];
		$Bookpersp = $_SESSION["post3"]["Postcode"];
		$Bookpersh = $_SESSION["post3"]["Huisnummer"];
		$Bookpersg = $_SESSION["post3"][1][2];
		$Bookpersl = $_SESSION["post3"]["Land"];
		$Query1 = "INSERT INTO booking VALUES(\"$Bookingid\",\"$Bookpersv\",\"$Bookpersa\",\"$Bookperst\",\"$Bookperse\",\"$Bookpersw\",\"$Bookpersp\",\"$Bookpersh\",\"$Bookpersg\",\"$Bookpersl\")";
		mysqli_query($conn, $Query1);
		$uniekid = array();
		for($i = 0; $i < $_SESSION["post"]["AantalPers"]; $i++){
			$uniekid[$i] = uniqid();
			$Query2 = "INSERT INTO `booking&ticket` VALUES(\"$uniekid[$i]\",\"$Bookingid\")";
			mysqli_query($conn,$Query2);
			/*echo "$Query2 <br>";*/
		}
		foreach($uniekid as $key => $value){
			$Query3 = "INSERT INTO tickets VALUES(\"$value\",\"" . $_SESSION["post2"]["Heenreis"] . "\",\"" . $_SESSION["post3"][$key+1][0] . "\",\"" . $_SESSION["post3"][$key+1][1] . "\",\"" . $_SESSION["post3"][$key+1][2] ."\")";
			$Query4 = "UPDATE VLUCHT SET vrijeplaatsen = vrijeplaatsen - 1 WHERE Vnr =" . $_SESSION["post2"]["Heenreis"] . ";";
			mysqli_query($conn,$Query3);
			mysqli_query($conn,$Query4);
			/*echo "$Query3 <br>";
			echo "$Query4 <br>";*/
		}
		for($i = 0; $i < $_SESSION["post"]["AantalPers"]; $i++){
			$uniekid[$i] = uniqid();
			$Query2 = "INSERT INTO `booking&ticket` VALUES(\"$uniekid[$i]\",\"$Bookingid\")";
			mysqli_query($conn,$Query2);
			/*echo "$Query2 <br>";*/
		}
		
		if(isset($_SESSION["post2"]["Terugreis"])){
			foreach($uniekid as $key => $value){
			$Query5 = "INSERT INTO tickets VALUES(\"$value\",\"" . $_SESSION["post2"]["Terugreis"] . "\",\"" . $_SESSION["post3"][$key+1][0] . "\",\"" . $_SESSION["post3"][$key+1][1] . "\",\"" . $_SESSION["post3"][$key+1][2] ."\")";
			$Query6 = "UPDATE VLUCHT SET vrijeplaatsen = vrijeplaatsen - 1 WHERE Vnr =" . $_SESSION["post2"]["Terugreis"] . ";";
			mysqli_query($conn,$Query5);
			mysqli_query($conn,$Query6);
			/*echo "$Query5 <br>";
			echo "$Query6 <br>";*/
			}
		}
	?></pre>
	<h1>Uw gegevens staan nu in onze database. U kunt ze  <?php echo "<a href=\"http://v15groep1.helenparkhurst.net/gegevens.php?Boekingsnummer=".$Bookingid."\">";?> hier </a> terugkijken of via de <a href="/"> homepage </a>met uw boekingscode: <?php echo "$Bookingid" ?></h1>
	</div>
    </body>
</html>

<?php
mysqli_close($conn);
?>
