 <!--Inicio Sidebar-->
 <div class="sidebar close">
      
      <div class="logo-details">
        
        <i class="bx bx-menu"></i>
        <span class="logo_name">SisMatriz</span>
     
      </div>
      
      <ul class="nav-links">
      
        <li>
          
          <a href="<?php echo $domain; ?>admin">
            <i class='bx bx-grid-alt' ></i>
            <span class="link_name">Dashboard</span>
          </a>
            
          <ul class="sub-menu blank">
            <li><a class="link_name" href="<?php echo $domain; ?>admin">Home</a></li>
          </ul>
          
        </li>
        
        <li>  
          <div class="iocn-link">           
            <a href="#">
              <i class='bx bx-collection' ></i>
              <span class="link_name">Turmas</span>
            </a>           
            <i class='bx bxs-chevron-down arrow' ></i>         
          </div>         
          <ul class="sub-menu">            
            <li><a class="link_name" href="#">Turmas</a></li>
            <li><a href="<?php echo $domain; ?>admin/turmas/crisma">Crisma</a></li>
            <li><a href="<?php echo $domain; ?>admin/turmas/catequese">Catequese</a></li>
            <li><a href="<?php echo $domain; ?>admin/turmas/acolitos">Acólitos</a></li>
            <li><a href="<?php echo $domain; ?>admin/turmas/escola">Escola</a></li>         
          </ul>          
        </li> 

        <li>  
          <div class="iocn-link">           
            <a href="#">
              <i class='mdi mdi-star-four-points-circle' ></i>
              <span class="link_name">Min. Acólitos</span>
            </a>           
            <i class='bx bxs-chevron-down arrow' ></i>         
          </div>         
          <ul class="sub-menu">            
            <li><a class="link_name" href="#">Min. Acólitos</a></li>
            <li><a href="<?php echo $domain; ?>admin/ac/escalas">Escalas</a></li>
            <li><a href="<?php echo $domain; ?>admin/ac/efetivados">Acólitos/Coroinhas</a></li>
                 
          </ul>          
        </li> 
        
        
        <li>
          
          <div class="iocn-link">
            
            <a href="#">
              <i class='bx bx-book-alt' ></i>
              <span class="link_name">Registros</span>
            </a>
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
          </div>
          
          <ul class="sub-menu">
          
            <li><a class="link_name" href="#">Registros</a></li>
            <li><a href="<?php echo $domain; ?>admin/social-assistant">Assistencia Social</a></li>
            <li><a href="<?php echo $domain; ?>admin/registers">Cadastros</a></li>
          
          </ul>
        </li>
        <li>
          
          <a href="<?php echo $domain; ?>admin/events">
            <i class='mdi mdi-party-popper' ></i>
            <span class="link_name">Eventos</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="<?php echo $domain; ?>admin/events">Eventos</a></li>
          </ul>
        </li>
        
        <li>
          
          <a href="<?php echo $domain; ?>admin/financial">
            <i class='bx bx-line-chart' ></i>
            <span class="link_name">Financeiro</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="<?php echo $domain; ?>admin/financial">Financeiro</a></li>
          </ul>
        </li>
        <li>

        
          
          <div class="iocn-link">
          
            <a href="#">
              <i class='mdi mdi-shield-crown' ></i>
              <span class="link_name">Administração</span>
            </a>
            
            <i class='bx bxs-chevron-down arrow' ></i>
            
          </div>
          
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Administração</a></li>
            <li><a href="<?php echo $domain; ?>admin/hierarchy">Hierarquia</a></li>
            <li><a href="<?php echo $domain; ?>admin/system-verify">Verificação de Sistema</a></li>
            <li><a href="#">Uploads</a></li>
          </ul>
        </li>
        
        <li>
        
          <a href="<?php echo $domain; ?>admin/explore">
            <i class='bx bx-compass' ></i>
            <span class="link_name">Explorar</span>
          </a>
          
          <ul class="sub-menu blank">
            <li><a class="link_name" href="<?php echo $domain; ?>admin/explore">Explorar</a></li>
          </ul>
        </li>
        <li>
          
          <a href="#">
            <i class='mdi mdi-account-network-outline'></i>
            <span class="link_name">Usuários SM (Adm)</span>
          </a>
          
          <ul class="sub-menu blank">
            <li><a class="link_name" href="<?php echo $domain; ?>admin/sm-users">Usuários SM (Adm)</a></li>
          </ul>
        </li>
          
        <li>
          
          <a href="<?php echo $domain; ?>admin/settings">
            <i class='bx bx-cog' ></i>
            <span class="link_name">Configurações</span>
          </a>
          
          <ul class="sub-menu blank">
            <li><a class="link_name" href="<?php echo $domain; ?>admin/settings">Configurações</a></li>
          </ul>
        </li>
        <li>
      
          <div class="profile-details">
            
            <div class="profile-content">
              <!--<img src="image/profile.jpg" alt="profileImg">-->
            </div>
            
            <div class="name-job">
              
              <div class="profile_name"><?php echo $v['name']; ?></div>
              <?php if($v['rule'] == 1):?>
               <div class="job">Adm. Resp</div>
              <?php elseif($v['rule'] == 2): ?>
                <div class="job">Secretaria</div>
              <?php elseif($v['rule'] == 3): ?>
                <div class="job">Coordenador</div>
              <?php elseif($v['rule'] == 4): ?>
                <div class="job">Min. Pascom</div>
              <?php elseif($v['rule'] == 5): ?>
                <div class="job">Min. Musica</div>
              <?php elseif($v['rule'] == 6): ?>
                <div class="job">Min. Acólito</div>
              <?php endif; ?>
            </div>
            
           <a href="<?php echo $domain; ?>admin/logout"><i class="bx bx-log-out"></i></a>
          
          </div>
        
        </li>
      </ul><!--Fecha ul-->
    </div>
    <!--Fecha Sidebar-->
     <!-- Spinner -->
  <div id="loader">
    <div class="text-center">
      <div class="spinner-grow text-dark" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
     </div>
  </div>