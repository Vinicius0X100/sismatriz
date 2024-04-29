<?php
include $_SERVER["DOCUMENT_ROOT"]."/core/config.php";

session_start();
//Pega as informações do form

	if(empty($_POST['user']) || empty($_POST['password'])){
		header('Location: {$domain}/');
		exit();
	}

	$user = @mysqli_real_escape_string($mysqli, $_POST['user']);
	$password = md5(@mysqli_real_escape_string($mysqli, $_POST['password']));

//consulta ao banco de dados

	$query = "SELECT user, password FROM users where user = '{$user}' and password = '{$password}'";

	$sql = @mysqli_query($mysqli, $query);
	$bd = @mysqli_fetch_assoc($sql);

  $id = $bd["id"];
// se houver registros, salvamos os dados em variaveis de sessao
	

	if (!empty($bd)) {
		setcookie("CookieUser", $id);
		setcookie("CookieUser", $id, time()+3600*24*30*12*5);  /* expira em 1 hora */
		setcookie("CookieUser", $id, time()+3600*24*30*12*5, "/~rasmus/", "{$domain}", 1);
		$_SESSION["email"]  = $bd["user"];
		$_SESSION["id"] = $bd["id"];
		
		header('Location: /admin');
	}
//Se não ... reconduz o user para a pagina de login
	else{
        header('Location: /');	
     $return = "<div class='alert alert-danger'><span class='mdi mdi-exclamation'></span> Usuário ou Senha Inválidos! Tente novamente mais tarde.</div>";
	}

?>