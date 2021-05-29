<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "scraplab";

$mysqli = new mysqli($server, $user, $password, $database);

$SLDM_ID = $_POST["SLDM_ID"];


if($query = $mysqli->query('DELETE FROM SLDMs WHERE SLDM_ID = ' . $SLDM_ID . ';')){
  header("Location: dashboard.php");
} else {
  die("SLDM deletion failed");
}
?>