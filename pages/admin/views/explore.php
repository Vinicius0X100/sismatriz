<?php
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisMatriz - Explorador</title>
    <link rel="stylesheet" href="<?php echo $domain; ?>/css/sidebar-adm.css" />
    <link rel="stylesheet" href="<?php echo $domain; ?>/css/global.css" />
    <link rel="icon" type="image/x-icon" href="<?php echo $domain; ?>/img/logo.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/2546cc9843.js" crossorigin="anonymous"></script>
    <style>
        .panel-selector{
            transition:0.2s;
            transform:scale(1);
            cursor:pointer;
        }
        .panel-selector:hover{
            transition:0.2s;
            transform:scale(1.055);
            box-shadow:1px 1px 15px #DFDFDF;
        }
        #loader {
    
    position: fixed;
    z-index: 9999;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0, 0.8);
    text-align: center;
  }
  .spinner-grow {
    position: absolute;
    top: 50%;
    left: 50%;
   
  }
    </style>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT']."/pages/admin/sidebar.php"; ?>
    <main class="container-fluid">
     <div class="row">       
            <div class="col-lg-12">
             <div class="spacement-div">
                <div class="card mt-5 h-100">
                    <div class="card-body">
                        <span class="display-6 mdi mdi-earth"> Explorador</span>
                        <div class="row">
                            <div class="col-md-3" style="font-family:var(--font-default);">
                                <div class="card panel-selector mt-4 text-center">
                                  <div class="card-body">
                                    <span style="font-size:4vw;" class="mdi mdi-star"></span>
                                    <hr>
                                    <span class="fs-4">Acólitos/Coroinhas</span>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-3" style="font-family:var(--font-default);">
                                <div class="card panel-selector mt-4 text-center">
                                  <div class="card-body">
                                    <span style="font-size:4vw;" class="mdi mdi-book"></span>
                                    <hr>
                                    <span class="fs-4">Registros</span>
                                  </div>
                                </div>
                            </div>

                            <div class="col-md-3" style="font-family:var(--font-default);">
                                <div class="card panel-selector mt-4 text-center">
                                  <div class="card-body">
                                    <span style="font-size:4vw;" class="mdi mdi-party-popper"></span>
                                    <hr>
                                    <span class="fs-4">Eventos</span>
                                  </div>
                                </div>
                            </div>
                             
                            <div class="col-md-3" style="font-family:var(--font-default);">
                                <div class="card panel-selector mt-4 text-center">
                                  <div class="card-body">
                                    <span style="font-size:4vw;" class="mdi mdi-clipboard-list"></span>
                                    <hr>
                                    <span class="fs-4">Turmas</span>
                                  </div>
                                </div>
                            </div>
                              
                           
                            <div class="col-md-3" style="font-family:var(--font-default);">
                             <a style="text-decoration:none;" href="<?php echo $domain; ?>admin/social-assistant">
                                <div class="card panel-selector mt-4 text-center">
                                  <div class="card-body">
                                    <span style="font-size:4vw;" class="mdi mdi-group"></span>
                                    <hr>
                                    <span class="fs-4">Assistência Social</span>
                                  
                                    
                                  </div>
                                </div>
                               </a>
                            </div>

                            <div class="col-md-3" style="font-family:var(--font-default);">
                             <a style="text-decoration:none;" href="<?php echo $domain; ?>admin/finantial">
                                <div class="card panel-selector mt-4 text-center">
                                  <div class="card-body">
                                    <span style="font-size:4vw;" class="mdi mdi-currency-usd"></span>
                                    <hr>
                                    <span class="fs-4">Financeiro</span>
                                  </div>
                                </div>
                              </a>
                            </div>

                            <div class="col-md-3" style="font-family:var(--font-default);">
                                <div class="card panel-selector mt-4 text-center">
                                  <div class="card-body">
                                    <span style="font-size:4vw;" class="mdi mdi-calendar-multiple"></span>
                                    <hr>
                                    <span class="fs-4">Escalas</span>
                                    <br>
                                    <small>Referente: Min. Acólitos</small>
                                  </div>
                                </div>
                            </div>

                            <div class="col-md-3" style="font-family:var(--font-default);">
                                <div class="card panel-selector mt-4 text-center">
                                  <div class="card-body">
                                    <span style="font-size:4vw;" class="mdi mdi-crown"></span>
                                    <hr>
                                    <span class="fs-4">Admin. Usuários</span>
                                  </div>
                                </div>
                            </div>
                             
                            <div class="col-md-3" style="font-family:var(--font-default);">
                                <div class="card panel-selector mt-4 text-center">
                                  <div class="card-body">
                                    <span style="font-size:4vw;" class="mdi mdi-shield-bug"></span>
                                    <hr>
                                    <span class="fs-4">Verificação de Sistema</span>
                                  </div>
                                </div>
                            </div>

                            <div class="col-md-3" style="font-family:var(--font-default);">
                            <a style="text-decoration:none;" href="<?php echo $domain; ?>admin/settings">
                                <div class="card panel-selector mt-4 text-center">
                                  <div class="card-body">
                                    <span style="font-size:4vw;" class="mdi mdi-engine"></span>
                                    <hr>
                                    <span class="fs-4">Configurações</span>
                                  </div>
                                </div>
                             </a>
                            </div>

                        </div>
                    </div>
                </div>

              </div>
            </div>
     </div>
    </main>
<script src="<?php echo $domain; ?>/js/sidebar-adm.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo $domain; ?>/js/spinner.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>      
</body>
</html>    
</body>
</html>