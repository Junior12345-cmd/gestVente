<!-- jQuery -->
<script src="<?php echo ASSETS;?>LTE/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo ASSETS;?>LTE/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="<?php echo ASSETS;?>LTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo ASSETS;?>LTE/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo ASSETS;?>LTE/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo ASSETS;?>LTE/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo ASSETS;?>LTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo ASSETS;?>LTE/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo ASSETS;?>LTE/plugins/moment/moment.min.js"></script>
<script src="<?php echo ASSETS;?>LTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo ASSETS;?>LTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo ASSETS;?>LTE/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
<!-- overlayScrollbars -->
<script src="<?php echo ASSETS;?>LTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo ASSETS;?>LTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo ASSETS;?>LTE/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes --> 
<script src="<?php echo ASSETS;?>LTE/dist/js/demo.js"></script>
<!-- Select2 -->
<script src="<?php echo ASSETS;?>LTE/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo ASSETS;?>LTE/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo ASSETS;?>LTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- DataTables -->
<script src="<?php echo ASSETS;?>LTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo ASSETS;?>LTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo ASSETS;?>LTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo ASSETS;?>LTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

<!-- html2pdf -->
<script src="<?php echo ASSETS;?>LTE/plugins/html2pdf.bundle.js"></script>
<!-- printThis -->
<script src="<?php echo ASSETS;?>LTE/plugins/printThis.js"></script>

<!-- sweetalert2 -->
<script src="<?php echo ASSETS;?>LTE/package/dist/sweetalert2.all.min.js"></script>

<script>
  $(document).ready(function() {
    $('#summernote').summernote({
      height: ($(window).height() - 400)
    });
    $('.summernote').summernote({
      height: ($(window).height() - 350)
    });
  });
</script>
