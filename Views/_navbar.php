<nav class="main-header navbar navbar-expand navbar-light" style="background-color: #044687;">
    <!-- Left navbar links -->
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto"> 
      <!-- user panel -->
      <li class="nav-item dropdown mr-2">
        <a class="user-panel d-flex" data-toggle="dropdown" href="#">
            <div class="image">
                <img src="<?php echo ASSETS;?>LTE/dist/img/avatar.png" class="brand-image img-circle elevation-3 bg-white" alt="DA">
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu dropdown-menu-right">
          <span class="dropdown-item dropdown-header" style="background-color: #19233e;">
              <div class="d-block" href="#" style="color: white;"><?php echo isset($_SESSION) ? $_SESSION['email']: " "; ?></div>

              <div class="dropdown-divider"></div>
              <div class="d-block" href="#" style="color: white;"><?php echo isset($_SESSION) ? $_SESSION['poste']: " "; ?></div>

          </span>
          <!-- <div class="dropdown-divider"></div> -->
          <!-- <a href="<?= HOST;?>profil.html" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profil
          </a> -->
          <!-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-sliders-h mr-2"></i> Paramètres
          </a> -->
          <div class="dropdown-divider"></div>
          <a href="<?= HOST;?>logout.html/origin/<?= 'private' ?>" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
          </a>
        </div>
      </li>
    </ul>
</nav>
