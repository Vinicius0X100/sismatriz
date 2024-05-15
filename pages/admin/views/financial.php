<?php
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";

  // Consulta SQL para selecionar registros da tabela financeira
$sql = "SELECT * FROM financial";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // Iterar sobre os resultados
    while ($info = $result->fetch_assoc()) {
        $dataExpedicao = strtotime($info['date_expedition']);
        $dataAtual = strtotime(date('d/m/y'));

        if ($dataAtual > $dataExpedicao && $info['status'] != 1) {
            // Se a data atual for após a data de expedição e o status não for pago, atualize para vencido
            $sqlUpdate = "UPDATE financial SET status = 2 WHERE id = " . $info['id'];
            $mysqli->query($sqlUpdate);
        }
    }

}
        // Exibir informações na tabela HTML
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisMatriz - Financeiro</title>
    <link rel="stylesheet" href="<?php echo $domain; ?>/css/sidebar-adm.css" />
    <link rel="stylesheet" href="<?php echo $domain; ?>/css/global.css" />
    <link rel="icon" type="image/x-icon" href="<?php echo $domain; ?>/img/logo.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/2546cc9843.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT']."/pages/admin/sidebar.php"; ?>
 <main class="container-fluid">
    <div class="row">
        <div class="col-lg-12 mt-5">
        <nav aria-label="breadcrumb" class="spacement-div">
          <ol class="breadcrumb pagination-st">
             <li class="breadcrumb-item"><a href="<?php echo $domain; ?>admin">Home</a></li>
             <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
             <li class="breadcrumb-item active" aria-current="page">Financeiro</li>  
         </ol>
        </nav>
         <div class="spacement-div">
           <div class="row mb-2">
             <div class="col-lg-12 mb-2">
              <a href="<?php echo $domain; ?>admin/financial/add" class="btn btn-dark btn-sm"><span class="mdi mdi-plus"></span> Novo registro</a>                               
             </div>
             <div class="card">
                <div class="card-body">
                    <span class="lead mb-2">Gestão Financeira</span>
                    <table class="table table-stripd table-sm  table-hover text-center">
                        <thead>
                            <tr>
                                <th rule="row">#</th>
                                <th>Tipo de Conta</th>
                                <th>Nome. Responsável</th>
                                <th>Data de Expedição</th>
                                <th>Data de Validade</th>
                                <th>Valor</th>
                                <th>Multa/Juros</th>
                                <th>Situação</th>
                                <th>Arquivo</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php    
                               $consulta = "SELECT * FROM financial ORDER BY id DESC";
                               $con = $mysqli->query($consulta) or die (@mysqli_error());
                               $finan = $con->fetch_all(MYSQLI_ASSOC);
                             ?>
                             <?php foreach($finan as $info): ?>
                                <tr style="font-size:15px;">
                                 <th scope="row"><?php echo $info['id']; ?></th>
                                 <td><?php echo $info['type']; ?></td>
                                 <td><?php echo $info['name']; ?></td>
                                 <td><?php echo $info['date_send']; ?></td>
                                 <td><?php echo $info['date_expedition']; ?></td>
                                 <td>R$ <?php echo $info['value']; ?></td>
                                 <td>
                                     <?php if($info['penalty'] <= 0): ?>
                                        <span class="badge text-bg-primary">n/a</span>
                                     <?php else: ?>
                                        <span class="badge text-bg-warning">R$ <?php $info['penalty']; ?></span>
                                     <?php endif; ?>
                                </td>
                                 <td>
                                     <?php if($info['status'] == 0): ?>
                                        <span class="badge text-bg-warning">Pendente</span>
                                     <?php elseif($info['status'] == 1): ?>
                                        <span class="badge text-bg-success">Pago</span>
                                    <?php elseif($info['status'] == 2): ?>
                                        <span class="badge text-bg-danger">Vencida</span>
                                     <?php endif; ?>
                                </td>
                                <td><a download href="<?php echo $domain; ?>uploads/financial/<?php echo $info['file']; ?>" class=" mdi mdi-download">Baixar</a></td>
                                <td>
                                 <button onClick="abrirModal(<?php echo isset($info['id']) ? $info['id'] : 0; ?>)"  class="btn btn-primary btn-sm"><span class="mdi mdi-eye"></span></button>
                                 <a href="<?php echo $domain; ?>admin/edit-note/<?php echo $info['id']; ?>/<?php echo $info['id']; ?>" class="btn btn-success btn-sm"><span class="mdi mdi-pencil"></span></a>
                                 <button onClick="confirmarExclusao(<?php echo isset($info['id']) ? $info['id'] : 0; ?>)" class="btn btn-danger btn-sm"><span class="mdi mdi-trash-can"></span></button>
                                </td>
                                <tr>
                             <?php endforeach?>
                        </tbody>
                    </table>
                </div>
             </div>
           </div>
         </div>
        </div>
    </div>
 </main>
<?php include $_SERVER['DOCUMENT_ROOT']."/pages/admin/footer.php"; ?>
</body>
</html>