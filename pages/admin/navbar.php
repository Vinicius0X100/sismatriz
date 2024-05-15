<style>
    .icone-checkbox {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
        /* Estilos para o modo noturno */
        .modo-noturno {
      background-color: #000;
      color: #fff;
    }
    .modo-noturno .icone-checkbox{
      color:#fff!important;
    }
</style>
<nav class="navbar navbar-expand-lg text-light" style="background-color:rgb(17, 16, 29);">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"></a>
        </li>
        <li class="nav-item">
        
          
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
      <div class="navbar-text">
      <div class="form-check form-switch">
          <input class="form-check-input visually-hidden" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
          <label class="form-check-label" for="flexSwitchCheckChecked">
            <span id="modoIcone" class=" icone-checkbox mdi mdi-weather-sunny"></span>
          </label>
        </div>
      </div>
    </div>
  </div>
</nav>

<script src="<?php echo $domain; ?>js/theme-mode.js"></script>