<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "scraplab";

$mysqli = new mysqli($server, $user, $password, $database);

session_start();

$userId = $_POST["userId"];


if($query = $mysqli->query('DELETE FROM users WHERE userId = ' . $userId . ';')){
  header("Location: account-administration.php");
} else {
  die("Account deletion failed");
}
?>