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
  <input list="landen">
<datalist id="landen">
    <?php
  $query = "SELECT VertrekLand FROM dummy1";
  $resultaat= mysqli_query($conn, $query);
  While ($row = mysqli_fetch_array($resultaat)){
	$VertrekLand[] = $row;
  }

  foreach ($VertrekLand as $key => $value) {
    foreach ($value as $key => $v) {
      echo "<option value='".$v."'>";
    }
  }
  ?>
</datalist>
  <input type="submit">
</form>


</body>

</html>

<?php
mysqli_close($conn);
?>