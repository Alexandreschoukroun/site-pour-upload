<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donnee";

try {
  $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
  
  
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

