<?php include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisMatriz - Hierarquia sistemática</title>
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
 <main class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
         <nav aria-label="breadcrumb" class="spacement-div">
           <ol class="breadcrumb pagination-st">
             <li class="breadcrumb-item"><a href="<?php echo $domain; ?>admin">Home</a></li>
             <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
             <li class="breadcrumb-item active" aria-current="page">Hierarquia</li>  
          </ol>
         </nav>

         <div class="spacement-div">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                         <span class="h2 mb-2">Hierarquia</span>
                         <div class="alert alert-warning alert-dismissible fade show" role="alert">
                           <strong>Atenção!</strong> Hierarquia é o método de organização no sistema de poderes e permissões, são não editáveis!
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         <hr>
                          <table class="table">
                             <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Cargos</th>
                                <th scope="col">Responsável</th>
                                <th scope="col">Situação</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                   <th scope="row">1</th>
                                   <td>Adm. Resp</td>
                                   <td>Vinicius Aquino</td>
                                   <td><span class="badge text-bg-success mdi mdi-check"> Aprovado</span></td>
                                </tr>
                                <tr>
                                  <th scope="row">2</th>
                                  <td>Secretaria</td>
                                  <td>Jayse</td>
                                  <td><span class="badge text-bg-success mdi mdi-check"> Aprovado</span></td>
                                </tr>
                                <tr>
                                   <th scope="row">3</th>
                                  <td>Coordenador</td>
                                  <td>John Doe</td>
                                  <td><span class="badge text-bg-success mdi mdi-check"> Aprovado</span></td>
                                </tr>
                                <tr>
                                   <th scope="row">4</th>
                                  <td>Min. Pascom</td>
                                  <td>Adailton</td>
                                  <td><span class="badge text-bg-success mdi mdi-check"> Aprovado</span></td>
                                </tr>
                                <tr>
                                   <th scope="row">5</th>
                                  <td>Min. Música</td>
                                  <td>José Fernandes</td>
                                  <td><span class="badge text-bg-success mdi mdi-check"> Aprovado</span></td>
                                </tr>
                                <tr>
                                   <th scope="row">6</th>
                                  <td>Min. Acólito</td>
                                  <td>Tamires Oliveira</td>
                                  <td><span class="badge text-bg-success mdi mdi-check"> Aprovado</span></td>
                                </tr>
                              </tbody>
                            </table>
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