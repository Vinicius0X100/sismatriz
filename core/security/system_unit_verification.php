<?php
function listarArquivos($diretorio) {
    $arquivos = glob($diretorio . '/*');
    $resultado = [];

    foreach ($arquivos as $arquivo) {
        if (is_dir($arquivo)) {
            $resultado = array_merge($resultado, listarArquivos($arquivo));
        } else {
            $resultado[] = $arquivo;
        }
    }

    return $resultado;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $arquivos = listarArquivos($_SERVER['DOCUMENT_ROOT']);

    // Retorna os resultados como JSON
    header('Content-Type: application/json');
    echo json_encode($arquivos);
}
?>