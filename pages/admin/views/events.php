<?php
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisMatriz - Eventos </title>
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
        .card-body .event-body{
      background-image: url('https://png.pngtree.com/thumb_back/fh260/back_pic/05/06/22/87596c72e3222da.jpg'); /* Substitua a URL pela sua imagem de fundo */
      background-size: 100%;
      background-position: right;
    }
    .title-cards{
      text-shadow:#000 1px 2px 1px;
    }
    </style>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT']."/pages/admin/sidebar.php"; ?>
 <main class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
          <div class="spacement-div">
            <div class="mb-3 mt-3">
              <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <span class="lead">Eventos</span>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card shadow-lg">
                                        <div class="card-body event-body">
                                            <span class="h3 text-light title-cards">Festa de São João - Junina</span>
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