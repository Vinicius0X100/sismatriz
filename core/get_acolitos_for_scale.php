<?php
// Conexão com o banco de dados
include "config.php";
// Consulta SQL para selecionar todos os acólitos
$sql = "SELECT * FROM acolitos";
$resultado = @mysqli_query($mysqli, $sql);

// Array para armazenar os acólitos
$acolitos = array();

// Verifica se há resultados
if (@mysqli_num_rows($resultado) > 0) {
    // Loop através dos resultados e adiciona ao array de acólitos
    while ($linha = @mysqli_fetch_assoc($resultado)) {
        $acolitos[] = array(
            'id' => $linha['id'],
            'name' => $linha['name']
        );
    }
}

// Retorna os acólitos como JSON
echo json_encode($acolitos);

// Fecha a conexão
@mysqli_close($mysqli);
?>