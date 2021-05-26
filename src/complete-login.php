<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "scraplab";

$mysqli = new mysqli($server, $user, $password, $database);

session_start();

$username_or_email = $_POST["username_or_email"];
$password =  $_POST["password"];
$account_type = $_POST["account_type"];


if($prepared_query = $mysqli->prepare("SELECT * FROM users WHERE username=? OR email=?;")){
  $prepared_query->bind_param("ss", $username_or_email, $username_or_email);
  $prepared_query->execute();
  $result = $prepared_query->get_result();
  $values = $result->fetch_object();
  if(password_verify($password, $values->password)) {
    $_SESSION["userId"] = $values->userId; 
    $_SESSION["username"] = $values->username;
    header("Location: dashboard.php");
  } else {
      die("Account or password not found");
  }
} else {
  die("Prepared statement failed");
}
?>