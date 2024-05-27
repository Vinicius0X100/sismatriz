<?php
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisMatriz - Escalas</title>
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
        <h1 class="modal-title fs-5 mdi mdi-user-account" id="exampleModalLabel">Escalas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="infoUsuarioBody">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="confirmacaoExclusaoModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar Exclusão</h5>
                <button type="button" class="close btn-time" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Tem certeza de que deseja deletar esta escala?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="deletarEscala()">Deletar</button>
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
                       <li class="breadcrumb-item active" aria-current="page">Min. Acólitos</li> 
                       <li class="breadcrumb-item active" aria-current="page">Escalas</li>  
                     </ol>
                    </nav>
                
                  <div class="spacement-div mt-5">
                  <div class="row mb-2">
                      <div class="col-lg-12">
                        <a href="<?php echo $domain; ?>admin/ac/escalas/add" class="btn btn-dark btn-sm"><span class="mdi mdi-plus"></span> Nova Escala</a>                               
                      </div>
                     </div>
                    <div class="card panel-table">
                        <div class="card-body">
                            <form class="mb-3" method="get">
                                <div class="row mb-2">
                                    <div class="col-lg-12">
                                        <input type="text" id="searchInput" class="form-control" placeholder="Digite o mês...">
                                    </div>
                                </div>
                            </form>
                          
                            <div class="mb-2">
                                <div class="col-md-7">
                                 <span style="font-family:var(--font-default)!important;">Escalas</span>
                                </div>
                             </div> 
                          <table class="table table-stripd table-sm table-bordered table-hover text-center">
                             <thead class="table-dark">
                                <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Mês</th>
                                 <th scope="col">Igreja</th>
                                 <th scope="col">Data de lançamento</th>
                                 <th scope="col">Qntd. Acólitos Escalados</th>
                                 <th scope="col">Situação</th>
                                 <th scope="col">Arquivo PDF</th>
                                 <th scope="col"></th>
                                </tr>
                             </thead>
                             <tbody>
                             <?php    
                               $consulta = "SELECT * FROM escalas ORDER BY es_id DESC";
                               $con = $mysqli->query($consulta) or die (@mysqli_error());
                               $escala_queried = $con->fetch_all(MYSQLI_ASSOC);
                             ?>
                             <?php foreach($escala_queried as $info): ?>
                                <tr style="font-size:15px;">
                                     <th scope="row"><?php echo $info['es_id']; ?></th>
                                     <td><?php echo $info['month']; ?></td>
                                     <td><?php echo $info['church']; ?></td>
                                     <td><?php echo $info['send_date']; ?></td>
                                     <td><?php echo $info['qntd_acolitos']; ?> escalados</td>
                                    
                                     <td>
                                     <?php if($info['situation'] == 0): ?>
                                        <span class="badge text-bg-warning">Em progresso</span>
                                     <?php elseif($info['situation'] == 1): ?>
                                        <span class="badge text-bg-success">Concluída</span>
                                     <?php endif; ?>
                                     </td>
                                     <td><a download href="<?php echo $domain; ?>uploads/escalas/<?php echo $info['pdf']; ?>" class="btn btn-sm btn-secondary mdi mdi-download">Download</a></td>
                                     <td>
                                        <button onClick="abrirModal(<?php echo isset($info['es_id']) ? $info['es_id'] : 0; ?>)"  class="btn btn-primary btn-sm"><span class="mdi mdi-eye"></span></button>
                                        <a href="<?php echo $domain; ?>admin/edit-escala/<?php echo $info['es_id']; ?>/<?php echo $info['es_id']; ?>" class="btn btn-success btn-sm"><span class="mdi mdi-pencil"></span></a>
                                        <button onClick="confirmarExclusao(<?php echo isset($info['es_id']) ? $info['es_id'] : 0; ?>)" class="btn btn-danger btn-sm"><span class="mdi mdi-trash-can"></span></button>
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
    function abrirModal(escalaId) {
        $('#infoUsuarioModal').modal('show');

        // Fazer requisição AJAX para carregar dados do usuário com o ID específico
        $.ajax({
            
            type: 'GET',
            url: '../../core/get_escala_info.php',
            data: { escalaId: escalaId },
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
    function deletarEscala() {
        var userId = $('#confirmacaoExclusaoModal').data('userId');

        // Fazer requisição AJAX para deletar o usuário
        $.ajax({
            type: 'POST',
            url: '../../core/deleteEscala.php',
            data: { userId: userId },
            success: function(response) {
                // Exibir mensagem de sucesso ou recarregar a página
                alert('Escala deletado com sucesso!');
                window.location.reload(); // Recarregar a página para refletir as alterações
            },
            error: function(xhr, status, error) {
                console.error(error); // Exibir erros no console em caso de problemas
                alert('Ocorreu um erro ao deletar a escala.');
            }
        });

        $('#confirmacaoExclusaoModal').modal('hide'); // Ocultar o modal de confirmação
    }



    $(document).ready(function() {
    $('#searchInput').on('input', function() {
        var searchTerm = $(this).val().trim();

        // Fazer requisição AJAX para buscar usuários com base no termo de pesquisa
        $.ajax({
            type: 'GET',
            url: '../../core/SearchTableEscala.php',
            data: { searchTerm: searchTerm },
            success: function(response) {
                // Atualizar a tabela com os resultados da pesquisa
                $('tbody').html(response); // Substituir o conteúdo da tabela
            },
            error: function(xhr, status, error) {
                console.error(error); // Exibir erros no console em caso de problemas
            }
        });
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