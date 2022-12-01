<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gestion Scolarité Ecole</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- icon -->
  <link rel="icon" href="<?php echo ASSETS;?>LTE/dist/img/favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= ASSETS;?>LTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= ASSETS;?>LTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= ASSETS;?>LTE/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
</head>

<body class="hold-transition login-page ">
<div class="login-box">
   <div class="card shadow">
    <div class="card-body login-card-body">
      <h3 class="login-box-msg "><i class="fas fa-home"></i><br>Connexion</h3>
      <form action="<?= HOST;?>log.html" method="POST" class="">
          <div class="input-group mb-3">
            <input type="number" class="form-control" placeholder="Votre numéro de téléphone" name="values[telephone]">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="values[password]">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-block text-dark" style="background-color: rgb(141,129,254); opacity: 0.95; border-radius: 10px;" ><i class="fas fa-arrow-circle-left"></i> Se Connecter</button>
            </div>
          </div>
      </form>
    </div>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= ASSETS;?>LTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= ASSETS;?>LTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= ASSETS;?>LTE/dist/js/adminlte.min.js"></script>
<script src="<?php echo ASSETS;?>LTE/package/dist/sweetalert2.all.min.js"></script>
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
</html>
