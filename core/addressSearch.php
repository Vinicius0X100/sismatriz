<?php



// Recebe o CEP do parâmetro GET
$cep = isset($_GET['cep']) ? $_GET['cep'] : ''; 
// Faz a requisição para a API do ViaCEP
if (!empty($cep) && strlen($cep) === 8 && is_numeric($cep)) {     
    $url = "https://viacep.com.br/ws/{$cep}/json/";     
    $response = file_get_contents($url);     
    // Decodifica a resposta JSON
    
    $data = json_decode($response, true);    
     // Retorna os dados do endereço como resposta em JSON
    header('Content-Type: application/json');     
    echo json_encode($data); 
   } else {     
    echo json_encode(['error' => 'CEP inválido']); 
   }

   error_log($data);
?>