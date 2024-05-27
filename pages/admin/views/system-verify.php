<?php
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisMatriz - Verificação de Sistema</title>
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
             <li class="breadcrumb-item active" aria-current="page">Verificação de Sistema</li>  
          </ol>
         </nav>
        </div>
       
            <div class="row">
             <div class="col-lg-12 mb-2">
              <div class="spacement-div mt-5">
               <div class="card">
                 <div class="card-body">
                  <button id="verificarBtn" class="btn btn-primary btn-sm">
                   <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span> Verificar Arquivos
                  </button>
                 
                    <button id="backupBtn" class="btn btn-sm btn-dark">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        Fazer Backup de Arquivos
                    </button>
                    <div id="status" class="mt-3"></div>

                   <div id="status" class="mt-3"></div>
                  <div class="mt-3" id="tabelaArquivos"></div>
                 </div>
                </div>
               </div>                         
             </div>
            </div>
    
    </div>
 </main>  
  
 <script src="<?php echo $domain; ?>/js/unit_verification.js"></script>

<?php include $_SERVER['DOCUMENT_ROOT']."/pages/admin/footer.php"; ?> 
<script src="<?php echo $domain; ?>/js/sysbackup.js"></script>
</body>
</html>