<?php
include "config.php";

// Include do seu arquivo de conexão com o banco de dados


$searchTerm = $_GET['searchTerm'];

// Consulta SQL para buscar usuários com base no termo de pesquisa
$consulta = "SELECT * FROM acolitos WHERE name LIKE '%$searchTerm%' ORDER BY id DESC";
$result = $mysqli->query($consulta) or die(mysqli_error($mysqli));

// Gerar a tabela HTML com os resultados da pesquisa
$tableHtml = '';
while ($info = $result->fetch_assoc()) {
    $tableHtml .= '<tr style="font-size:15px;">';
    $tableHtml .= '<th scope="row">' . $info['id'] . '</th>';
    $tableHtml .= '<td>' . $info['name'] . '</td>';
    $tableHtml .= '<td>' . $info['church'] . '</td>';
    if($info['type'] == 0){
        $tableHtml .= '<td><span class="badge text-bg-primary">Acólito</span></td>';  
       
    }elseif($info['type'] == 1){
        $tableHtml .= '<td><span class="badge text-bg-danger">Coroinha</span></td>';  
    }

    $tableHtml .= '<td>' . $info['age'] . '</td>';
    $tableHtml .= '<td>' . $info['graduation_year'] . '</td>';

    if($info['status'] == 0){
        $tableHtml .= '<td><span class="badge text-bg-success">Ativo</span></td>';  
       
    }elseif($info['status'] == 1){
        $tableHtml .= '<td><span class="badge text-bg-danger">Desligado</span></td>';  
    }


    $tableHtml .= '<td>';
    $tableHtml .= '<a href="' . $domain . 'admin/ac/efetivados/edit-acolito/' . $info['id'] . '/' . $info['id'] . '" class="btn btn-success btn-sm"><span class="mdi mdi-pencil"></span></a>';
    $tableHtml .= '<button onClick="confirmarExclusao(' . (isset($info['id']) ? $info['id'] : 0) . ')" class="btn btn-danger btn-sm"><span class="mdi mdi-trash-can"></span></button>';
    $tableHtml .= '</td>';  
    // Adicione outros campos da tabela aqui
    $tableHtml .= '</tr>';
}

echo $tableHtml; // Saída da tabela HTML
?>