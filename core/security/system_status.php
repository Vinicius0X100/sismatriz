<?php
include "../config.php"; // inclua o arquivo de configuração com sua conexão ao banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = isset($_POST['status']) ? 1 : 0;
    $counter_st = isset($_POST['counter_st']) ? 1 : 0;

    $query = "UPDATE site_status SET status = $status, `counter_st` = $counter_st WHERE id = 1";
    mysqli_query($mysqli, $query);

    // Redirecionar de volta para a página inicial
    header("Location: {$domain}admin/settings");
    exit();
}
?>