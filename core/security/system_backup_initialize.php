<?php
function copyFiles($source, $destination) {
    if (!file_exists($destination)) {
        mkdir($destination, 0777, true);
    }

    $dirIterator = new RecursiveDirectoryIterator($source, RecursiveDirectoryIterator::SKIP_DOTS);
    $iterator = new RecursiveIteratorIterator($dirIterator, RecursiveIteratorIterator::SELF_FIRST);

    foreach ($iterator as $item) {
        $target = $destination . DIRECTORY_SEPARATOR . $iterator->getSubPathName();
        if ($item->isDir()) {
            if (!file_exists($target)) {
                mkdir($target);
            }
        } elseif ($item->isFile()) {
            if (!file_exists($target)) {
                copy($item, $target);
            }
        }
    }
}

$sourceDir = realpath(__DIR__ . '/../'); // Obtém o diretório principal do site
$backupDir = $sourceDir . '/backup'; // Pasta de backup dentro do diretório principal

copyFiles($sourceDir, $backupDir);

$response = [
    'status' => 'success',
    'mensagem' => 'Backup dos arquivos realizado com sucesso!'
];

header('Content-Type: application/json');
echo json_encode($response);
?>
