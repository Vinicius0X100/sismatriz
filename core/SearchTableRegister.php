<?php
include "config.php";

// Verificar se o termo de pesquisa foi enviado via GET
if (isset($_GET['searchTerm'])) {
    $searchTerm = $_GET['searchTerm'];

    // Consulta SQL para buscar usuários com base no termo de pesquisa (por exemplo, nome)
    $sql = "SELECT * FROM registers WHERE name LIKE '%$searchTerm%'"; // Usando SQL LIKE para pesquisa parcial

    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // Exibir resultados encontrados
        echo "<ul class='list-group'>";
        while ($row = $result->fetch_assoc()) {
            echo "<li class='list-group-item'>" . $row['name'] . " - " . $row['email'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Nenhum resultado encontrado para '{$searchTerm}'.</p>";
    }

    $mysqli->close(); // Fechar conexão com o banco de dados
} else {
    echo "Termo de pesquisa não foi fornecido.";
}
?>