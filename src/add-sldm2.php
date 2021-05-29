<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "scraplab";

$mysqli = new mysqli($server, $user, $password, $database);

$SLDM_ID = $_POST["SLDM_ID"];


if($query = $mysqli->query('INSERT INTO SLDMs(userId, location, status) VALUES ( "' . $_POST["userId"]. '" , "' . $_POST["location"] . '" , "free" );')){
  header("Location: dashboard.php"); 
} else {
  die("SLDM addition failed");
}
?>