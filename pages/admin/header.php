<?php 
include $_SERVER['DOCUMENT_ROOT']."/core/config.php"; 
session_start();
 
if(!isset($_COOKIE['CookieUser'])){
    header("Location:{$domain}");
}

$selectUserHeader = "SELECT * FROM users WHERE id=".$_COOKIE['CookieUser']."";
$queryProcHeader = @mysqli_query($mysqli, $selectUserHeader);
$v = @mysqli_fetch_assoc($queryProcHeader);

// Verificação do status do site
// Consulta para verificar o status do site
$sql = "SELECT status, counter_st, upload_limit FROM site_status";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // Existe pelo menos uma linha na tabela
    $row = $result->fetch_assoc();
    $status = $row["status"];

    // Verificando o status
    if ($status == 0) {
        // Consulta para verificar a regra do usuário
        $user_rule_query = "SELECT id, rule FROM users WHERE id = 1";
        $user_rule_result = $mysqli->query($user_rule_query);

        if ($user_rule_result->num_rows > 0) {
            // Existe pelo menos uma linha na tabela de usuários
            $user_row = $user_rule_result->fetch_assoc();
            $user_rule = $user_row["rule"];

            // Verificando a regra do usuário
            if ($user_rule == 111) {
                // O usuário tem permissão e o sistema está offline
                echo("<script>console.log('Master System is offline');</script>");
            } else {
                // O usuário não tem permissão
                echo " <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>";
                echo "
                <svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
                <symbol id='info-fill' fill='currentColor' viewBox='0 0 16 16'>
                <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z'/>
              </symbol>
                </svg>
                ";
                echo "
                <div class='alert text-center alert-primary d-flex align-items-center' role='alert'>
                <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Info:'><use xlink:href='#info-fill'/></svg>
                <div>
                  Sistema fora do ar para ajustes
                </div>
                </div>
                ";
                exit;
            }
        } else {
            // Não foi possível verificar a regra do usuário
            echo "Erro ao verificar a regra do usuário.";
            exit;
        }
    } else {
        // O sistema está online
        echo("<script>console.log('Sistema Online');</script>");
    }
} else {
    // Não há linhas na tabela
    echo "Não foi possível verificar o status do sistema.";
}
include $_SERVER['DOCUMENT_ROOT']."/pages/admin/navbar.php"; 

?>
 