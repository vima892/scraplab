<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "scraplab";

$mysqli = new mysqli($server, $user, $password, $database);

session_start();
$SLDM_ID = $_POST["SLDM_ID"];
$collection_team_id = $_SESSION["collection_team_id"];

if($query = $mysqli->query('UPDATE collection_jobs SET collection_datetime=CURRENT_TIMESTAMP, collection_team_id="'. $collection_team_id .'" WHERE SLDM_ID = ' . $SLDM_ID . ';')){
    if($query = $mysqli->query('UPDATE SLDMs SET status="working" WHERE SLDM_ID = ' . $SLDM_ID . ';')){
        header("Location: dashboard.php");
    }
} else {
  die("Collection job status change failed");
}
?>