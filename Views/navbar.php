<nav class="navbar navbar-expand navbar-light" style="background-color: #044687;">
    <!-- Left navbar links -->
    
    

    <ul class="navbar-nav">
        <!-- <li class="nav-item">
            <a class="nav-link text-white pr-0" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li> -->
        <li>
            <a href="accuei.html" class="brand-link py-1" style="background-color: #044687;">
                <img src="<?php echo ASSETS;?>LTE/dist/img/as.png" alt="K'Art Logo" class="bg-white brand-image img-circle elevation-3">
                <span class="brand-text font-weight-bold text-white">Gestion Des Ventes</span>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item dropdown mr-2">
            <a class="user-panel d-flex" data-toggle="dropdown" href="#">
                <div class="image">
                    <img src="<?php echo ASSETS;?>LTE/dist/img/avatar.png" class="brand-image img-circle elevation-3 bg-white" alt="DA">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu dropdown-menu-right">
            <span class="dropdown-item dropdown-header" style="background-color: #19233e;">
                    <div class="d-block" href="#" style="color: white;"><?php echo isset($_SESSION) ? $_SESSION['prenom'] ." ". $_SESSION['nom'] : " "; ?></div>
            </span>
            <div class="dropdown-divider"></div>
            <a href="profil.html" class="dropdown-item">
                <i class="fas fa-user mr-2"></i> Profil
            </a>
            <div class="dropdown-divider"></div>
            <a href="logout.html" class="dropdown-item">
                <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
            </a>
            </div>
        </li> -->  
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link text-white">Cours</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link text-white">Formations</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link text-white">Services</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link text-white">Opportunités</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link text-white">Actualité</a>
        </li>    
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
        <input hidden class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
            </button>
        </div>
        </div>
    </form>
</nav>