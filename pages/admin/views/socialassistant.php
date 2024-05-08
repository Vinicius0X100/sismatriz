<?php
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";
  
  
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisMatriz - Assistência Social</title>
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
        <div class="col-lg-12 ">
            <div class="spacement-div">
               <div class="mt-3 mb-3">
                 <div class="card">
                    <div class="card-body">
                      <div class="row mb-2">
                        <div class="col-md-10">
                           <span class="fs-4">Assistência Social</span>
                           <span class="badge text-bg-secondary">Atualizações feitas pelos Vincentinos, secretaria e demais grupos de apoio</span>
                        </div>
                        <div class="col-md-2 text-right">
                        <a class="btn btn-sm btn-dark mdi mdi-plus" href="<?php echo $domain; ?>/admin/social-assistant/new">Novo item</a>
                        </div>
                      </div>

                        <hr>
                        <?php    
                               $consulta = "SELECT * FROM social_assistant ORDER BY s_id DESC";
                               $con = $mysqli->query($consulta) or die (@mysqli_error());
                               $results = $con->fetch_all(MYSQLI_ASSOC);
                             ?>
                        <div class="row mb-2">
                         <?php foreach($results as $info): ?>
                            <div class="col-lg-12 mb-2">
                                <div class="card shadow" style="border:none;">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-md-2">
                                          <span class="fs-6"><?php echo $info['type']; ?></span>
                                        </div>
                                        <div class="col-lg-7 text-center">
                                          <span class="fw-bold"><?php echo $info['description']; ?></span>
                                        </div>
                                        <div class="col-sm-2 text-right">
                                          <span class="badge text-bg-dark"><?php echo $info['qntd_destributed']; ?> disponíveis</span>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                         <?php endforeach?> 
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