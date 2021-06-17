<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "scraplab";

$mysqli = new mysqli($server, $user, $password, $database);

session_start();

$userId = $_POST["userId"];
$collectionTeamId = $_POST["collection_team_id"];


if($prepared_query = $mysqli->prepare('UPDATE users SET account_type = "collection_team", collection_team_id = ? WHERE userId = ?;')){
  $prepared_query->bind_param("ss", $collectionTeamId, $userId);
  $prepared_query->execute();
  header("Location: account-administration.php");
} else {
  die("Account addition to collection team failed");
}
?>