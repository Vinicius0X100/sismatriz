<?php
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";
 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisMatriz - Usuário de SM</title>
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
        <div class="col-lg-12">
            <div class="spacement-div">
                <div class="mb-3 mt-3">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <span class="lead">Usuário de SM</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                  <th scope="col">#</th>
                                                  <th scope="col">Nome</th>
                                                  <th scope="col">Nível de acesso</th>
                                                  <th scope="col">Registro em Sistema</th>
                                                  <th scope="col">Ações</th>
                                               </tr>
                                            </thead>
                                            
                                            <tbody class="table-group-divider">
                                                <div class="alert alert-warning" role="alert">
                                                 Alterações são restritas a usuários de cargo alto, para os demais deve haver uma solicitação pelo <a href="#" class="alert-link">contato Resp. Adm</a>. e serão avaliadas.
                                                </div>
                                                <?php    
                                                 $consulta = "SELECT * FROM sm_users ORDER BY id";
                                                 $con = $mysqli->query($consulta) or die (@mysqli_error());
                                                 $sm_queried = $con->fetch_all(MYSQLI_ASSOC);
                                                ?>
                                                 <?php foreach($sm_queried as $info): ?>
                                                <tr>
                                                  <th scope="row"><?php echo $info['id']; ?></th>
                                                  <td><?php echo $info['name']; ?></td>
                                                  <td>
                                                    <?php if($info['access_level'] == 1):?>
                                                    <div class="job">Adm. Resp</div>
                                                    <?php elseif($info['access_level'] == 2): ?>
                                                        <div class="job">Coordenador de Segurança</div>
                                                    <?php elseif($info['access_level'] == 3): ?>
                                                        <div class="job">Técnico Seg. SisMatriz</div>
                                                    <?php elseif($info['access_level'] == 4): ?>
                                                        <div class="job">Suporte Técnico</div>
                                                    <?php elseif($info['access_level'] == 5): ?>
                                                        <div class="job">Coord. Matriz</div>
                                                    <?php elseif($info['access_level'] == 6): ?>
                                                        <div class="job">Resp. Matriz</div>
                                                    <?php endif; ?>
                                                  </td>
                                                  <td><?php echo $info['sis_register']; ?></td>
                                                  <td>
                                                    <a class="mdi mdi-pencil" href="#"></a>
                                                    <a class="mdi mdi-trash-can" href="#"></a>
                                                  </td>
                                                </tr>
                                                 <?php endforeach?>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
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