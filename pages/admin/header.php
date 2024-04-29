<?php 
include $_SERVER['DOCUMENT_ROOT']."/core/config.php"; 
session_start();
 
if(!isset($_COOKIE['CookieUser'])){
    header("Location:{$domain}");
}

$selectUserHeader = "SELECT * FROM users WHERE id=".$_COOKIE['CookieUser']."";
$queryProcHeader = @mysqli_query($mysqli, $selectUserHeader);
$v = @mysqli_fetch_assoc($queryProcHeader);

?>