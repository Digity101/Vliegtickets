<?php
$servername = "localhost";
$username = "v15groep1";
$password = "Welkom#1";
$db = "v15groep1_vlieg";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
mysqli_query($conn, "SET NAMES utf8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<!---Connected successfully--->";

?>
