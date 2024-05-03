<?php
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";


  if (isset($_POST['turma'])) {
    
    $turma = filter_input(INPUT_POST, 'turma', FILTER_SANITIZE_SPECIAL_CHARS);
    $tutor = filter_input(INPUT_POST, 'tutor', FILTER_SANITIZE_SPECIAL_CHARS);
    $inicio = filter_input(INPUT_POST, 'inicio', FILTER_SANITIZE_SPECIAL_CHARS);
    $termino = filter_input(INPUT_POST, 'termino', FILTER_SANITIZE_SPECIAL_CHARS);
    $alunos_qntd = filter_input(INPUT_POST, 'alunos_qntd', FILTER_SANITIZE_SPECIAL_CHARS);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);
    $turma_de = 1;

    $queryInsertCategorie = $mysqli->query("INSERT INTO turmas(turma, tutor, inicio, termino, alunos_qntd, `status`, turma_de) VALUES ('$turma', '$tutor', '$inicio', '$termino', '$alunos_qntd', '$status', '$turma_de')");

    $affected_rows = @mysqli_affected_rows($mysqli);

    if($affected_rows > 0){
       
        header("Location: {$domain}admin/turmas/crisma");

    }else{
       
        header("Location: {$domain}admin/turmas/crisma/add");
        $return = "<div class='alert alert-danger'><span class='mdi mdi-alert-circle'></span> Algo deu errado!</div>";
    }
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisMatriz | Nova Turma de Crisma</title>
    <link rel="stylesheet" href="<?php echo $domain; ?>/css/sidebar-adm.css" />
    <link rel="stylesheet" href="<?php echo $domain; ?>/css/global.css" />
    <link rel="icon" type="image/x-icon" href="<?php echo $domain; ?>/img/logo.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/2546cc9843.js" crossorigin="anonymous"></script>
    <style type="text/stylesheet">
        body{
        background-color:#F3F0F0;
      }
    </style>
</head>
<body>
 <?php include $_SERVER['DOCUMENT_ROOT']."/pages/admin/sidebar.php"; ?>
  <main class="container">
   <div class="row p-2">
    <div class="col-lg-8 mt-5">
    <nav aria-label="breadcrumb" class="spacement-div">
       <ol class="breadcrumb pagination-st">
        <li class="breadcrumb-item"><a href="<?php echo $domain; ?>admin">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        <li class="breadcrumb-item active" aria-current="page">Turmas</li>
        <li class="breadcrumb-item active" aria-current="page">Crisma</li>
        <li class="breadcrumb-item active" aria-current="page">Nova Turma</li>
       </ol>
      </nav>
    </div>
    <div class="spacement-div mt-5">
        <div class="row mb-2">
         <div class="col-lg-9">
           <span class="lead mb-3">Nova turma</span>
           <div class="card">
            <div class="card-body">
            <?php 
                 if(empty($return)){
                  echo "";
                 }else{
                  echo $return;
                 }
                ?>
           <form method="post">
             <div class="mb-3 form-floating">
               <input type="text" name="turma" class="form-control" id="floatingInput" placeholder="name@example.com" required>
               <label for="floatingInput">Turma</label>
             </div>
             <div class="mb-3 form-floating">
               <input type="text" name="tutor" class="form-control" id="floatingInput1" placeholder="name@example.com" required>
               <label for="floatingInput1">Professor/Tutor</label>
             </div>
             <div class="mb-3 form-floating">
               <input type="text" name="inicio" class="form-control" id="floatingInput2" placeholder="name@example.com" required>
               <label for="floatingInput2">Data de Inicio</label>
             </div>
             <div class="mb-3 form-floating">
               <input type="text" name="termino" class="form-control" id="floatingInput3" placeholder="name@example.com" required>
               <label for="floatingInput3">Data de Término</label>
             </div>
             <div class="mb-3 form-floating">
               <input type="text" name="alunos_qntd" class="form-control form-control-sm" id="floatingInput4" placeholder="name@example.com" required>
               <label for="floatingInput4">Qtnd. Alunos</label>
             </div>
             <div class="mb-3">
               <label class="visually-hidden" for="specificSizeSelect">Status</label>
                <select class="form-select" id="specificSizeSelect" name="status" required>
                  <option selected>Status da turma...</option>
                  <option value="1">Não Iniciada</option>
                  <option value="2">Formada</option>
                  <option value="3">Em progresso</option>
                  <option value="4">Cancelada</option>
               </select>
             </div>
             <div class="mb-3">
                <button type="submit" class="btn btn-sm btn-success">Enviar</button>
                <a href="<?php echo $domain; ?>admin/turmas/crisma" class="btn btn-sm btn-danger">Voltar</a>
             </div>
           </form>
            
          </div>
         </div>
        </div>
    </div>
   </div>
  </main>
<script src="<?php echo $domain; ?>/js/sidebar-adm.js"></script>
<script src="<?php echo $domain; ?>/js/spinner.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>         
</body>
</html>