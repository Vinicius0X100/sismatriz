<?php
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";

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
    $photo = md5(sha1($n.$_FILES["photo"]["name"])).$ext;

    move_uploaded_file($_FILES['photo']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/uploads/registers/".$photo);

    $queryInsertCategorie = $mysqli->query("INSERT INTO registers(`name`, email, phone, `address`, address_number, cpf, rg, familly_qntd, civil_status, age, born_date, work_state, race, country, `state`, city, cep, mother_name, father_name, home_situation, `status`, photo) VALUES ('$name', '$email', '$phone', '$address', '$address_number', '$cpf', '$rg', '$familly_qntd', '$civil_status', '$age', '$born_date', '$work_state', '$race', '$country', '$state', '$city', '$cep', '$mother_name', '$father_name', '$home_situation', '$status', '$photo')");

    $affected_rows = @mysqli_affected_rows($mysqli);

    if($affected_rows > 0){
       
        header("Location: {$domain}admin/registers");

    }else{
       
        header("Location: {$domain}admin/registers/add");
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
    <div class="col-lg-10 mt-3">
    <nav aria-label="breadcrumb" class="spacement-div">
       <ol class="breadcrumb pagination-st">
        <li class="breadcrumb-item"><a href="<?php echo $domain; ?>admin">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        <li class="breadcrumb-item active" aria-current="page">Cadastros</li>
        <li class="breadcrumb-item active" aria-current="page">Novo registro</li>
       </ol>
      </nav>
    </div>
    <div class="spacement-div mt-5">
        <div class="row mb-2">
         <div class="col-lg-12">
           <span class="lead mb-3">Novo registro</span>
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
               <input type="text" name="name" class="form-control" id="floatingInput" placeholder="name@example.com" required>
               <label for="floatingInput" style="margin-left:10px;">Nome completo</label>
             </div>
             <div class="col-4 form-floating">
               <input type="text" name="email" class="form-control" id="floatingInput1" placeholder="name@example.com" required>
               <label for="floatingInput1" style="margin-left:10px;">E-mail</label>
             </div>
             
             <div class="col-4 form-floating">
               <input type="text" name="phone" class="form-control" id="floatingInput" placeholder="name@example.com" required>
               <label for="floatingInput" style="margin-left:10px;">Celular</label>
             </div>
             <div class="col-3 form-floating">
               <input type="text" name="rg" class="form-control" id="floatingInput" placeholder="name@example.com" required>
               <label for="floatingInput" style="margin-left:10px;">RG</label>
             </div>
             <div class="col-3 form-floating">
               <input type="text" name="cpf" class="form-control" id="floatingInput" placeholder="name@example.com" required>
               <label for="floatingInput" style="margin-left:10px;">CPF</label>
             </div>
             <div class="col-2 form-floating">
               <input type="text" name="age" class="form-control" id="floatingInput" placeholder="name@example.com" required>
               <label for="floatingInput" style="margin-left:10px;">Idade</label>
             </div>
             <div class="col-4 form-floating">
               <input type="date" name="born_date" class="form-control" id="floatingInput" placeholder="name@example.com" required>
               <label for="floatingInput" style="margin-left:10px;">Data de Nascimento</label>
             </div>
             <hr>
          
            
             <div class="col-2 form-floating">
               <input type="text" name="cep" class="form-control" id="cep" oninput="buscarEndereco()" maxlength="8" placeholder="name@example.com" required>
               <label for="floatingInput2" style="margin-left:10px;">CEP</label>
             </div>
             <div class="col-6 form-floating">
               <input type="text" name="address" class="form-control" id="logradouro" placeholder="name@example.com" required>
               <label for="floatingInput3" style="margin-left:10px;">Endereço</label>
             </div>
             <div class="col-1 form-floating">
               <input type="text" name="address_number" class="form-control form-control-sm" id="floatingInput4" placeholder="name@example.com" required>
               <label for="floatingInput4" style="margin-left:10px;">Núm.</label>
             </div>
             <div class="col-3 form-floating">
               <input type="text" name="city" class="form-control form-control-sm" id="cidade" placeholder="name@example.com" required>
               <label for="floatingInput4" style="margin-left:10px;">Cidade</label>
             </div>

             <!-- País e Estado -->
             <div class="col-3">
               <label class="visually-hidden" for="specificSizeSelect">Estado</label>
                <select class="form-select form-control-lg" style="height:60px;" id="estado" name="state" required>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
                <option value="EX">Estrangeiro</option>
               </select>
             </div>
             <div class="col-4">
               <label class="visually-hidden" for="specificSizeSelect">País</label>
                <select class="form-select form-control-lg" style="height:60px;" id="specificSizeSelect" name="country" required>
                <option value="AA">Aruba</option>
                    <option value="AC">Antígua e Barbuda</option>
                    <option value="AE">Emirados Árabes Unidos</option>
                    <option value="AF">Afeganistão</option>
                    <option value="AG">Argélia</option>
                    <option value="AJ">Azerbaijão</option>
                    <option value="AL">Albânia</option>
                    <option value="AM">Armênia</option>
                    <option value="AN">Andorra</option>
                    <option value="AO">Angola</option>
                    <option value="AQ">Samoa Americana</option>
                    <option value="AR">Argentina</option>
                    <option value="AS">Austrália</option>
                    <option value="AT">Ilhas Ashmore e Cartier</option>
                    <option value="AU">Áustria</option>
                    <option value="AV">Anguilla</option>
                    <option value="AX">Acrotíri</option>
                    <option value="AY">Antártica</option>
                    <option value="AZ">açores</option>
                    <option value="BA">Bahrain</option>
                    <option value="BB">Barbados</option>
                    <option value="BC">Botswana</option>
                    <option value="BD">Bermudas</option>
                    <option value="BE">Bélgica</option>
                    <option value="BF">Bahamas</option>
                    <option value="BG">Bangladesh</option>
                    <option value="BH">Belize</option>
                    <option value="BK">Bósnia e Herzegovina</option>
                    <option value="BL">Bolívia</option>
                    <option value="BM">Birmânia Myanmar</option>
                    <option value="BN">Benim</option>
                    <option value="BO">Bielorrússia</option>
                    <option value="BP">Ilhas Salomão</option>
                    <option value="BQ">Ilha Navassa</option>
                    <option value="BR" selected>Brasil</option>
                    <option value="BT">Butão</option>
                    <option value="BU">Bulgária</option>
                    <option value="BV">Ilha Bouvet</option>
                    <option value="BX">Brunei</option>
                    <option value="BY">Burundi</option>
                    <option value="CA">Canadá</option>
                    <option value="CB">Camboja</option>
                    <option value="CD">Chade</option>
                    <option value="CE">Sri Lanka</option>
                    <option value="CF">República do Congo</option>
                    <option value="CG">República Democrática do Congo</option>
                    <option value="CH">República Popular da China</option>
                    <option value="CL">Chile</option>
                    <option value="CJ">Ilhas Cayman</option>
                    <option value="CK">Ilhas Cocos Keeling</option>
                    <option value="CM">Camarões</option>
                    <option value="CN">Comores</option>
                    <option value="CO">Colômbia</option>
                    <option value="CQ">Ilhas Marianas do Norte</option>
                    <option value="CR">Ilhas do Mar de Coral</option>
                    <option value="CS">Costa Rica</option>
                    <option value="CT">República Centro-Africana</option>
                    <option value="CU">Cuba</option>
                    <option value="CV">Cabo Verde</option>
                    <option value="CW">Ilhas Cook</option>
                    <option value="CY">Chipre</option>
                    <option value="CZ">República Tcheca</option>
                    <option value="DA">Dinamarca</option>
                    <option value="DJ">Djibouti</option>
                    <option value="DO">Dominica</option>
                    <option value="DQ">Ilha Jarvis</option>
                    <option value="DR">República Dominicana</option>
                    <option value="DX">Deceleia</option>
                    <option value="EC">Equador</option>
                    <option value="EG">Egito</option>
                    <option value="EI">Irlanda</option>
                    <option value="EK">Guiné Equatorial</option>
                    <option value="EN">Estónia</option>
                    <option value="ER">Eritreia</option>
                    <option value="ES">El Salvador</option>
                    <option value="ET">Etiópia</option>
                    <option value="EZ">República Checa</option>
                    <option value="FG">Guiana Francesa</option>
                    <option value="FI">Finlândia</option>
                    <option value="FJ">Fiji</option>
                    <option value="FK">Ilhas Falkland Ilhas Malvinas</option>
                    <option value="FM">Estados Federados da Micronésia</option>
                    <option value="FO">Ilhas Feroe</option>
                    <option value="FP">Polinésia Francesa</option>
                    <option value="FQ">Ilha Baker</option>
                    <option value="FR">França</option>
                    <option value="FS">Terras Austrais e Antárticas Francesas</option>
                    <option value="GA">Gâmbia</option>
                    <option value="GB">Gabão</option>
                    <option value="GF">Guiana francesa</option>
                    <option value="GG">Geórgia</option>
                    <option value="GH">Gana</option>
                    <option value="GI">Gibraltar</option>
                    <option value="GJ">Granada</option>
                    <option value="GK">Guernsey</option>
                    <option value="GL">Gronelândia</option>
                    <option value="GM">Alemanha</option>
                    <option value="GP">Guadalupe</option>
                    <option value="GQ">Guam</option>
                    <option value="GR">Grécia</option>
                    <option value="GT">Guatemala</option>
                    <option value="GV">Guiné</option>
                    <option value="GW">Guiné-Bissau</option>
                    <option value="GY">Guiana</option>
                    <option value="GZ">Faixa de Gaza</option>
                    <option value="HA">Haiti</option>
                    <option value="HK">Hong Kong</option>
                    <option value="HM">Ilha Heard e Ilhas McDonald</option>
                    <option value="HO">Honduras</option>
                    <option value="HQ">Ilha Howland</option>
                    <option value="HR">Croácia</option>
                    <option value="HU">Hungria</option>
                    <option value="IC">Islândia</option>
                    <option value="ID">Indonésia</option>
                    <option value="IM">Ilha de Man</option>
                    <option value="IN">Índia</option>
                    <option value="IO">Território Britânico do Oceano Índico</option>
                    <option value="IP">Ilha de Clipperton</option>
                    <option value="IR">Irão</option>
                    <option value="IS">Israel</option>
                    <option value="IT">Itália</option>
                    <option value="CI">Costa do Marfim</option>
                    <option value="IZ">Iraque</option>
                    <option value="JP">Japão</option>
                    <option value="JE">Jersey</option>
                    <option value="JM">Jamaica</option>
                    <option value="JN">Jan Mayen</option>
                    <option value="JO">Jordânia</option>
                    <option value="JQ">Atol Johnston</option>
                    <option value="KE">Quénia</option>
                    <option value="KG">Quirguistão</option>
                    <option value="KN">Coreia do Norte</option>
                    <option value="KQ">Recife Kingman</option>
                    <option value="KR">Kiribati</option>
                    <option value="KS">Coreia do Sul</option>
                    <option value="KT">Ilha Christmas</option>
                    <option value="KU">Kuwait</option>
                    <option value="KV">Cazaquistão</option>
                    <option value="LA">Laos</option>
                    <option value="LE">Líbano</option>
                    <option value="LG">Letónia</option>
                    <option value="LH">Lituânia</option>
                    <option value="LI">Libéria</option>
                    <option value="LO">Eslováquia</option>
                    <option value="LP">Latin Purificado</option>
                    <option value="LQ">Atol Palmyra</option>
                    <option value="LS">Liechtenstein</option>
                    <option value="LT">Lesoto</option>
                    <option value="LU">Luxemburgo</option>
                    <option value="LY">Líbia</option>
                    <option value="MA">Marrocos</option>
                    <option value="MB">Martinica</option>
                    <option value="MC">Macau</option>
                    <option value="MD">Moldávia</option>
                    <option value="ME">Madeira</option>
                    <option value="MF">Mayotte</option>
                    <option value="MG">Mongólia</option>
                    <option value="MH">Montserrat</option>
                    <option value="MI">Malawi</option>
                    <option value="MJ">Montenegro</option>
                    <option value="MK">Macedônia</option>
                    <option value="ML">Mali</option>
                    <option value="MN">Mônaco</option>
                    <option value="MP">Maurícia</option>
                    <option value="MQ">Atol de Midway</option>
                    <option value="MR">Mauritânia</option>
                    <option value="MT">Malta</option>
                    <option value="MU">Omã</option>
                    <option value="MV">Maldivas</option>
                    <option value="MX">México</option>
                    <option value="MY">Malásia</option>
                    <option value="MZ">Moçambique</option>
                    <option value="NC">Nova Caledônia</option>
                    <option value="NE">Niue</option>
                    <option value="NF">Ilha Norfolk</option>
                    <option value="NG">Níger</option>
                    <option value="NH">Vanuatu</option>
                    <option value="NI">Nigéria</option>
                    <option value="NL">Países Baixos</option>
                    <option value="NO">Noruega</option>
                    <option value="NP">Nepal</option>
                    <option value="NR">Nauru</option>
                    <option value="NS">Suriname</option>
                    <option value="NT">Antilhas Holandesas</option>
                    <option value="NU">Nicarágua</option>
                    <option value="NZ">Nova Zelândia</option>
                    <option value="PA">Paraguai</option>
                    <option value="PC">Ilhas Pitcairn</option>
                    <option value="PE">Peru</option>
                    <option value="PF">Ilhas Paracel</option>
                    <option value="PG">Ilhas Spratly</option>
                    <option value="PK">Paquistão</option>
                    <option value="PL">Polônia</option>
                    <option value="PM">Panamá</option>
                    <option value="PT">Portugal</option>
                    <option value="PP">Papua-Nova Guiné</option>
                    <option value="PS">Palau</option>
                    <option value="PU">Guiné-Bissau</option>
                    <option value="QA">Qatar</option>
                    <option value="RE">Reunião</option>
                    <option value="RI">Sérvia</option>
                    <option value="RM">Ilhas Marshall</option>
                    <option value="RN">Saint Martin</option>
                    <option value="RO">Roménia</option>
                    <option value="RP">Filipinas</option>
                    <option value="RQ">Porto Rico</option>
                    <option value="RS">Rússia</option>
                    <option value="RW">Ruanda</option>
                    <option value="SA">Arábia Saudita</option>
                    <option value="SB">Saint Pierre e Miquelon</option>
                    <option value="SC">São Cristóvão e Nevis</option>
                    <option value="SE">Seychelles</option>
                    <option value="SF">África do Sul</option>
                    <option value="SG">Senegal</option>
                    <option value="SH">Santa Helena território</option>
                    <option value="SI">Eslovénia</option>
                    <option value="SL">Serra Leoa</option>
                    <option value="SM">San Marino</option>
                    <option value="SN">Singapura</option>
                    <option value="SO">Somália</option>
                    <option value="SP">Espanha</option>
                    <option value="ST">Santa Lúcia</option>
                    <option value="SU">Sudão</option>
                    <option value="SV">Svalbard</option>
                    <option value="SW">Suécia</option>
                    <option value="SX">Ilhas Geórgia do Sul e Sandwich do Sul</option>
                    <option value="SY">Síria</option>
                    <option value="SZ">Suiça</option>
                    <option value="TB">Saint-Barthélemy Antilhas francesas</option>
                    <option value="TD">Trinidad e Tobago</option>
                    <option value="TH">Tailândia</option>
                    <option value="TI">Tadjiquistão</option>
                    <option value="TK">Ilhas Turks e Caicos</option>
                    <option value="TL">Tokelau</option>
                    <option value="TN">Tonga</option>
                    <option value="TO">Togo</option>
                    <option value="TP">São Tomé e Príncipe</option>
                    <option value="TS">Tunísia</option>
                    <option value="TT">Timor-Leste</option>
                    <option value="TR">Turquia</option>
                    <option value="TV">Tuvalu</option>
                    <option value="TW">Taiwan</option>
                    <option value="TX">Turquemenistão</option>
                    <option value="TZ">Tanzânia</option>
                    <option value="UG">Uganda</option>
                    <option value="UK">Reino Unido</option>
                    <option value="UP">Ucrânia</option>
                    <option value="US">Estados Unidos</option>
                    <option value="UV">Burkina Faso</option>
                    <option value="UY">Uruguai</option>
                    <option value="UZ">Uzbequistão</option>
                    <option value="VC">São Vicente e Granadinas</option>
                    <option value="VE">Venezuela</option>
                    <option value="VI">Ilhas Virgens Britânicas</option>
                    <option value="VM">Vietname</option>
                    <option value="VQ">Ilhas Virgens Americanas</option>
                    <option value="VT">Vaticano</option>
                    <option value="WA">Namíbia</option>
                    <option value="WE">Cisjordânia</option>
                    <option value="WF">Wallis e Futuna</option>
                    <option value="WI">Saara Ocidental</option>
                    <option value="WQ">Ilha Wake</option>
                    <option value="WS">Samoa</option>
                    <option value="WZ">Suazilândia</option>
                    <option value="YM">Iémen</option>
                    <option value="ZA">Zâmbia</option>
                    <option value="ZI">Zimbabwe</option>
               </select>
             </div>
             <!-- País e Estado -->
             <div class="col-5 form-floating">
               <input type="text" name="home_situation" class="form-control" id="bairro" placeholder="name@example.com" required>
               <label for="floatingInput2" style="margin-left:10px;">Bairro</label>
              
             </div>
             <hr>
             <div class="col-4">
               <label class="visually-hidden" for="specificSizeSelect">Estado Civil</label>
                <select class="form-select form-control-lg" style="height:60px;" id="specificSizeSelect" name="state" required>
                <option value="1">Solteiro(a)</option>
                <option value="2">Casado(a)</option>
                <option value="3">União Estavel</option>
                <option value="4">Divorciado</option>
                <option value="5">Separado</option>
                <option value="6">Viúvo(a)</option>
                <option value="7">Namorando</option>
                
               </select>
             </div>
             <div class="col-4">
               <label class="visually-hidden" for="specificSizeSelect">Trabalho</label>
                <select class="form-select form-control-lg" style="height:60px;" id="specificSizeSelect" name="work_state" required>
                <option value="1">Empregado</option>
                <option value="2">Desempregado</option>
                <option value="3">Autonomo(a)</option>
                <option value="4">Empresário</option>
                <option value="5">Lojista</option>
                <option value="6">Pequeno Negócio</option>
                <option value="7">Jovem Aprendiz</option>
                
               </select>
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
               <input type="text" name="mother_name" class="form-control" id="floatingInput2" placeholder="name@example.com" required>
               <label for="floatingInput2" style="margin-left:10px;">Nome da Mãe</label>
             </div>
             <div class="col-4 form-floating">
               <input type="text" name="father_name" class="form-control" id="floatingInput2" placeholder="name@example.com" required>
               <label for="floatingInput2" style="margin-left:10px;">Nome do Pai</label>
             </div>
             <div class="col-4 form-floating">
               <input type="text" name="familly_qntd" class="form-control" id="floatingInput2" placeholder="name@example.com" required>
               <label for="floatingInput2" style="margin-left:10px;">Num. Pessoas(Na mesma casa)</label>
             </div>
            <hr>
            <div class="col-5">
                <label for="formFile" class="form-label">Foto de perfil(opcional)</label>
                <input class="form-control" type="file" id="formFile" name="photo" accept="image/*">
            </div>
             <div class="mb-3">
                <button type="submit" class="btn btn-sm btn-success mdi mdi-check-circle"> Salvar e Enviar</button>
                <a href="<?php echo $domain; ?>admin/turmas/crisma" class="btn btn-sm btn-danger mdi mdi-close-circle"> Voltar</a>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>         
</body>
</html>