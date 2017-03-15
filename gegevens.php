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
        <div class=FormWrapper2>
           

		<?php
		$nummer = $_GET["Boekingsnummer"];
		echo "Uw boekingsnummer: $nummer";
		$query = "SELECT voornaam, achternaam, telnummer, emailadres, woonplaats, postcode, huisnummer, geboortedatum, land FROM `booking` WHERE bookingid = \"$nummer\"";
		tabel("Gegevens boeker",$query,$conn,0);
		
		//$tickets = "SELECT voornaam,achternaam,geboortedatum,t.ticketid,vluchtnr FROM tickets t, `booking&ticket` bt WHERE `bookingid`=\"$nummer\" AND t.ticketid = bt.ticketid";
		//tabel("Tickets",$tickets,$conn,0);
		
		$tickets = "SELECT voornaam,achternaam,geboortedatum,t.ticketid,vluchtnr,vertrekplaats, aankomstplaats, datumvertrek datumvlucht FROM VLUCHT v, tickets t, `booking&ticket` bt WHERE `bookingid`=\"$nummer\" AND t.ticketid = bt.ticketid AND t.ticketid = bt.ticketid AND v.Vnr = t.vluchtnr";
		tabel("Tickets",$tickets,$conn,0);
		
		//$vlucht = "SELECT DISTINCT Vnr, vertrekplaats, aankomstplaats, datumvertrek datumvlucht FROM VLUCHT v, tickets t, `booking&ticket` bt WHERE `bookingid`=\"$nummer\" AND t.ticketid = bt.ticketid AND v.Vnr = t.vluchtnr";
		//tabel("Vluchtinformatie",$vlucht,$conn,0);
		?>
		</div>
    </body>

</html>

<?php
mysqli_close($conn);
?>
