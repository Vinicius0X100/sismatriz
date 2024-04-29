<?php 

$domain = "http://192.168.10.196/";

$host = "localhost";
$user = "root";
$password = "";
$db = "church";

$mysqli = new mysqli($host, $user, $password, $db);

// Check connection
if (!$mysqli) {
    die("Connection failed: " . @mysqli_connect_error());
  }
  echo "";
?>