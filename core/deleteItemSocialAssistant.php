<?php 
include 'config.php';

// Verificar se o ID do usuário foi enviado via POST
if (isset($_POST['itemId'])) {
    $itemId = intval($_POST['itemId']); // Convertendo para inteiro

    if ($itemId > 0) {
   
        // Query SQL para deletar o usuário
        $sql = "DELETE FROM social_assistant WHERE s_id = $itemId";

        if ($mysqli->query($sql) === TRUE) {
            echo "Item deletado com sucesso!";
        } else {
            echo "Erro ao deletar o item: " . $mysqli->error;
        }

        $mysqli->close(); // Fechar conexão com o banco de dados
    } else {
        echo "ID do item inválido.";
    }
} else {
    echo "ID do item não foi fornecido.";
}

?>