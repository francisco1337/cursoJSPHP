<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbaname = "tuescuelasegura";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbaname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";
} catch(PDOException $e) {
  die(json_encode([ "exito"=> FALSE, "mensaje" => "Connection failed: " . $e->getMessage()]));
}