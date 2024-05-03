<?php
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";

  $id = $_GET['id'];
  $sqlMov = "SELECT * FROM registers WHERE id=$id";
  $proc = @mysqli_query($mysqli, $sqlMov);
  $info = @mysqli_fetch_assoc($proc);

  $ext=".png";
  if (isset($_POST['name'])) {
    
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
    $address_number = filter_input(INPUT_POST, 'address_number', FILTER_SANITIZE_SPECIAL_CHARS);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
    $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_SPECIAL_CHARS);
    $familly_qntd = filter_input(INPUT_POST, 'familly_qntd', FILTER_SANITIZE_SPECIAL_CHARS);
    $civil_status = filter_input(INPUT_POST, 'civil_status', FILTER_SANITIZE_SPECIAL_CHARS);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_SPECIAL_CHARS);
    $born_date = filter_input(INPUT_POST, 'born_date', FILTER_SANITIZE_SPECIAL_CHARS);
    $work_state = filter_input(INPUT_POST, 'work_state', FILTER_SANITIZE_SPECIAL_CHARS);
    $race = filter_input(INPUT_POST, 'race', FILTER_SANITIZE_SPECIAL_CHARS);
    $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_SPECIAL_CHARS);
    $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_SPECIAL_CHARS);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_SPECIAL_CHARS);
    $mother_name = filter_input(INPUT_POST, 'mother_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $father_name = filter_input(INPUT_POST, 'father_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $home_situation = filter_input(INPUT_POST, 'home_situation', FILTER_SANITIZE_SPECIAL_CHARS);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);
    if($_FILES["photo"]["error"] !== 4){
        $photo = md5(sha1($n.$_FILES["photo"]["name"])).$ext;
    }else{
        $photo = $info['photo'];
    }
    move_uploaded_file($_FILES['photo']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/uploads/registers/".$photo);

    $queryInsertCategorie = $mysqli->query("UPDATE registers SET name='$name', email='$email', phone='$phone', address='$address', address_number='$address_number', cpf='$cpf', rg='$rg', familly_qntd='$familly_qntd', civil_status='$civil_status', age='$age', born_date='$born_date', work_state='$work_state', race='$race', country='$country', state='$state', city='$city', cep='$cep', mother_name='$mother_name', father_name='$father_name', home_situation='$home_situation', status='$status', photo='$photo' WHERE id=".$info['id']."");

    $affected_rows = @mysqli_affected_rows($mysqli);

    if($affected_rows > 0){
       
        header("Location: {$domain}admin/registers");

    }else{
       
        header("Location: {$domain}admin/registers/{$id}/{$info['id']}");
        $return = "<div class='alert alert-danger'><span class='mdi mdi-alert-circle'></span> Algo deu errado!</div>";
    }
  }


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisMatriz | Registro de <?php echo $info['name']; ?></title>
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
        <li class="breadcrumb-item active" aria-current="page">Cadastros</li>
        <li class="breadcrumb-item active" aria-current="page">Registro</li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $info['name']; ?></li>
       </ol>
      </nav>
    </div>
    <div class="spacement-div mt-5">
        <div class="row mb-2">
        <div class="col-sm-3">
        <img class="mb-3 rounded w-100" src="<?php echo $domain; ?>/uploads/registers/<?php echo $info['photo']; ?>">
        </div>
         <div class="col-lg-9">
           <span class="lead mb-3">Editar Registro</span>
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
               <input type="text" name="name" class="form-control" id="floatingInput" placeholder="name@example.com" required value="<?php echo $info['name']; ?>">
               <label for="floatingInput" style="margin-left:10px;">Nome completo</label>
             </div>
             <div class="col-4 form-floating">
               <input type="email" name="email" class="form-control" id="floatingInput1" placeholder="name@example.com" required value="<?php echo $info['email']; ?>">
               <label for="floatingInput1" style="margin-left:10px;">E-mail</label>
             </div>
             
             <div class="col-4 form-floating">
               <input type="text" name="phone" class="form-control" id="floatingInput" placeholder="name@example.com" required value="<?php echo $info['phone']; ?>">
               <label for="floatingInput" style="margin-left:10px;">Celular</label>
             </div>
             <div class="col-3 form-floating">
               <input type="text" name="rg" class="form-control" id="floatingInput" placeholder="name@example.com" required value="<?php echo $info['rg']; ?>">
               <label for="floatingInput" style="margin-left:10px;">RG</label>
             </div>
             <div class="col-3 form-floating">
               <input type="text" name="cpf" class="form-control" id="floatingInput" placeholder="name@example.com" required value="<?php echo $info['cpf']; ?>">
               <label for="floatingInput" style="margin-left:10px;">CPF</label>
             </div>
             <div class="col-2 form-floating">
               <input type="text" name="age" class="form-control" id="floatingInput" placeholder="name@example.com" required value="<?php echo $info['age']; ?>">
               <label for="floatingInput" style="margin-left:10px;">Idade</label>
             </div>
             <div class="col-4 form-floating">
               <input type="date" name="born_date" class="form-control" id="floatingInput" placeholder="name@example.com" required value="<?php echo $info['born_date']; ?>">
               <label for="floatingInput" style="margin-left:10px;">Data de Nascimento</label>
             </div>
             <hr>  
             <div class="col-2 form-floating">
               <input type="text" name="cep" class="form-control" id="cep" oninput="buscarEndereco()" maxlength="8" placeholder="name@example.com" required value="<?php echo $info['cep']; ?>">
               <label for="floatingInput2" style="margin-left:10px;">CEP</label>
             </div>
             <div class="col-6 form-floating">
               <input type="text" name="address" class="form-control" id="logradouro" placeholder="name@example.com" required value="<?php echo $info['address']; ?>">
               <label for="floatingInput3" style="margin-left:10px;">Endereço</label>
             </div>
             <div class="col-1 form-floating">
               <input type="text" name="address_number" class="form-control form-control-sm" id="floatingInput4" placeholder="name@example.com" required value="<?php echo $info['age']; ?>">
               <label for="floatingInput4" style="margin-left:10px;">Núm.</label>
             </div>
             <div class="col-3 form-floating">
               <input type="text" name="city" class="form-control form-control-sm" id="cidade" placeholder="name@example.com" required value="<?php echo $info['city']; ?>">
               <label for="floatingInput4" style="margin-left:10px;">Cidade</label>
             </div>

             <!-- País e Estado -->
             <div class="col-3">
               <label class="visually-hidden" for="specificSizeSelect">Estado</label>
               <select class="form-select form-control-lg" style="height:60px;" id="estado" name="state" required>
                <?php
                   $selectedState = $info['state']; // Estado recuperado do banco de dados
                   $states = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO', 'EX'];

                    foreach ($states as $state) {
                    $selected = ($state == $selectedState) ? 'selected' : '';
                    echo "<option value='$state' $selected>$state</option>";
                    }
                  ?>
                </select>
             </div>
             <div class="col-4">
               <label class="visually-hidden" for="specificSizeSelect">País</label>
               <select class="form-select form-control-lg" style="height:60px;" id="specificSizeSelect" name="country" required>
                <?php
                    $selectedCountry = $info['country']; // País recuperado do banco de dados
                     $countries = ['Aruba', 'Antígua e Barbuda', 'Emirados Árabes Unidos', 'Afeganistão', 'Argélia', 'Azerbaijão', 'Albânia', 'Armênia', 'Andorra', 'Angola', 'Samoa Americana', 'Argentina', 'Austrália', 'Ilhas Ashmore e Cartier', 'Áustria', 'Anguilla', 'Acrotíri', 'Antártica', 'açores', 'Bahrain', 'Barbados', 'Botswana', 'Bermudas', 'Bélgica', 'Bahamas', 'Bangladesh', 'Belize', 'Bósnia e Herzegovina', 'Bolívia', 'Birmânia Myanmar', 'Benim', 'Bielorrússia', 'Ilhas Salomão', 'Ilha Navassa', 'Brasil', 'Butão', 'Bulgária', 'Ilha Bouvet', 'Brunei', 'Burundi', 'Canadá', 'Camboja', 'Chade', 'Sri Lanka', 'República do Congo', 'República Democrática do Congo', 'República Popular da China', 'Chile', 'Ilhas Cayman', 'Ilhas Cocos Keeling', 'Camarões', 'Comores', 'Colômbia', 'Ilhas Marianas do Norte', 'Ilhas do Mar de Coral', 'Costa Rica', 'República Centro-Africana', 'Cuba', 'Cabo Verde', 'Ilhas Cook', 'Chipre', 'República Tcheca', 'Dinamarca', 'Djibouti', 'Dominica', 'Ilha Jarvis', 'República Dominicana', 'Deceleia', 'Equador', 'Egito', 'Irlanda', 'Guiné Equatorial', 'Estónia', 'Eritreia', 'El Salvador', 'Etiópia', 'República Checa', 'Guiana Francesa', 'Finlândia', 'Fiji', 'Ilhas Falkland Ilhas Malvinas', 'Estados Federados da Micronésia', 'Ilhas Feroe', 'Polinésia Francesa', 'Ilha Baker', 'França', 'Terras Austrais e Antárticas Francesas', 'Gâmbia', 'Gabão', 'Guiana francesa', 'Geórgia', 'Gana', 'Gibraltar', 'Granada', 'Guernsey', 'Gronelândia', 'Alemanha', 'Guadalupe', 'Guam', 'Grécia', 'Guatemala', 'Guiné', 'Guiné-Bissau', 'Guiana', 'Faixa de Gaza', 'Haiti', 'Hong Kong', 'Ilha Heard e Ilhas McDonald', 'Honduras', 'Ilha Howland', 'Croácia', 'Hungria', 'Islândia', 'Indonésia', 'Ilha de Man', 'Índia', 'Território Britânico do Oceano Índico', 'Ilha de Clipperton', 'Irão', 'Israel', 'Itália', 'Costa do Marfim', 'Iraque', 'Japão', 'Jersey', 'Jamaica', 'Jan Mayen', 'Jordânia', 'Atol Johnston', 'Quénia', 'Quirguistão', 'Coreia do Norte', 'Recife Kingman', 'Kiribati', 'Coreia do Sul', 'Ilha Christmas', 'Kuwait', 'Cazaquistão', 'Laos', 'Líbano', 'Letónia', 'Lituânia', 'Libéria', 'Eslováquia', 'Latin Purificado', 'Atol Palmyra', 'Liechtenstein', 'Lesoto', 'Luxemburgo', 'Líbia', 'Marrocos', 'Martinica', 'Macau', 'Moldávia', 'Madeira', 'Mayotte', 'Mongólia', 'Montserrat', 'Malawi', 'Montenegro', 'Macedônia', 'Mali', 'Mônaco', 'Maurícia', 'Atol de Midway', 'Mauritânia', 'Malta', 'Omã', 'Maldivas', 'México', 'Malásia', 'Moçambique', 'Nova Caledônia', 'Niue', 'Ilha Norfolk', 'Níger', 'Vanuatu', 'Nigéria', 'Países Baixos', 'Noruega', 'Nepal', 'Nauru', 'Suriname', 'Antilhas Holandesas', 'Nicarágua', 'Nova Zelândia', 'Paraguai', 'Ilhas Pitcairn', 'Peru', 'Ilhas Paracel', 'Ilhas Spratly', 'Paquistão', 'Polônia', 'Panamá', 'Portugal', 'Papua-Nova Guiné', 'Palau', 'Guiné-Bissau', 'Qatar', 'Reunião', 'Sérvia', 'Ilhas Marshall', 'Saint Martin', 'Roménia', 'Filipinas'];

                     foreach ($countries as $country) {
                     $selected = ($country == $selectedCountry) ? 'selected' : '';
                      echo "<option value='$country' $selected>$country</option>";
                      }
                  ?>
                </select>
             </div>
             <!-- País e Estado -->
             <div class="col-5 form-floating">
               <input type="text" name="home_situation" class="form-control" id="bairro" placeholder="name@example.com" required  value="<?php echo $info['home_situation']; ?>">
               <label for="floatingInput2" style="margin-left:10px;">Bairro</label>
              
             </div>
             <hr>
             <div class="col-4">
             <input type="text" name="civil_status" class="form-control" placeholder="name@example.com" required  value="<?php echo $info['civil_status']; ?>">
               <label for="floatingInput2" style="margin-left:10px;">Estado Civil</label>
                
             </div>
             <div class="col-4">
               <label class="visually-hidden" for="specificSizeSelect">Trabalho</label>
               <?php if($info['work_state'] == 1): ?>
                <select class="form-select form-control-lg" style="height:60px;" id="specificSizeSelect" name="work_state" required>
                <option value="1" selected>Empregado</option>
                <option value="2">Desempregado</option>
                <option value="3">Autonomo(a)</option>
                <option value="4">Empresário</option>
                <option value="5">Lojista</option>
                <option value="6">Pequeno Negócio</option>
                <option value="7">Jovem Aprendiz</option>
                </select>
                <?php elseif($info['work_state'] == 2): ?>
                <select class="form-select form-control-lg" style="height:60px;" id="specificSizeSelect" name="work_state" required>
                <option value="1">Empregado</option>
                <option value="2" selected>Desempregado</option>
                <option value="3">Autonomo(a)</option>
                <option value="4">Empresário</option>
                <option value="5">Lojista</option>
                <option value="6">Pequeno Negócio</option>
                <option value="7">Jovem Aprendiz</option>
                </select>
                <?php elseif($info['work_state'] == 3): ?>
                <select class="form-select form-control-lg" style="height:60px;" id="specificSizeSelect" name="work_state" required>
                <option value="1">Empregado</option>
                <option value="2">Desempregado</option>
                <option value="3" selected>Autonomo(a)</option>
                <option value="4">Empresário</option>
                <option value="5">Lojista</option>
                <option value="6">Pequeno Negócio</option>
                <option value="7">Jovem Aprendiz</option>
                </select>
                <?php elseif($info['work_state'] == 4): ?>
                <select class="form-select form-control-lg" style="height:60px;" id="specificSizeSelect" name="work_state" required>
                <option value="1">Empregado</option>
                <option value="2">Desempregado</option>
                <option value="3">Autonomo(a)</option>
                <option value="4" selected>Empresário</option>
                <option value="5">Lojista</option>
                <option value="6">Pequeno Negócio</option>
                <option value="7">Jovem Aprendiz</option>
                </select>
                <?php elseif($info['work_state'] == 5): ?>
                <select class="form-select form-control-lg" style="height:60px;" id="specificSizeSelect" name="work_state" required>
                <option value="1">Empregado</option>
                <option value="2">Desempregado</option>
                <option value="3">Autonomo(a)</option>
                <option value="4">Empresário</option>
                <option value="5" selected>Lojista</option>
                <option value="6">Pequeno Negócio</option>
                <option value="7">Jovem Aprendiz</option>
                </select>
                <?php elseif($info['work_state'] == 6): ?>
                <select class="form-select form-control-lg" style="height:60px;" id="specificSizeSelect" name="work_state" required>
                <option value="1">Empregado</option>
                <option value="2">Desempregado</option>
                <option value="3">Autonomo(a)</option>
                <option value="4">Empresário</option>
                <option value="5">Lojista</option>
                <option value="6" selected>Pequeno Negócio</option>
                <option value="7">Jovem Aprendiz</option>
                </select>
                <?php elseif($info['work_state'] == 7): ?>
                <select class="form-select form-control-lg" style="height:60px;" id="specificSizeSelect" name="work_state" required>
                <option value="1">Empregado</option>
                <option value="2">Desempregado</option>
                <option value="3">Autonomo(a)</option>
                <option value="4">Empresário</option>
                <option value="5">Lojista</option>
                <option value="6">Pequeno Negócio</option>
                <option value="7" selected>Jovem Aprendiz</option>
                </select>
                <?php endif; ?>
             </div>
             <div class="col-4">
               <label class="visually-hidden" for="specificSizeSelect">Raça/Cor</label>
                <select class="form-select form-control-lg" style="height:60px;" id="specificSizeSelect" name="race" required>
                <option value="1">Branco</option>
                <option value="2">Preto</option>
                <option value="3">Pardo</option>
                <option value="4">Amarelo</option>
                <option value="5">Não declarado</option>            
               </select>
             </div>
             <hr>
             <div class="col-4 form-floating">
               <input type="text" name="mother_name" class="form-control" id="floatingInput2" placeholder="name@example.com" required  value="<?php echo $info['mother_name']; ?>">
               <label for="floatingInput2" style="margin-left:10px;">Nome da Mãe</label>
             </div>
             <div class="col-4 form-floating">
               <input type="text" name="father_name" class="form-control" id="floatingInput2" placeholder="name@example.com" required  value="<?php echo $info['father_name']; ?>">
               <label for="floatingInput2" style="margin-left:10px;">Nome do Pai</label>
             </div>
             <div class="col-4 form-floating">
               <input type="text" name="familly_qntd" class="form-control" id="floatingInput2" placeholder="name@example.com" required  value="<?php echo $info['familly_qntd']; ?>">
               <label for="floatingInput2" style="margin-left:10px;">Num. Pessoas(Na mesma casa)</label>
             </div>
            <hr>
            <div class="col-5">
                <label for="formFile" class="form-label">Foto <strong>3x4</strong> (opcional)</label>
                <input class="form-control" type="file" id="formFile" name="photo" accept="image/*">
            </div>
             <div class="mb-3">
                <button type="submit" class="btn btn-sm btn-success mdi mdi-check-circle"> Salvar e Enviar</button>
                <a href="<?php echo $domain; ?>admin/registers" class="btn btn-sm btn-danger mdi mdi-close-circle"> Voltar</a>
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