<?php
  include $_SERVER['DOCUMENT_ROOT']."/pages/admin/header.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisMatriz - Acólitos e Coroinhas</title>
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
 <div class="modal" id="confirmacaoExclusaoModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar Exclusão</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Tem certeza de que deseja deletar este acólito?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="deletarAcolito()">Deletar</button>
            </div>
        </div>
    </div>
</div>

    <div class="row p-2">
     <div class="col-lg-12 mt-5">
      <nav aria-label="breadcrumb" class="spacement-div">
        <ol class="breadcrumb pagination-st">
         <li class="breadcrumb-item"><a href="<?php echo $domain; ?>admin">Home</a></li>
         <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
         <li class="breadcrumb-item active" aria-current="page">Min. Acólitos</li>
         <li class="breadcrumb-item active" aria-current="page">Acólitos e Coroinhas Listagem</li>
       </ol>
      </nav>

      <div class="spacement-div">
         <div class="row">
          <div class="col-lg-12 mb-2">
           <a href="<?php echo $domain; ?>admin/ac/efetivados/add" class="btn btn-dark btn-sm"><span class="mdi mdi-plus"></span> Adicionar</a>                               
          </div>
          <div class="col-lg-12 mb-2">
          <div class="card">
           <div class="card-body">
           <form class="mb-3" method="get">
              <div class="row mb-2">
                <div class="col-lg-12">
                   <input type="text" id="searchInput" class="form-control" placeholder="Pesquise por nome...">
                </div>
               </div>
           </form>
           <table class="table table-stripd table-sm table-bordered table-hover text-center">
            <thead class="table-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col"><span class="mdi mdi-church"></span> Servem em</th>
                <th scope="col"><span class="mdi mdi-stairs"></span> Nível</th>
                <th scope="col">Idade</th>
                <th scope="col">Ano de formação</th>
                <th scope="col"><span class="mdi mdi-list-status"></span> Status</th>
                <th scope="col"></th>
              </tr>
            </thead>
             <tbody>
              <?php    
               $consulta = "SELECT * FROM acolitos ORDER BY id DESC";
               $con = $mysqli->query($consulta) or die (@mysqli_error());
               $escala_queried = $con->fetch_all(MYSQLI_ASSOC);
              ?>
              <?php foreach($escala_queried as $info): ?>
                <tr style="font-size:15px;">
                 <th scope="row"><?php echo $info['id']; ?></th>
                  <td><?php echo $info['name']; ?></td>
                  <td><?php echo $info['church']; ?></td>
                  <td>
                    <?php if($info['type'] == 0): ?>
                     <span class="badge text-bg-primary">Acólito</span>
                    <?php elseif($info['type'] == 1): ?>
                     <span class="badge text-bg-danger">Coroinha</span>
                    <?php endif; ?>
                  </td>
                  <td><?php echo $info['age']; ?></td>  
                  <td><?php echo $info['graduation_year']; ?></td>  
                  <td>
                    <?php if($info['status'] == 0): ?>
                     <span class="badge text-bg-success mdi mdi-check-circle">Ativo</span>
                    <?php elseif($info['status'] == 1): ?>
                     <span class="badge text-bg-danger">Desligado</span>
                    <?php endif; ?>
                  </td>   
                  <td>
                    <a href="<?php echo $domain; ?>admin/ac/efetivados/edit-acolito/<?php echo $info['id']; ?>/<?php echo $info['id']; ?>" class="btn btn-success btn-sm"><span class="mdi mdi-pencil"></span></a>
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
     </div>
    </div>
 </main>

 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <script>
   // Função para confirmar a exclusão e abrir o modal de confirmação
   function confirmarExclusao(acolitoId) {
        $('#confirmacaoExclusaoModal').modal('show');
        $('#confirmacaoExclusaoModal').data('acolitoId', acolitoId); // Armazena o ID do usuário no modal
    }

    // Função para deletar o usuário
    function deletarAcolito() {
        var acolitoId = $('#confirmacaoExclusaoModal').data('acolitoId');

        // Fazer requisição AJAX para deletar o usuário
        $.ajax({
            type: 'POST',
            url: '../../core/deleteAcolito.php',
            data: { acolitoId: acolitoId },
            success: function(response) {
                // Exibir mensagem de sucesso ou recarregar a página
                alert('Acólito deletado com sucesso!');
                window.location.reload(); // Recarregar a página para refletir as alterações
            },
            error: function(xhr, status, error) {
                console.error(error); // Exibir erros no console em caso de problemas
                alert('Ocorreu um erro ao deletar o acólito.');
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
            url: '../../core/SearchTableAcolitos.php',
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

<?php include $_SERVER['DOCUMENT_ROOT']."/pages/admin/footer.php"; ?> 
</body>
</html>