<?php
include "config.php";

// Include do seu arquivo de conexão com o banco de dados


$searchTerm = $_GET['searchTerm'];

// Consulta SQL para buscar usuários com base no termo de pesquisa
$consulta = "SELECT * FROM escalas WHERE month LIKE '%$searchTerm%' ORDER BY es_id DESC";
$result = $mysqli->query($consulta) or die(mysqli_error($mysqli));

// Gerar a tabela HTML com os resultados da pesquisa
$tableHtml = '';
while ($info = $result->fetch_assoc()) {
    $tableHtml .= '<tr style="font-size:15px;">';
    $tableHtml .= '<th scope="row">' . $info['es_id'] . '</th>';
    $tableHtml .= '<td>' . $info['month'] . '</td>';
    $tableHtml .= '<td>' . $info['church'] . '</td>';
    $tableHtml .= '<td>' . $info['send_date'] . '</td>';
    $tableHtml .= '<td>' . $info['qntd_acolitos'] . ' escalados</td>';
    if($info['situation'] == 0){
        $tableHtml .= '<td><span class="badge text-bg-warning">Em progresso</span></td>';  
       
    }elseif($info['situation'] == 1){
        $tableHtml .= '<td><span class="badge text-bg-success">Concluída</span></td>';  
    }

    $tableHtml .= '<td>';
    $tableHtml .= '<a href="' . $domain . 'uploads/escalas/' . $info['pdf'] .'" class="btn btn-secondary btn-sm" download><span class="mdi mdi-download"> Download</span></a>';
    $tableHtml .= '</td>';   

    $tableHtml .= '<td>';
    $tableHtml .= '<button onClick="abrirModal(' . (isset($info['es_id']) ? $info['es_id'] : 0) . ')" class="btn btn-primary btn-sm"><span class="mdi mdi-eye"></span></button>';
    $tableHtml .= '<a href="' . $domain . 'admin/edit-escala/' . $info['es_id'] . '/' . $info['es_id'] . '" class="btn btn-success btn-sm"><span class="mdi mdi-pencil"></span></a>';
    $tableHtml .= '<button onClick="confirmarExclusao(' . (isset($info['es_id']) ? $info['es_id'] : 0) . ')" class="btn btn-danger btn-sm"><span class="mdi mdi-trash-can"></span></button>';
    $tableHtml .= '</td>';  
    // Adicione outros campos da tabela aqui
    $tableHtml .= '</tr>';
}

echo $tableHtml; // Saída da tabela HTML
?>