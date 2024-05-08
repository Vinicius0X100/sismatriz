<nav class="navbar navbar-expand-lg navbar-light shadow">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" class="fw-bold" href="<?php echo $domain; ?>admin"><img width="50" height="50" style="margin-left:3vw;" src="<?php echo $domain; ?>/img/logo.png"> SisMatriz</a>
          
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
          <?php
           
           if($row['counter_st'] == 0){
             echo "
             <div class='alert alert-warning d-flex align-items-center' role='alert'>
             <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Warning:'><use xlink:href='#exclamation-triangle-fill'/></svg>
             <div>
               Operações matemáticas desligadas, entre em contato com seu <strong>administrador</strong> para mais informações!
             </div>
           </div>
             ";
           }
            ?>
        </li>
      </ul>
      <span class="navbar-text">
        <button id="modo-escuro-btn" class="btn btn-dark btn-sm mdi mdi-moon-waning-crescent"> Noturno</button>
      </span>
    </div>
  </div>
</nav>