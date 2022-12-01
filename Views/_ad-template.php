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
  <aside class="sidebar-dark-cyan">
    <!-- Brand Logo -->
    <a href="home.html" class="brand-link" style="background-color: #044687;">
      <img src="<?php echo ASSETS;?>LTE/dist/img/as.png" alt="AdminLTE Logo" class="bg-white brand-image img-circle elevation-3">
      <span class="brand-text font-weight-bold text-white">GESCO</span>
    </a>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">
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

<?php
  if(isset($_SESSION['alert']) && !empty($_SESSION['alert']) && $_SESSION['alert_message'] != "Bienvenue") {
    ?>
    <script>
      Swal.fire({
          position: 'top-end',
          icon: '<?php echo $_SESSION['alert'] ?>',
          title: "<?php echo $_SESSION['alert_message'] ?>",
          showConfirmButton: false,
          timer: 2000
      })
    </script>
    <?php
    unset($_SESSION['alert']);
    unset($_SESSION['alert_message']);
  }
  else if(isset($_SESSION['alert']) && !empty($_SESSION['alert']) && $_SESSION['alert_message'] == "Bienvenue"){
    ?>
    <script>
      Swal.fire({
          position: 'center',
          icon: '<?php echo $_SESSION['alert'] ?>',
          title: '<?php echo $_SESSION['alert_message'] ?>',
          showConfirmButton: false,
          timer: 3000
      })
    </script>
    <?php
    unset($_SESSION['alert']);
    unset($_SESSION['alert_message']);
  }

?>

</body>
</html>