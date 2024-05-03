<?php
include "../config.php"; // inclua o arquivo de configuração com sua conexão ao banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = isset($_POST['status']) ? 1 : 0;

    $query = "UPDATE site_status SET status = $status";
    mysqli_query($mysqli, $query);

    // Redirecionar de volta para a página inicial
    header("Location: {$domain}admin/settings");
    exit();
}
?>