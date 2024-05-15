<?php 
include 'config.php';

if (isset($_GET['escalaId'])) {
    $escalaId = intval($_GET['escalaId']); // Convertendo para inteiro

    if ($escalaId > 0) {
      
    

        // Consulta SQL para obter informações do usuário com base no ID
        $sql = "SELECT * FROM escalas WHERE es_id = $escalaId";
        $result = $mysqli->query($sql);

        if ($result && $result->num_rows > 0) {
            // Exibir informações do usuário
            $row = $result->fetch_assoc();
            echo "<img width='113' height='151' class='rounded' src='{$domain}uploads/registers/{$row['photo']}'>";
            echo "<p><strong>Mês:</strong> " . $row['month'] . "</p>";
            echo "<p><strong>Igreja:</strong> " . $row['email'] . "</p>";
            // Adicionar mais campos conforme necessário
        } else {
            echo "Nenhum usuário encontrado com o ID fornecido.";
        }

        $mysqli->close(); // Fechar conexão com o banco de dados
    } else {
        echo "ID do usuário inválido.";
    }
} else {
    echo "ID do usuário não foi fornecido.";
}
?>