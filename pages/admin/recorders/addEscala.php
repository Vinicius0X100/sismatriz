<?php
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";

  $ext=".pdf";
  if (isset($_POST['month'])) {

    // Suas validações e manipulações de dados aqui...

    $month = filter_input(INPUT_POST, 'month', FILTER_SANITIZE_SPECIAL_CHARS);
    $church = filter_input(INPUT_POST, 'church', FILTER_SANITIZE_SPECIAL_CHARS);
    $send_date = filter_input(INPUT_POST, 'send_date', FILTER_SANITIZE_SPECIAL_CHARS);
    $qntd_acolitos = filter_input(INPUT_POST, 'qntd_acolitos', FILTER_SANITIZE_SPECIAL_CHARS);
    $pdf = md5(sha1($n . $_FILES["pdf"]["month"])) . $ext;
    $situation = filter_input(INPUT_POST, 'situation', FILTER_SANITIZE_SPECIAL_CHARS);

    move_uploaded_file($_FILES['pdf']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/uploads/escalas/" . $pdf);

    $queryInsertCategorie = $mysqli->query("INSERT INTO escalas(es_id, `month`, church, send_date, qntd_acolitos, pdf, situation) VALUES ('$es_id', '$month', '$church', '$send_date', '$qntd_acolitos', '$pdf', '$situation')");

    $affected_rows = @mysqli_affected_rows($mysqli);

    if ($affected_rows > 0) {
        $escalas_id = $mysqli->insert_id; // Obter o ID da escala inserida

        // Inserir dados na tabela "escalados"
        foreach ($_POST['acolitos'] as $acolito_id) {
            $mysqli->query("INSERT INTO escalados(escalas_id, acolitos_id) VALUES ('$escalas_id', '$acolito_id')");
        }

        header("Location: {$domain}admin/ac/escalas");
    } else {
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
        /* Estilos CSS */
        #acolitos-container {
            margin-bottom: 20px;
        }
        .acolito {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .select-acolito{
            margin-right: 10px;
            border:none;
            height:60px;

            
            outline:none;
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
        <li class="breadcrumb-item active" aria-current="page">Escalas</li>
        <li class="breadcrumb-item active" aria-current="page">Nova Escala</li>
       </ol>
      </nav>
    </div>
    <div class="spacement-div mt-5">
        <div class="row mb-2">
         <div class="col-lg-12">
           <span class="lead mb-3">Nova Escala</span>
           <div class="card">
            <div class="card-body">
            <?php 
                 if(empty($return)){
                  echo "";
                 }else{
                  echo $return;
                 }
                ?>
           <form method="post" id="escalas-form" class="row g-3 formctrl" enctype="multipart/form-data">
             <div class="col-4 form-floating">
               <input type="text" name="month" class="form-control" id="floatingInput" placeholder="name@example.com" required>
               <label for="floatingInput" style="margin-left:10px;">Mês</label>
             </div>
             <div class="col-4 form-floating">
               <input type="text" name="church" class="form-control" id="floatingInput1" placeholder="name@example.com" required>
               <label for="floatingInput1" style="margin-left:10px;">Igreja</label>
             </div>
             
             <div class="col-4 form-floating">
               <input type="date" name="send_date" class="form-control" id="floatingInput" placeholder="name@example.com" required>
               <label for="floatingInput" style="margin-left:10px;">Data de Hoje</label>
             </div>
             <div class="col-3 form-floating">
               <input type="text" name="qntd_acolitos" class="form-control" id="floatingInput" placeholder="name@example.com" required>
               <label for="floatingInput" style="margin-left:10px;">Num. Acólitos Escalados</label>
             </div>
             <div class="col-5 form-floating">
               <input type="file" name="pdf" class="form-control" id="floatingInput" placeholder="name@example.com" required accept="pdf/*">
               <label for="floatingInput" style="margin-left:10px;">Escala em Arquivo</label>
               <small>Caso a escala já esteja montada em Excel ou Word, envie aqui.</small>
             </div>
             <div class="col-4">
             <label class="visually-hidden" for="specificSizeSelect">Situação</label>
                <select class="form-select form-control-lg" style="height:60px;" id="specificSizeSelect" name="situation" required>
                <option value="0">Em progresso</option>
                <option value="1">Concluída</option>
               </select>
             </div>
             <div class="col-4">
             <label class="visually-hidden" for="specificSizeSelect">Acólitos</label>
               <div id="acolitos-container">
                <!-- Local para adicionar acólitos -->
               </div>

               <button class="mt-3 btn btn-secondary btn-sm mdi mdi-plus" type="button" id="adicionar-acolito">Adicionar Acolito</button>
             </div>
             <hr>          
          
             <div class="mb-3">
                <button type="submit" class="btn btn-sm btn-success mdi mdi-check-circle"> Aplicar</button>
                <a href="<?php echo $domain; ?>admin/ac/escalas" class="btn btn-sm btn-danger mdi mdi-close-circle"> Voltar</a>
             </div>
           </form>
            
          </div>
         </div>
        </div>
    </div>
   </div>
  </main>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <!-- Script JavaScript -->
   <!-- Seus scripts JavaScript aqui -->
   <script>
        $(document).ready(function() {
            $('#escalas-form').submit(function(event) {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $_SERVER['PHP_SELF']; ?>',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert('Dados enviados com sucesso!');
                        window.location.href = "<?php echo $domain; ?>admin/ac/escalas";
                    },
                    error: function(xhr, status, error) {
                        alert('Ocorreu um erro ao enviar os dados.');
                    }
                });
            });
        });
    </script>
   <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Elemento onde os acólitos serão adicionados
            var acolitosContainer = document.getElementById("acolitos-container");
            
            // Botão para adicionar acólitos
            var adicionarAcolitoBtn = document.getElementById("adicionar-acolito");

            // Contador para IDs dos acólitos
            var acolitoCount = 0;

            // Função para adicionar um novo campo de acólito
            function adicionarAcolito() {
                acolitoCount++;
                var acolitoDiv = document.createElement("div");
                acolitoDiv.classList.add("acolito");
                acolitoDiv.innerHTML = `
                    <label for="acolito-select${acolitoCount}">Ac/Cr - ${acolitoCount}:</label>
                    <select id="acolito-select${acolitoCount}" class="select-acolito" name="acolitos[]">
                        <!-- Options serão preenchidos via PHP -->
                    </select>
                    <button type="button" class="btn btn-sm btn-danger remover-acolito" data-acolito-id="${acolitoCount}">Remover</button>
                `;
                acolitosContainer.appendChild(acolitoDiv);

                // Preencher o select com os acólitos via Ajax
                preencherSelectAcolitos(acolitoDiv.querySelector(`#acolito-select${acolitoCount}`));
            }

            // Função para preencher o select de acólitos com dados via Ajax
            function preencherSelectAcolitos(selectElement) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "<?php echo $domain; ?>/core/get_acolitos_for_scale.php", true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var acolitos = JSON.parse(xhr.responseText);
                        for (var i = 0; i < acolitos.length; i++) {
                            var option = document.createElement("option");
                            option.text = acolitos[i].name;
                            option.value = acolitos[i].id;
                            selectElement.appendChild(option);
                        }
                    }
                };
                xhr.send();
            }

            // Event listener para adicionar acólito quando clicar no botão
            adicionarAcolitoBtn.addEventListener("click", function() {
                adicionarAcolito();
            });

            // Event listener para remover acólito quando clicar no botão
            acolitosContainer.addEventListener("click", function(event) {
                if (event.target.classList.contains("remover-acolito")) {
                    var acolitoId = event.target.getAttribute("data-acolito-id");
                    var acolitoDiv = document.querySelector(`.acolito select[name='acolitos[]'][id='acolito-select${acolitoId}']`).parentNode;
                    acolitosContainer.removeChild(acolitoDiv);
                }
            });
        });
    </script>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>         
</body>
</html>