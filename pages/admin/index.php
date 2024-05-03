<?php


if(file_exists($_SERVER['DOCUMENT_ROOT']."/core/config.php"))
{
  include $_SERVER['DOCUMENT_ROOT']."/core/config.php";
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";
}else{
  echo "Arquivo CONFIG.PHP inexistente! Confira os arquivos base do site, ou tente novamente mais tarde!";
  
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisMatriz - Dashboard</title>
    <link rel="stylesheet" href="<?php echo $domain; ?>/css/global.css" />
    <link rel="stylesheet" href="<?php echo $domain; ?>/css/sidebar-adm.css" />
    <link rel="icon" type="image/x-icon" href="<?php echo $domain; ?>/img/logo.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/2546cc9843.js" crossorigin="anonymous"></script>
    <style>
    
       .sidebar{
         font-family:var(--font-default)!important;
       }
       .spacement-div{
         margin-left:6.5vw;
         
       }
       
 
    </style>
    
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
   <?php include $_SERVER['DOCUMENT_ROOT']."/pages/admin/sidebar.php"; ?>

   <main class="container-fluid">
    <div class="row p-2">
     
      <div class="col-lg-12 mb-3">
        <div class="spacement-div">
          
        <img width="50" height="50" style="margin-top:23px;" src="<?php echo $domain; ?>/img/logo.png">
        <div class="colunm-header left-head">
          <span class="title">Nossa Senhora do Rosário</span>
          <span class="lead">SisMatriz</span>
         </div>
         <nav aria-label="breadcrumb">
           <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="<?php echo $domain; ?>admin">Home</a></li>
             <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
         </nav>
        <div class="card mt-3">
          <div class="card-body">
            <span class="lead">Olá, <?php echo $v['name']; ?></span>
          </div>
         </div>
        </div>
      </div>

      <div class="col-md-4 mb-3">
       <div class="spacement-div">
        <div class="card">             
         <div class="card-body">
          <span class="lead">Total de Registros</span>
          <hr>
          <span class="display-5 mdi mdi-badge-account">
          <?php
           
            // Consulta SQL para contar o número de registros
            $consulta = "SELECT COUNT(*) as total_registros FROM registers";
            $resultado = $mysqli->query($consulta) or die(mysqli_error($mysqli));

            // Extrai o número total de registros
            $total_registros = $resultado->fetch_assoc()['total_registros'];

            // Exibe o resultado em um echo
            echo $total_registros;
            ?>
          </span>
         </div>
        </div> 
       </div>
      </div>
      <div class="col-md-4">
         <div class="card">         
          <div class="card-body">
          <canvas id="myChart" style="width:100%;">
            <p>Hello Fallback World</p>
          </canvas>
         </div>      
       </div>
      </div>
    </div>
   </main>


   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
   <script>
      const totalRegistros = <?php echo $total_registros; ?>;

const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Total de Registros'],
        datasets: [{
            label: 'Total de Registros',
            data: [totalRegistros],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


   </script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="<?php echo $domain; ?>/js/spinner.js"></script>
  <script src="<?php echo $domain; ?>/js/sidebar-adm.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>  

</body>
</html>