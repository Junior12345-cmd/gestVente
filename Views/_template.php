<!DOCTYPE html>
<html>
<head>
    <?php include("_head.php"); ?>
    <?php echo $scripts; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include("_navbar.php"); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-cyan elevation-4">
    <!-- Brand Logo -->
    <a href="home.html" class="brand-link" style="background-color: #19233e;">
      <img src="<?php echo ASSETS;?>LTE/icons.png" type="image/x-icon" style="padding: 2px; padding-left: 4px;" class="bg-white brand-image img-circle elevation-3">
      <span class="brand-text font-weight-bold text-white">Gestion Des Ventes</span>
    </a>
    <!-- Sidebar -->
    <?php include("_sidebar.php"); ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php echo $contentPage; ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- footer -->
  <?php include("_footer.php"); ?>
  <!-- /.footer -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script type="text/javascript">
  $(function() {
    // Error, success, question, warning, info
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      icon: '<?php echo $_SESSION['alert'] ?>',
      title: "<?php echo $_SESSION['alert_message'] ?>",
      showConfirmButton: false,
      timer: 3000
    });

    <?php if(isset($_SESSION['alert']) && !empty($_SESSION['alert']) && $_SESSION['alert_message'] != "Bienvenue"): ?>
      Toast.fire();
    <?php else: ?>
      Toast.fire({ position: 'top' })
    <?php endif; ?>
    <?php
      unset($_SESSION['alert']);
      unset($_SESSION['alert_message']);
    ?>

  });
</script>

</body>
</html>
