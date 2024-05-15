<?php
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";

  $ext=".pdf";
  if (isset($_POST['type'])) {
    
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $date_send = filter_input(INPUT_POST, 'date_send', FILTER_SANITIZE_SPECIAL_CHARS);
    $date_expedition = filter_input(INPUT_POST, 'date_expedition', FILTER_SANITIZE_SPECIAL_CHARS);
    $value = filter_input(INPUT_POST, 'value', FILTER_SANITIZE_SPECIAL_CHARS);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);
    $file = md5(sha1($n.$_FILES["file"]["type"])).$ext;
    $penalty = filter_input(INPUT_POST, 'penalty', FILTER_SANITIZE_SPECIAL_CHARS);

    move_uploaded_file($_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/uploads/contas/".$file);

    $queryInsertCategorie = $mysqli->query("INSERT INTO financial(`type`, name, date_send, date_expedition, value, status, file, penalty) VALUES ('$type', '$name', '$date_send', '$date_expedition', '$value', '$status', '$file','$penalty')");

    $affected_rows = @mysqli_affected_rows($mysqli);

    if($affected_rows > 0){
       
        header("Location: {$domain}admin/ac/escalas");

    }else{
       
        header("Location: {$domain}admin/ac/escalas/add");
        $return = "<div class='alert alert-danger'><span class='mdi mdi-alert-circle'></span> Algo deu errado!</div>";
    }
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisMatriz - Novo Lançamento</title>
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
  <main class="container">
    <div class="row p-2">
        <div class="col-lg-12 mt-5">
         <nav aria-label="breadcrumb" class="spacement-div">
             <ol class="breadcrumb pagination-st">
                 <li class="breadcrumb-item"><a href="<?php echo $domain; ?>admin">Home</a></li>
                 <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                 <li class="breadcrumb-item active" aria-current="page">Financias</li> 
                 <li class="breadcrumb-item active" aria-current="page">Novo registro</li>  
              </ol>
            </nav>
            <div class="spacement-div">
             <div class="row">
              <div class="col-lg-12">
                <span class="lead">Novo Lançamento</span>
                <br>
                <div class="card">
                 <div class="card-body">
                <form action="" class="row g-3 formctrl" method="post">
                 <div class="col-4 form-floating">
                   <input type="text" name="type" class="form-control" id="floatingInput" placeholder="Ex: Água, Luz, Telefone, Nota fiscal" required>
                   <label for="floatingInput" style="margin-left:10px;">Tipo de Conta</label>
                 </div>
                 <div class="col-4 form-floating">
                   <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Ex: Água, Luz, Telefone, Nota fiscal" required>
                   <label for="floatingInput" style="margin-left:10px;">Nome. Responsável</label>
                 </div>
                 <div class="col-2 form-floating">
                   <input type="text" name="date_send" class="form-control" id="floatingInput" placeholder="Ex: Água, Luz, Telefone, Nota fiscal" required>
                   <label for="floatingInput" style="margin-left:10px;">Data de Emissão</label>
                 </div>
                 <div class="col-2 form-floating">
                   <input type="text" name="date_expedition" class="form-control" id="floatingInput" placeholder="Ex: Água, Luz, Telefone, Nota fiscal" required>
                   <label for="floatingInput" style="margin-left:10px;">Data de Validade</label>
                 </div>
                 <div class="col-md-4 form-floating">
                   <input type="text" name="value" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                   <label for="floatingInput" style="margin-left:10px;">Valor</label>
                 </div>
                 <div class="col-md-4">
                  <label class="visually-hidden"  for="specificSizeSelect">Status</label>
                   <select class="form-select" style="height:59px;" id="specificSizeSelect" name="status" required>
                     <option selected value="0">Pendente</option>
                     <option value="1">Pago</option>
                     <option value="2">Vencida</option>
                   </select>
                   </div>
                   <div class="mb-3">
                     <div class="card">
                      <div class="card-header">
                        <h5 class="card-title">Upload do arquivo</h5>
                        <div class="alert alert-light" role="alert">
                         <span class="mdi mdi-alert-circle"> Envie arquivos no formato <strong>.pdf</strong></span>
                        </div>
                      </div>
                      <div class="card-body">
                         <label class="visually-hidden"  for="specificSizeSelect">Arquivo</label>
                         <input type="file" name="file" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                      </div>
                     </div>
                   </div>
                   <div class="col-md-5 form-floating">
                     <input type="text" name="penalty" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                     <label for="floatingInput" style="margin-left:10px;">Multa ou juros</label>
                   </div>
                   <div class="">
                     <button type="submit" class="btn btn-sm btn-success mdi mdi-check-circle"> Salvar</button>
                     <a href="<?php echo $domain; ?>admin/financial" class="btn btn-sm btn-danger mdi mdi-close-circle"> Voltar</a>
                    </div>
                </form>
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