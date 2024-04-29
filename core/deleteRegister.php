<?php 
include 'config.php';

// Verificar se o ID do usuário foi enviado via POST
if (isset($_POST['userId'])) {
    $userId = intval($_POST['userId']); // Convertendo para inteiro

    if ($userId > 0) {
   
        // Query SQL para deletar o usuário
        $sql = "DELETE FROM registers WHERE id = $userId";

        if ($mysqli->query($sql) === TRUE) {
            echo "Usuário deletado com sucesso!";
        } else {
            echo "Erro ao deletar o usuário: " . $conn->error;
        }

        $mysqli->close(); // Fechar conexão com o banco de dados
    } else {
        echo "ID do usuário inválido.";
    }
} else {
    echo "ID do usuário não foi fornecido.";
}

?>