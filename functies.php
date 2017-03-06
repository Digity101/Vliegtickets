<?php
function tabel($naam, $mysql_query,$connection,$radio = 1){
	echo"<h1>$naam</h1>";
	$resultaat= mysqli_query($connection, $mysql_query);
	IF(mysqli_num_rows($resultaat)==0){
		echo "Geen vlucht beschikbaar<br>";
		return;
	}
	echo '<table><tr>';
	//fetch_fields geeft een array met objecten met info 
	$kolominfo = mysqli_fetch_fields($resultaat);
	foreach($kolominfo as $k){
	  //Als je een property wilt van een object gebruik dan: $Object -> Propety
	  echo "<th>".$k -> name ."</th>";
   }
	echo '</tr>';
	//Doet de while loop totdat er geen row is en fetch_row dus False geeft,
	While ($row = mysqli_fetch_assoc($resultaat)){
		echo "<tr>";
		foreach ($row as $r){
			echo "<td>$r</td>";
		}
		If($radio == 1){
			echo '<td class="knop"><input form="zoeken" type="radio" required name="'.$naam.'" value="'.$row["Vluchtnummer"].'"></td>';
		}
		echo "</tr>";
	}
  echo "</table>";
}
function Suggestie($naam, $mysql_query,$connection,$verzendnaam){
	echo'<form action="zoeken.php" method="post">';
	Foreach ($_SESSION["post"] as $key => $value){
		echo '<input type="hidden" name="'.$key.'" value="'.$value.'">';
	}
	echo "<h2>$naam</h2>";
	$resultaat= mysqli_query($connection, $mysql_query);
	IF(mysqli_num_rows($resultaat)==0){
		echo "Geen vlucht beschikbaar<br>";
		return;
	}
	echo '<table><tr>';
	//Doet de while loop totdat er geen row is en fetch_row dus False geeft,
	While ($row = mysqli_fetch_row($resultaat)){
		echo "<th>".$row[1]."</th>";
	}
	$resultaat= mysqli_query($connection, $mysql_query);
	echo "</tr><tr>";
	While ($row = mysqli_fetch_row($resultaat)){
		echo '<th><button type="submit" value="'.$row[1].'"name="'.$verzendnaam.'">'.$row[0].'</button></th>';
	}
    echo "</tr></table></form>";
}
?>
