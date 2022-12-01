<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include("head.php"); ?>
    <?php echo $scripts; ?>
</head>
<body>
    <div id="body">

        <!-- Navbar -->
        <?php include("navbar.php"); ?>
        <!-- /.navbar -->

        <!-- page-content. Contains page content -->
        <div class="page-content">
            <?php echo $contentPage; ?>
        </div>
        <!-- /.page-content -->


        <!-- footer -->
        <?php include("footer.php"); ?>
        <!-- /.footer -->

    </div>
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