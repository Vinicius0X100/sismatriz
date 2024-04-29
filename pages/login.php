<?php

if(file_exists($_SERVER['DOCUMENT_ROOT']."/core/config.php"))
{
  include $_SERVER['DOCUMENT_ROOT']."/core/config.php";
}else{
  echo "Arquivo CONFIG.PHP inexistente! Confira os arquivos base do site, ou tente novamente mais tarde!";
  
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar com Presbyterin </title>
    <link rel="stylesheet" href="<?php echo $domain; ?>/css/global.css" />
    <link rel="stylesheet" href="<?php echo $domain; ?>/css/login.css" />
    <link rel="icon" type="image/x-icon" href="<?php echo $domain; ?>/img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/2546cc9843.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
     .title{
      font-family:var(--font-default);
     }
     .login-presby{
       margin-top:10vw;
     }
     .form-input{
      border:solid grey 1px;
      border-radius:6px;
      padding-left:15px;
      width:100%;
      height:55px;
      outline:none;
     }
    </style>
</head>
<body>

    <main class="container main-slides">
        <div class="row login-presby" >
           <div class="col-lg-12">
              <div class="card shadow-lg" style="border:none;">
                <div class="card-body">                 
                    <div class="row">
                      <div class="col-md-7 p-4">
                       <img width="70" class="mb-2 logo-left" src="<?php echo $domain; ?>/img/logo.png" alt="Presbyterin Logo">
                       <br>
                       <span class="h2 title">Fazer login</span>
                       <p class="lead mt-2">Use sua conta Presbyterin</p>
                      </div>
                      <div class="col-md-5 mt-5">
                          <form method="post" style="font-family:var(--font-default);">
                        <div class="mb-3">                            
                          <input type="email" name="email" class="form-input" placeholder="E-mail">
                        </div>
                        <div class="mb-3">                            
                          <input type="password" name="password" class="form-input" placeholder="Senha">
                        </div>
                       
                        <div class="mb-3">
                         <button class="btn btn-primary text-right" type="submit">Entrar</button>
                        </div>
                        <div class="mb-3">
                          <span class="lead">Não tem uma conta?</span>
                          <a href="<?php echo $domain; ?>/register">Criar uma agora</a>
                        </div>
                    </form>
                      </div>
                    </div>
                    
                </div>
                
              </div>
           </div>
          
        </div>
    </main>
</body>
</html>