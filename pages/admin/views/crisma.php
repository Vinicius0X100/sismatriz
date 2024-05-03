<?php
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisMatriz | Turmas | Crisma</title>
    <link rel="stylesheet" href="<?php echo $domain; ?>/css/sidebar-adm.css" />
    <link rel="stylesheet" href="<?php echo $domain; ?>/css/global.css" />
    <link rel="icon" type="image/x-icon" href="<?php echo $domain; ?>/img/logo.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/2546cc9843.js" crossorigin="anonymous"></script>
    <style>
        .pagination-st li a{
            text-decoration:none;
            cursor:pointer;
            
        }
        .panel-table{
            font-family:var(--font-default);
        }
        .upbtns{
            justify-content:space-between;
        }
    </style>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT']."/pages/admin/sidebar.php"; ?>
        <main class="container-fluid">
            <div class="row p-2">
                <div class="col-lg-9 mt-5">
                
                   <nav aria-label="breadcrumb" class="spacement-div">
                     <ol class="breadcrumb pagination-st">
                       <li class="breadcrumb-item"><a href="<?php echo $domain; ?>admin">Home</a></li>
                       <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                       <li class="breadcrumb-item active" aria-current="page">Turmas</li>
                       <li class="breadcrumb-item active" aria-current="page">Crisma</li>
                     </ol>
                    </nav>
                
                  <div class="spacement-div mt-5">
                  <div class="row mb-2">
                      <div class="col-md-4">
                        <a href="<?php echo $domain; ?>admin/turmas/crisma/add" class="btn btn-dark btn-sm"><span class="mdi mdi-plus"></span> Lançar Turma</a>                               
                      </div>
                     </div>
                    <div class="card panel-table">
                        <div class="card-body">
                            <div class="mb-2">
                                    <div class="col-md-7">
                                     <span>Turmas para Crisma</span>
                                    </div>
                             </div> 
                          <table class="table table-stripd table-sm table-bordered table-hover">
                             <thead class="table-dark">
                                <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Turma</th>
                                 <th scope="col">Tutor responsável</th>
                                 <th scope="col">Data de Inicio</th>
                                 <th scope="col">Data de Término</th>
                                 <th scope="col">Qtnd. Alunos</th>
                                 <th scope="col">Status</th>
                                 <th scope="col"></th>
                                </tr>
                             </thead>
                             <tbody>
                             <?php    
                               $consulta = "SELECT * FROM turmas ORDER BY id DESC";
                               $con = $mysqli->query($consulta) or die (@mysqli_error());
                               $turma_queried = $con->fetch_all(MYSQLI_ASSOC);
                             ?>
                             <?php foreach($turma_queried as $info): ?>
                                <tr style="font-size:15px;">
                                     <th scope="row"><?php echo $info['id']; ?></th>
                                     <td><?php echo $info['turma']; ?></td>
                                     <td><?php echo $info['tutor']; ?></td>
                                     <td><?php echo $info['inicio']; ?></td>
                                     <td><?php echo $info['termino']; ?></td>
                                     <td><?php echo $info['alunos_qntd']; ?></td>
                                     <td>
                                     <?php if($info['status'] == 1): ?>
                                        <span class="badge text-bg-secondary">Não iniciada</span>
                                     <?php elseif($info['status'] == 2): ?>
                                        <span class="badge text-bg-success">Formada</span>
                                     <?php elseif($info['status'] == 3): ?>
                                        <span class="badge text-bg-warning">Em progresso</span>
                                     <?php elseif($info['status'] == 4): ?>
                                        <span class="badge text-bg-danger">Cancelada</span>
                                     <?php endif; ?>
                                    
                                     </td>
                                     <td>
                                        <a href="#" class="btn btn-primary btn-sm"><span class="mdi mdi-eye"></span></a>
                                        <a href="#" class="btn btn-success btn-sm"><span class="mdi mdi-pencil"></span></a>
                                        <a href="#" class="btn btn-danger btn-sm"><span class="mdi mdi-trash-can"></span></a>
                                    </td>
                                </tr>
                                <?php endforeach?>
                             </tbody>
                          </table>
                        </div>
                    </div>
                   </div>
                </div>
                
                <div class="col-lg-3" style="margin-top:7.6rem !important;">
                    <div class="card">
                      <div class="card-body">
                       <span class="fs-4">Niveis de progresso</span>
                       <hr>
                       <span class="badge text-bg-secondary">Não Iniciada</span>
                       <br>
                       <span class="badge text-bg-success">Formada</span>
                       <br>
                       <span class="badge text-bg-warning">Em progresso</span>
                       <br>
                       <span class="badge text-bg-danger">Cancelada</span>
                       <br>
                      </div>
                   </div>
                </div>
            </div>
        </main>
    <script src="<?php echo $domain; ?>/js/sidebar-adm.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo $domain; ?>/js/spinner.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>      
</body>
</html>