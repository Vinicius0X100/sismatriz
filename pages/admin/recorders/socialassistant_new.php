<?php
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";


  if (isset($_POST['type'])) {
    
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
    $qntd_destributed = filter_input(INPUT_POST, 'qntd_destributed', FILTER_SANITIZE_SPECIAL_CHARS);

    $queryInsertCategorie = $mysqli->query("INSERT INTO social_assistant(`type`, `description`, qntd_destributed) VALUES ('$type', '$description', '$qntd_destributed')");

    $affected_rows = @mysqli_affected_rows($mysqli);

    if($affected_rows > 0){
       
        header("Location: {$domain}admin/social-assistant");

    }else{
       
        header("Location: {$domain}admin/social-assistant/new");
        $return = "<div class='alert alert-danger'><span class='mdi mdi-alert-circle'></span> Algo deu errado!</div>";
    }
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisMatriz | Novo item</title>
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
    <div class="col-lg-10 mt-3">
    <nav aria-label="breadcrumb" class="spacement-div">
       <ol class="breadcrumb pagination-st">
        <li class="breadcrumb-item"><a href="<?php echo $domain; ?>admin">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        <li class="breadcrumb-item active" aria-current="page">Assistência Social</li>
        <li class="breadcrumb-item active" aria-current="page">Novo Item</li>
        
       </ol>
      </nav>
    </div>
    <div class="spacement-div mt-5">
        <div class="row mb-2">
         <div class="col-lg-12">
           <span class="lead mb-3">Novo item</span>
           <div class="card">
            <div class="card-body">
            <?php 
                 if(empty($return)){
                  echo "";
                 }else{
                  echo $return;
                 }
                ?>
           <form method="post" class="row g-3 formctrl" enctype="multipart/form-data">
             <div class="col-4 form-floating">
               <input type="text" name="type" class="form-control" id="floatingInput" placeholder="name@example.com" required>
               <label for="floatingInput" style="margin-left:10px;">Item</label>
             </div>
             <div class="col-4 form-floating">
               <input type="text" name="description" class="form-control" id="floatingInput1" placeholder="name@example.com" required>
               <label for="floatingInput1" style="margin-left:10px;">Descrição</label>
             </div>
             
             <div class="col-4 form-floating">
               <input type="number" name="qntd_destributed" class="form-control" id="floatingInput" placeholder="name@example.com" required>
               <label for="floatingInput" style="margin-left:10px;">Qntd. Disponível</label>
             </div>
       
             <hr>          
          
             <div class="mb-3">
                <button type="submit" class="btn btn-sm btn-success mdi mdi-check-circle"> Salvar</button>
                <a href="<?php echo $domain; ?>admin/social-assistant" class="btn btn-sm btn-danger mdi mdi-close-circle"> Voltar</a>
             </div>
           </form>
            
          </div>
         </div>
        </div>
    </div>
   </div>
  </main>


<script src="<?php echo $domain; ?>/js/sidebar-adm.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="<?php echo $domain; ?>/js/spinner.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>         
</body>
</html>