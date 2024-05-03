<?php
include "config.php";

// Include do seu arquivo de conexão com o banco de dados


$searchTerm = $_GET['searchTerm'];

// Consulta SQL para buscar usuários com base no termo de pesquisa
$consulta = "SELECT * FROM registers WHERE name LIKE '%$searchTerm%' ORDER BY id DESC";
$result = $mysqli->query($consulta) or die(mysqli_error($mysqli));

// Gerar a tabela HTML com os resultados da pesquisa
$tableHtml = '';
while ($info = $result->fetch_assoc()) {
    $tableHtml .= '<tr style="font-size:15px;">';
    $tableHtml .= '<th scope="row">' . $info['id'] . '</th>';
    $tableHtml .= '<td>' . $info['name'] . '</td>';
    $tableHtml .= '<td>' . $info['email'] . '</td>';
    $tableHtml .= '<td>' . $info['phone'] . '</td>';
    $tableHtml .= '<td>' . $info['born_date'] . '</td>';
    $tableHtml .= '<td>' . $info['age'] . '</td>';  
    $tableHtml .= '<td>' . $info['civil_status'] . '</td>';  
    $tableHtml .= '<td>' . $info['city'] . '</td>';  

    if($info['status'] == 0){
        $tableHtml .= '<td><span class="badge text-bg-success">Em atividade</span></td>';  
       
    }elseif($info['status'] == 1){
        $tableHtml .= '<td><span class="badge text-bg-danger">Inativo</span></td>';  
    }

    $tableHtml .= '<td>';
    $tableHtml .= '<button onClick="abrirModal(' . (isset($info['id']) ? $info['id'] : 0) . ')" class="btn btn-primary btn-sm"><span class="mdi mdi-eye"></span></button>';
    $tableHtml .= '<a href="' . $domain . 'admin/edit-register/' . $info['id'] . '/' . $info['id'] . '" class="btn btn-success btn-sm"><span class="mdi mdi-pencil"></span></a>';
    $tableHtml .= '<button onClick="confirmarExclusao(' . (isset($info['id']) ? $info['id'] : 0) . ')" class="btn btn-danger btn-sm"><span class="mdi mdi-trash-can"></span></button>';
    $tableHtml .= '</td>';  
    // Adicione outros campos da tabela aqui
    $tableHtml .= '</tr>';
}

echo $tableHtml; // Saída da tabela HTML
?>