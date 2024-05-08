<?php
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";
  
  $query = "SELECT `status`, counter_st, upload_limit FROM site_status";
  $result = @mysqli_query($mysqli, $query);
  $row = @mysqli_fetch_assoc($result);
  $status = $row['status'];
  $counter_st = $row['counter_st'];
  $upload_limit = $row['upload_limit'];
  
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisMatriz - Configurações</title>
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
               

                <div class="mt-3 mb-3">
                <?php
                  // Consulta para verificar o status do sistema
                  $sql = "SELECT status FROM site_status";
                  $result = $mysqli->query($sql);

                  if ($result->num_rows > 0) {
                      // Existe pelo menos uma linha na tabela
                      $row = $result->fetch_assoc();
                      $status = $row["status"];

                      // Verificando o status
                      if ($status == 1) {
                          echo " <span class='badge rounded-pill bg-success mdi mdi-check-circle'> Sistema Online</span>";
                      } else {
                          echo " <span class='badge rounded-pill bg-danger'>Sistema Offline</span>";
                      }
                  } else {
                      // Não há linhas na tabela
                      echo "<span class='badge rounded-pill bg-warning'>Sistema fora do ar</span>";
                  }

                  // Fechar conexão
              
                  ?>
                 </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h2 class="fs-4">Configurações</h2>
                        
                        <hr>
                        <span class="fw-bold ml-4 mdi mdi-turbine"> Operações Sistemicas</span>
                        <div class="alert alert-primary d-flex align-items-center mt-2 alert-sm" role="alert">
                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                          <div>
                            Estas operações impactam diretamente no funcionamento do site, evite usa-las sem fins de extrema necessidade.
                          </div>
                        </div>
                        <form action="<?php echo $domain; ?>/core/security/system_status.php" class="mt-3" method="post" >
                        <?php

                         $selectUserHeader = "SELECT * FROM users WHERE id=" . $_COOKIE['CookieUser'] . "";
                         $queryProcHeader = @mysqli_query($mysqli, $selectUserHeader);
                         $user = @mysqli_fetch_assoc($queryProcHeader);

                         // Verifica se a coluna 'rule' é igual a 1
                         if ($user['rule'] == 1 or $user['rule'] == 111):
                           // Se a regra for igual a 1, exibe o código HTML
                           ?>
                        <div class="row">
                          <div class="col-md-4">
                           <div class="card h-100">
                           <div class="card-body">
                             <div class="form-check form-switch mb-3">
                              <input class="form-check-input" type="checkbox" id="status" name="status" <?php echo ($status ? 'checked' : ''); ?>>
                              <label class="form-check-label" for="flexSwitchCheckReverse">System Status</label>
                             </div>
                              <span class="title">O sistema será inteiramente encerrado caso desabilitar a opção <strong>System Status</strong>, qualquer alteração não salva será perdida.</span>
                              <span class="mt-2 badge bg-warning text-dark">Alteração da opção, apenas para usuários com regra 111.</span>
                            </div>
                          </div>
                          
                         <?php else:?>
                            <div class="form-check form-switch mb-3">
                              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDisabled" disabled <?php echo ($status ? 'checked' : ''); ?>>
                              <label class="form-check-label" for="flexSwitchCheckDisabled">System Status</label>
                            </div>
                         <?php endif; ?>
                         </div>
                          
                         <div class="col-md-4">
                           <div class="card">
                           <div class="card-body">
                             <div class="form-check form-switch mb-3">
                              <input class="form-check-input" type="checkbox" id="counter_st" name="counter_st" <?php echo ($counter_st ? 'checked' : ''); ?>>
                              <label class="form-check-label" for="flexSwitchCheckReverse">Advanced Counter</label>
                             </div>
                              <span class="title">Os dados obtidos de todo o sistema são contados e separados, após isso enviados a seus respectivos paineis de exibição no Dashboard.</span>
                              <span class="mt-2 badge bg-warning text-dark">Consumo médio de processamento</span>
                            </div>
                          </div>
                         </div>
                        </div>
                         

                          <hr>
                          <span class="fw-bold ml-4 mdi mdi-cog-outline mb-2"> Configurações Gerais</span>
                          <div class="mb-3">
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Limite de Upload</span>
                            <input type="text" class="form-control" placeholder="Defina um limite de tamanho para uploads na plataforma" aria-label="Username" name="upload_limit" aria-describedby="basic-addon1"><span class="m-2">MB</span>
                          </div>
                          </div>
                          <div class="mb-3">
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Nome do site</span>
                            <input type="text" class="form-control" placeholder="Nome exibido no site" aria-label="Username" aria-describedby="basic-addon1" value="SisMatriz" readonly>
                          </div>
                          </div>
                         <div class="mb-3">
                            <button class="btn btn-sm btn-success mdi mdi-check-circle"> Aplicar</button>
                         </div>                   
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT']."/pages/admin/footer.php"; ?>
</body>
</html>