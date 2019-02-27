<?php
/* 
DashBoard desenvolvida para PrivateGamesBrasil
Desenvolvido por Rafael Henrique da Silva.
Whatsapp: +1 (941) 216-6633.
Skype: .
Email: fael.co.sa@gmail.com.
Qualquer duvida de uso leia a documentação, caso restem duvidas entre em contato por um dos meios acima.
 */
?>

      <!-- top header -->
      <div class="header navbar">
        <div class="brand visible-xs">
          <!-- toggle offscreen menu -->
          <div class="toggle-offscreen">
            <a href="javascript:;" class="hamburger-icon visible-xs" data-toggle="offscreen" data-move="ltr">
              <span></span>
              <span></span>
              <span></span>
            </a>
          </div>
          <!-- /toggle offscreen menu -->
          <!-- logo -->
          <a class="brand-logo">
            <span>REACTOR</span>
          </a>
          <!-- /logo -->
        </div>
 
        <ul class="nav navbar-nav navbar-right hidden-xs">


          <li>
            <a href="javascript:;" class="ripple" data-toggle="dropdown">
              <img src="images/avatar.jpg" class="header-avatar img-circle" alt="user" title="user">
              <span><?php echo $_SESSION['nome']." ".$_SESSION['sobrenome']; ?></span>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="javascript:;">Mudar Senha</a>
              </li>
              <li role="separator" class="divider"></li>
              <li>
                  <?php echo '<a href="logout.php?token='.md5(session_id()).'">Sair</a>' ?>
                
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
      <!-- /top header -->