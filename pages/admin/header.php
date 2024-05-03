<?php 
include $_SERVER['DOCUMENT_ROOT']."/core/config.php"; 
session_start();
 
if(!isset($_COOKIE['CookieUser'])){
    header("Location:{$domain}");
}

// Verificação do status do site
$siteStatusQuery = "SELECT status FROM site_status WHERE id = 1";
$siteStatusResult = mysqli_query($mysqli, $siteStatusQuery);
$siteStatus = mysqli_fetch_assoc($siteStatusResult);

if($siteStatus['status'] == 0) {
    // Se o status do site for 0, exibe uma mensagem informando que o site está offline
    echo "Desculpe, o sistema está em manutenção. Por favor, tente novamente mais tarde.";
    exit; // Encerra a execução do script para evitar que o restante do código seja executado
}

$selectUserHeader = "SELECT * FROM users WHERE id=".$_COOKIE['CookieUser']."";
$queryProcHeader = @mysqli_query($mysqli, $selectUserHeader);
$v = @mysqli_fetch_assoc($queryProcHeader);

?>
 