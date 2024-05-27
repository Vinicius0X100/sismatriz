<?php 
include 'config.php';

if (isset($_GET['escalaId'])) {
    $escalaId = intval($_GET['escalaId']); // Convertendo para inteiro

    if ($escalaId > 0) {
        // Consulta SQL para obter informações da escala com base no ID
        $sql = "SELECT escalas.*, GROUP_CONCAT(acolitos.name SEPARATOR ', ') AS acolitos FROM escalas LEFT JOIN escalados ON escalas.es_id = escalados.escalas_id LEFT JOIN acolitos ON escalados.acolitos_id = acolitos.id WHERE escalas.es_id = $escalaId GROUP BY escalas.es_id";
        $result = $mysqli->query($sql);

        if ($result && $result->num_rows > 0) {
            // Exibir informações da escala
            $row = $result->fetch_assoc();
           
            echo "<p><strong>Mês:</strong> " . $row['month'] . "</p>";
            echo "<p><strong>Igreja:</strong> " . $row['church'] . "</p>";
            echo "<p><strong>Data de Envio:</strong> " . $row['send_date'] . "</p>";
            echo "<p><strong>Número de Acólitos Escalados:</strong> " . $row['qntd_acolitos'] . "</p>";
            echo "<p><strong>Situação:</strong> " . ($row['situation'] == 1 ? 'Concluída' : 'Em progresso') . "</p>";
            echo "<hr>";
            echo "<a download href='{$domain}uploads/escalas/{$row['pdf']}' class='mdi mdi-download'>Baixar</a>";
            echo "<hr>";
            // Lista de acólitos associados a esta escala
            if (!empty($row['acolitos'])) {
                echo "<p><strong>Acolitos escalados:</strong></p>";
                echo "<ul>";
                $acolitos = explode(',', $row['acolitos']);
                foreach ($acolitos as $acolito) {
                    echo "<li>$acolito</li>";
                }
                echo "</ul>";
            }
        } else {
            echo "Nenhuma escala encontrada com o ID fornecido.";
        }

        $mysqli->close(); // Fechar conexão com o banco de dados
    } else {
        echo "ID da escala inválido.";
    }
} else {
    echo "ID da escala não foi fornecido.";
}
?>
