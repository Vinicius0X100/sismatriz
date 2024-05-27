<?php
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";

  $id = $_GET['id'];
  $sqlMov = "SELECT * FROM acolitos WHERE id=$id";
  $proc = @mysqli_query($mysqli, $sqlMov);
  $info = @mysqli_fetch_assoc($proc);

  if (isset($_POST['name'])) {
    
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $church = filter_input(INPUT_POST, 'church', FILTER_SANITIZE_SPECIAL_CHARS);
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_SPECIAL_CHARS);
    $graduation_year = filter_input(INPUT_POST, 'graduation_year', FILTER_SANITIZE_SPECIAL_CHARS);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);
   
  

    $queryInsertCategorie = $mysqli->query("UPDATE acolitos SET name='$name', church='$church', type='$type', age='$age', graduation_year='$graduation_year', status='$status' WHERE id=".$info['id']."");

    $affected_rows = @mysqli_affected_rows($mysqli);

    if($affected_rows > 0){
       
        header("Location: {$domain}admin/ac/efetivados");

    }else{
       
        header("Location: {$domain}admin/ac/efetivados/edit-acolito/{$id}/{$info['id']}");
        $return = "<div class='alert alert-danger'><span class='mdi mdi-alert-circle'></span> Algo deu errado!</div>";
    }
  }


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisMatriz | Acólito/Coroinha <?php echo $info['name']; ?></title>
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
         <li class="breadcrumb-item active" aria-current="page">Min. Acólitos</li>
         <li class="breadcrumb-item active" aria-current="page">Efetivados</li>
         <li class="breadcrumb-item active" aria-current="page">Editar</li>
         <li class="breadcrumb-item active" aria-current="page"><?php echo $info['name']; ?></li>
       </ol>
      </nav>
    </div>
    <div class="spacement-div mt-5">
        <div class="row mb-2">
         <div class="col-lg-9">
           <span class="lead mb-3">Editar <?php echo $info['name']; ?></span>
           <div class="card">
            <div class="card-body">
              
            <?php 
                 if(empty($return)){
                  echo "";
                 }else{
                  echo $return;
                 }
                                // Supondo que você tenha recuperado o valor do banco de dados e o armazenou em $valor_banco
                // Neste exemplo, vamos definir $valor_banco como 0 para Acólito e 1 para Coroinha
                $valor_banco = $info['type']; // ou 1, dependendo do valor que você obtém do banco de dados

                // Função para verificar se a opção deve ser marcada como selecionada
                function selecionar($valor_opcao, $valor_banco) {
                    if ($valor_opcao == $valor_banco) {
                        echo "selected";
                    }
                }

                $status_banco = $info['status']; // ou 1, dependendo do valor que você obtém do banco de dados

                // Função para verificar se a opção deve ser marcada como selecionada
                function selecionar_status($valor_opcao1, $status_banco2) {
                    if ($valor_opcao1 == $status_banco2) {
                        echo "selected";
                    }
                }
            ?>
           <form method="post" class="row g-3 formctrl" enctype="multipart/form-data">
             <div class="col-4 form-floating">
               <input type="text" name="name" class="form-control" id="floatingInput" placeholder="name@example.com" required value="<?php echo $info['name']; ?>">
               <label for="floatingInput" style="margin-left:10px;">Nome</label>
             </div>
             <div class="col-4 form-floating">
               <input type="text" name="church" class="form-control" id="floatingInput1" placeholder="name@example.com" required value="<?php echo $info['church']; ?>">
               <label for="floatingInput1" style="margin-left:10px;">Igreja</label>
             </div>
             
             <div class="col-4 form-floating">
              <select class="form-select form-control-lg" style="height:60px;" name="type" id="funcao">
                <option value="0" <?php selecionar(0, $valor_banco); ?>>Acólito</option>
                <option value="1" <?php selecionar(1, $valor_banco); ?>>Coroinha</option>
              </select>
             </div>

             <div class="col-4 form-floating">
               <input type="text" name="age" class="form-control" id="floatingInput1" placeholder="name@example.com" required value="<?php echo $info['age']; ?>">
               <label for="floatingInput1" style="margin-left:10px;">Idade</label>
             </div>

             <div class="col-4 form-floating">
               <input type="text" name="graduation_year" class="form-control" id="floatingInput1" placeholder="name@example.com" required value="<?php echo $info['graduation_year']; ?>">
               <label for="floatingInput1" style="margin-left:10px;">Ano de formação</label>
             </div>

             <div class="col-4 form-floating">
              <select class="form-select form-control-lg" style="height:60px;" name="status" id="funcao">
                <option value="0" <?php selecionar_status(0, $status_banco); ?>>Ativo</option>
                <option value="1" <?php selecionar_status(1, $status_banco); ?>>Desligado</option>
              </select>
             </div>
          
             <div class="mb-3">
                <button type="submit" class="btn btn-sm btn-success mdi mdi-check-circle"> Salvar e Enviar</button>
                <a href="<?php echo $domain; ?>admin/ac/efetivados" class="btn btn-sm btn-danger mdi mdi-close-circle"> Voltar</a>
             </div>
           </form>
            
          </div>
         </div>
        </div>
    </div>
   </div>
  </main>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cep').on('input', function() {
                var cep = $(this).val().replace(/\D/g, ''); // Remove caracteres não numéricos

                if (cep.length === 8) { // Verifica se o CEP possui 8 dígitos
                    // Faz a requisição AJAX para o Postmon
                    $.getJSON('https://api.postmon.com.br/v1/cep/' + cep, function(data) {
                        if (!data.hasOwnProperty('error')) { // Verifica se não ocorreu erro
                            $('#logradouro').val(data.logradouro);
                            $('#bairro').val(data.bairro);
                            $('#cidade').val(data.cidade);
                            $('#estado').val(data.estado);
                        } else {
                            alert('CEP não encontrado');
                        }
                    });
                }
            });
        });
    </script>
<script src="<?php echo $domain; ?>/js/sidebar-adm.js"></script>
<script src="<?php echo $domain; ?>/js/spinner.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>         
</body>
</html>