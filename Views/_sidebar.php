<div class="sidebar" style="background-color:#19233e;">
    <!-- Sidebar user panel (optional) -->
    <div class="mb-3"></div>
    <!-- Sidebar Menu -->

    <nav class="mt-2">
        <!-- Admin -->
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    
            <li class="nav-item">
                <a href="<?= HOST;?>home.html" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Tableau de bord
                </p>
                </a>
            </li>
            <?php         
            // echo '<pre>';print_r($_SESSION['agence'][1]);exit;
            $agences = (new Agence())->findAll();
            // print_r($agences);exit;
            foreach($agences as $agence):
                ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-paste"></i>
                    <p>
                        <?= $agence->getLibelle();?>
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= HOST;?>detail-agence.html/id/<?= $agence->getId(); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>En Détails</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= HOST;?>gros-agence.html/id/<?= $agence->getId(); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>En Gros</p>
                        </a>
                    </li>

                    </ul>
                </li>
           <?php endforeach;?>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>


