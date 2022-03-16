<?php
function connect()
{
  $servername = "localhost";
  $username = "root";
  $pwd = "";
  $dbname = "quiz-club";

  // Create connection and check connection
  try {
     $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $pwd);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch (PDOException $e) {
     die("Connection failed: " . $conn->connect_error . " - $e");
  }

  return $conn;
}
