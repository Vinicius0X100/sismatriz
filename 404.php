<?php 
 include $_SERVER['DOCUMENT_ROOT']."/core/config.php";
 $error = $_SERVER['REDIRECT_STATUS'];
 $error_title = '';
 $error_message = '';
 if($error == 404)
 {
 	$error_message = "404 not found";
 	$error_title= "Ops! Não foi possível encontrar esta página.";
 }


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Página não encontrada</title>
    <link rel="stylesheet" href="<?php echo $domain; ?>/css/global.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/x-icon" href="<?php echo $domain; ?>/img/logo.png">
    <script src="https://kit.fontawesome.com/2546cc9843.js" crossorigin="anonymous"></script>
    <style>
        .sc-title{
            font-family: var(--font-default)!important;
            font-size: 2rem;
            font-weight: 700;
            align-self:center;

        }
        .logo{
            width: 300px;
            height: 300px;
            position:fixed;
            z-index:-9999;
            opacity:0.4;
        }
        .mother-text{
           display:flex;
           flex-direction:column;
           align-items:center;
           justify-content:center;
           margin-top:14vw;
        }
        .mother-text span{
            text-shadow:1px 1px 2px #000!important;
        }
    </style>
</head>
<body>
    <main class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-6 mother-text">
          <img class="logo" src="<?php echo $domain; ?>/img/logo.png" />
          <span class="display-6">Tenha fé, não pare de buscar!</span>      
          <span class="sc-title">Página não encontrada</span>      
          <a href="<?php echo $domain; ?>admin" class="btn btn-dark">Voltar ao Inicio</a>  
        </div>
      </div>
    </main>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>      
</body>
</html>