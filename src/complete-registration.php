<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "scraplab";

$mysqli = new mysqli($server, $user, $password, $database);

session_start();

$username = $_SESSION["username"];
$email = $_SESSION["email"];
$password =  $_SESSION["password"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$birthdate = $_POST["birthdate"];
$account_type = "client";

if($prepared_query = $mysqli->prepare("INSERT INTO users(username, email, `password`, account_type, `name`, surname, birthdate) VALUES (?, ?, ?, ?, ?, ?, ?);")){
  $prepared_query->bind_param("sssssss",$username, $email, $password, $account_type, $name, $surname, $birthdate);
  $prepared_query->execute();
} else {
  die("Prepared statement failed");
}



if ($prepared_query->connect_error) {
  die("Connection failed: " . $prepared_query->connect_error);
} else {
    header("Location: dashboard.php");
}

?>