<?php 
include 'config.php';

if (isset($_GET['userId'])) {
    $userId = intval($_GET['userId']); // Convertendo para inteiro

    if ($userId > 0) {
      
    

        // Consulta SQL para obter informações do usuário com base no ID
        $sql = "SELECT * FROM registers WHERE id = $userId";
        $result = $mysqli->query($sql);

        if ($result && $result->num_rows > 0) {
            // Exibir informações do usuário
            $row = $result->fetch_assoc();
            echo "<img width='113' height='151' class='rounded' src='{$domain}uploads/registers/{$row['photo']}'>";
            echo "<p><strong>Nome:</strong> " . $row['name'] . "</p>";
            echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
            echo "<p><strong>Celular:</strong> " . $row['phone'] . "</p>";
            echo "<p><strong>Endereço:</strong> " . $row['address'] . ", " . $row['address_number'] . ", " . $row['city'] . " - " . $row['state'] . ", " . $row['country'] . " - " . $row['cep'] . "</p>";
            echo "<p><strong>RG:</strong> " . $row['rg'] . "</p>";
            echo "<p><strong>CPF:</strong> " . $row['cpf'] . "</p>";
            echo "<p><strong>Data de Nascimento:</strong> " . $row['born_date'] . " (" . $row['age'] . " anos)</p>";
            echo "<p><strong>Estado Civil:</strong> " . $row['civil_status'] . "</p>";
            echo "<p><strong>Nome da mãe:</strong> " . $row['mother_name'] . "</p>";
            echo "<p><strong>Nome do pai:</strong> " . $row['father_name'] . "</p>";

            
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