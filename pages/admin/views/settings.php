<?php
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";
  
  $query = "SELECT `status` FROM site_status";
  $result = @mysqli_query($mysqli, $query);
  $row = @mysqli_fetch_assoc($result);
  $status = $row['status'];
  
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
                  <span></span>
                </div>
                <div class="card mt-5">
                    <div class="card-body">
                        <h2 class="fs-4">Configurações</h2>
                        <hr>
                     
                        <form action="<?php echo $domain; ?>/core/security/system_status.php" method="post" >
                        <?php

                         $selectUserHeader = "SELECT * FROM users WHERE id=" . $_COOKIE['CookieUser'] . "";
                         $queryProcHeader = @mysqli_query($mysqli, $selectUserHeader);
                         $user = @mysqli_fetch_assoc($queryProcHeader);

                         // Verifica se a coluna 'rule' é igual a 1
                         if ($user['rule'] == 1):
                           // Se a regra for igual a 1, exibe o código HTML
                           ?>
                         <div class="form-check form-switch mb-3">
                           <input class="form-check-input" type="checkbox" id="status" name="status" <?php echo ($status ? 'checked' : ''); ?>>
                           <label class="form-check-label" for="flexSwitchCheckReverse">Online System</label>
                         </div>
                         <?php else:?>
                            <div class="form-check form-switch mb-3">
                              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDisabled" disabled <?php echo ($status ? 'checked' : ''); ?>>
                              <label class="form-check-label" for="flexSwitchCheckDisabled">Online System</label>
                            </div>
                         <?php endif ?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="<?php echo $domain; ?>/js/sidebar-adm.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>     
<script src="<?php echo $domain; ?>/js/spinner.js"></script>
</body>
</html>