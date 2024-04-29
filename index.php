<?php

if(file_exists("core/config.php"))
{
  include $_SERVER['DOCUMENT_ROOT']."/core/config.php";
}else{
  echo "Arquivo CONFIG.PHP inexistente! Confira os arquivos base do site, ou tente novamente mais tarde!";
  
}

if(isset($_COOKIE['CookieUser'])){
  header("Location:{$domain}admin");
}

session_start();
//Pega as informações do form
if(isset($_POST['user'])){
	if(empty($_POST['user']) || empty($_POST['password'])){
		header('Location: {$domain}/');
		exit();
	}

	$user = @mysqli_real_escape_string($mysqli, $_POST['user']);
	$password = md5(@mysqli_real_escape_string($mysqli, $_POST['password']));

//consulta ao banco de dados

	$query = "SELECT * FROM users where user = '{$user}' and password = '{$password}'";

	$sql = @mysqli_query($mysqli, $query);
	$bd = @mysqli_fetch_assoc($sql);
 
  $identification = $bd["id"];
// se houver registros, salvamos os dados em variaveis de sessao
	
	if (!empty($bd)) {
		setcookie("CookieUser", $identification);
		setcookie("CookieUser", $identification, time()+3600*24*30*12*5);  /* expira em 1 hora */
		setcookie("CookieUser", $identification, time()+3600*24*30*12*5, "/~rasmus/", "{$domain}", 1);
		$_SESSION["user"]  = $bd["user"];
		$_SESSION["id"] = $bd["id"];
		
		header('Location: /admin');
	}
//Se não ... reconduz o user para a pagina de login
	else{
		
    $return = "<div class='alert alert-danger'><span class='mdi mdi-alert-circle'></span> Usuário ou Senha Inválidos!</div>";
	}
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisMatriz - Sistema Unico Nossa Senhora do Rosário</title>
    <link rel="stylesheet" href="./css/hm-style.css" />
    <link rel="stylesheet" href="./css/global.css" />
    <link rel="icon" type="image/x-icon" href="<?php echo $domain; ?>/img/logo.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/2546cc9843.js" crossorigin="anonymous"></script>
    <style>
      body{
        background-color:#F3F0F0;
      }
      .login-access-panel{
        font-family:var(--font-default);
        margin-bottom:20px;
      }
      .login-access-panel .tt{
        font-size:27px;
        font-weight:bold;
      }
      .bottom-panel{
        justify-content:space-between;
      }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

     <main class="container">
        <div class="row d-flex justify-content-center mt-5 mb-5">
          <div class="col-lg-4" style="margin-bottom:100px;">
            <div class="card login-access-panel">
              <div class="card-body">
                <?php 
                 if(empty($return)){
                  echo "";
                 }else{
                  echo $return;
                 }
                ?>
                  <div>
                    <img wdith="45" height="45" src="<?php echo $domain; ?>/img/logo.png">
                  </div>
                  <span class="display-9 tt">Entrar</span>
                  <div class="input-group">
                      <span class="lead">Para acessar, informe suas credenciais</span>
                    </div>
                  <hr>
                  <form method="post">
                    <div class="input-group mb-3">
                     <span style="background-color:#363636;" class="text-light input-group-text mdi mdi-account" id="basic-addon1"></span>
                     <input type="text" class="form-control" placeholder="Usuário" aria-label="Username" aria-describedby="username-for-access" required name="user">
                    </div>
                    <div class="input-group mb-3">
                     <span style="background-color:#363636;" class="text-light input-group-text mdi mdi-key" id="basic-addon2"></span>
                     <input type="password" class="form-control" placeholder="Senha" aria-label="Passwords" aria-describedby="password-for-access" required name="password">
                    </div>
                    
                    <div class="input-group">
                      <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                    <hr>
                    <div class="input-group bottom-panel"> 
                        <p>Sem acesso?</p>
                        <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" href="#">Clique aqui</a>                    
                    </div>
                  </form>
                  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                   <div class="offcanvas-header">
                     <h5 class="offcanvas-title" id="offcanvasRightLabel">Acesso ao SisMatriz</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                   </div>
                  <div class="offcanvas-body">
                     <div class="mb-3">
                       <span class="lead"><strong>Como obtenho meu acesso?</strong></span>
                       <p class="p-2">
                         O acesso ao sistema do SM é feito através de uma requisição a administração da igreja. 
                       </p>
                     </div>
                     <div class="mb-3">
                       <span class="lead"><strong>Quem possui o acesso ao SM?</strong></span>
                       <p class="p-2">
                         O acesso é concedido a coordenadores e/ou responsáveis por ministérios da Igreja Matriz ou demais comunidades da região.
                       </p>
                     </div>
                     <div class="mb-3">
                       <span class="lead"><strong>Sou coordenador/responsável por um ministério/secretaria/grupo na igreja, onde e como pego meu acesso?</strong></span>
                       <p class="p-2">
                         O mesmo deve solicitar a secretaria da igreja ou administrador oficial do SM para requisitar o acesso e contatar o motivo e qual função exerce. Após a avaliação o acesso será encaminhado por e-mail ou via WhatsApp do solicitante.
                       </p>
                     </div>
                     <hr>
                     <div class="text-bg-dark p-3">Contato: 11912416545</div>
                  </div>
                </div>
              </div>
            </div>
        
          </div>
        </div>
     </main>

     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>