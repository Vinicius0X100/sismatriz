<?php
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisMatriz - Registro Geral</title>
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
<!-- Modal -->
<div class="modal fade" id="infoUsuarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 mdi mdi-user-account" id="exampleModalLabel">Ficha de Registro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="infoUsuarioBody">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="confirmacaoExclusaoModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar Exclusão</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Tem certeza de que deseja deletar este usuário?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="deletarUsuario()">Deletar</button>
            </div>
        </div>
    </div>
</div>

    <?php include $_SERVER['DOCUMENT_ROOT']."/pages/admin/sidebar.php"; ?>
        <main class="container-fluid">
            <div class="row p-2">
                <div class="col-lg-12 mt-5">
                
                   <nav aria-label="breadcrumb" class="spacement-div">
                     <ol class="breadcrumb pagination-st">
                       <li class="breadcrumb-item"><a href="<?php echo $domain; ?>admin">Home</a></li>
                       <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                       <li class="breadcrumb-item active" aria-current="page">Cadastros</li>  
                     </ol>
                    </nav>
                
                  <div class="spacement-div mt-5">
                  <div class="row mb-2">
                      <div class="col-lg-12">
                        <a href="<?php echo $domain; ?>admin/registers/add" class="btn btn-dark btn-sm"><span class="mdi mdi-plus"></span> Novo Registro</a>                               
                      </div>
                     </div>
                    <div class="card panel-table">
                        <div class="card-body">
                            <form class="mb-3" method="get">
                                <div class="row mb-2">
                                    <div class="col-lg-12">
                                        <input type="text" id="searchInput" class="form-control" placeholder="Pesquisar por nome...">
                                    </div>
                                </div>


                            </form>
                            <div class="card panel-table">
                                <div class="card-body">
                                    <div id="searchResults">
                                        <!-- Aqui serão exibidos os resultados da pesquisa -->
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="col-md-7">
                                 <span style="font-family:var(--font-default)!important;">Turmas para Crisma</span>
                                </div>
                             </div> 
                          <table class="table table-stripd table-sm table-bordered table-hover text-center">
                             <thead class="table-dark">
                                <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Nome</th>
                                 <th scope="col">E-mail</th>
                                 <th scope="col">Num. Contato</th>
                                 <th scope="col">Nascimento</th>
                                 <th scope="col">Idade</th>
                                 <th scope="col">Estado. Civil</th>
                                 <th scope="col">Cidade</th>
                                 <th scope="col">Status. Sistema</th>
                                 <th scope="col"></th>
                                </tr>
                             </thead>
                             <tbody>
                             <?php    
                               $consulta = "SELECT * FROM registers ORDER BY id DESC";
                               $con = $mysqli->query($consulta) or die (@mysqli_error());
                               $turma_queried = $con->fetch_all(MYSQLI_ASSOC);
                             ?>
                             <?php foreach($turma_queried as $info): ?>
                                <tr style="font-size:15px;">
                                     <th scope="row"><?php echo $info['id']; ?></th>
                                     <td><?php echo $info['name']; ?></td>
                                     <td><?php echo $info['email']; ?></td>
                                     <td><?php echo $info['phone']; ?></td>
                                     <td><?php echo $info['born_date']; ?></td>
                                     <td><?php echo $info['age']; ?></td>
                                     <td>
                                     <?php if($info['civil_status'] == 1): ?>
                                        <span>Solteiro</span>
                                     <?php elseif($info['civil_status'] == 2): ?>
                                        <span>Casado</span>
                                    <?php elseif($info['civil_status'] == 4): ?>
                                        <span>União Estável</span>
                                    <?php elseif($info['civil_status'] == 4): ?>
                                        <span>Divorciado</span>
                                    <?php elseif($info['civil_status'] == 5): ?>
                                        <span>Separado</span>]
                                    <?php elseif($info['civil_status'] == 6): ?>
                                        <span>Viúvo</span>
                                    <?php elseif($info['civil_status'] == 7): ?>
                                        <span>Namorando</span>
                                     <?php endif; ?>
                                     </td>
                                     <td><?php echo $info['city']; ?></td>
                                     <td>
                                     <?php if($info['status'] == 0): ?>
                                        <span class="badge text-bg-success">Em atividade</span>
                                     <?php elseif($info['status'] == 1): ?>
                                        <span class="badge text-bg-success">Inativo</span>
                                     <?php endif; ?>
                                     </td>
                                     <td>
                                        <button onClick="abrirModal(<?php echo isset($info['id']) ? $info['id'] : 0; ?>)"  class="btn btn-primary btn-sm"><span class="mdi mdi-eye"></span></button>
                                        <a href="#" class="btn btn-success btn-sm"><span class="mdi mdi-pencil"></span></a>
                                        <button onClick="confirmarExclusao(<?php echo isset($info['id']) ? $info['id'] : 0; ?>)" class="btn btn-danger btn-sm"><span class="mdi mdi-trash-can"></span></button>
                                    </td>
                                </tr>
                                <?php endforeach?>
                             </tbody>
                          </table>
                        </div>
                    </div>
                   </div>
                </div>
                
              
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
            // Função para abrir o modal e carregar o conteúdo via AJAX
    function abrirModal(userId) {
        $('#infoUsuarioModal').modal('show');

        // Fazer requisição AJAX para carregar dados do usuário com o ID específico
        $.ajax({
            
            type: 'GET',
            url: '../../core/get_user_info.php',
            data: { userId: userId },
            success: function(response) {
                $('#infoUsuarioBody').html(response); // Substitui o conteúdo do modal
                console.log(response);
            }
            
        });

    }
    </script>
    <script>
    // Função para confirmar a exclusão e abrir o modal de confirmação
    function confirmarExclusao(userId) {
        $('#confirmacaoExclusaoModal').modal('show');
        $('#confirmacaoExclusaoModal').data('userId', userId); // Armazena o ID do usuário no modal
    }

    // Função para deletar o usuário
    function deletarUsuario() {
        var userId = $('#confirmacaoExclusaoModal').data('userId');

        // Fazer requisição AJAX para deletar o usuário
        $.ajax({
            type: 'POST',
            url: '../../core/deleteRegister.php',
            data: { userId: userId },
            success: function(response) {
                // Exibir mensagem de sucesso ou recarregar a página
                alert('Usuário deletado com sucesso!');
                window.location.reload(); // Recarregar a página para refletir as alterações
            },
            error: function(xhr, status, error) {
                console.error(error); // Exibir erros no console em caso de problemas
                alert('Ocorreu um erro ao deletar o usuário.');
            }
        });

        $('#confirmacaoExclusaoModal').modal('hide'); // Ocultar o modal de confirmação
    }



    $(document).ready(function() {
        // Monitorar mudanças na barra de pesquisa
        $('#searchInput').on('input', function() {
            var searchTerm = $(this).val().trim();

            // Fazer requisição AJAX para buscar usuários com base no termo de pesquisa
            $.ajax({
                type: 'GET',
                url: '../../core/SearchTableRegister.php',
                data: { searchTerm: searchTerm },
                success: function(response) {
                    $('#searchResults').html(response); // Atualizar a área de resultados com os dados recebidos
                },
                error: function(xhr, status, error) {
                    console.error(error); // Exibir erros no console em caso de problemas
                }
            });
        });
    });
</script>
    <script src="<?php echo $domain; ?>/js/sidebar-adm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>      
</body>
</html>