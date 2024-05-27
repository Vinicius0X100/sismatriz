<?php 
include 'config.php';

// Verificar se o ID do usuário foi enviado via POST
if (isset($_POST['acolitoId'])) {
    $acolitoId = intval($_POST['acolitoId']); // Convertendo para inteiro

    if ($acolitoId > 0) {
   
        // Query SQL para deletar o usuário
        $sql = "DELETE FROM acolitos WHERE id = $acolitoId";

        if ($mysqli->query($sql) === TRUE) {
            echo "Acolito removido com sucesso!";
        } else {
            echo "Erro ao deletar o acolito: " . $mysqli->error;
        }

        $mysqli->close(); // Fechar conexão com o banco de dados
    } else {
        echo "ID do acólito inválido.";
    }
} else {
    echo "ID do acólito não foi fornecido.";
}

?>