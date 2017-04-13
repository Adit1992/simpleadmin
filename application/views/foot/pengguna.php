  <div class="control-sidebar-bg"></div>
</div>
<!-- Mainly scripts -->
<script src="<?= base_url('assets/plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>

<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>

<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>

<script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>

<script src="<?= base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js') ?>"></script>

<script src="<?= base_url('assets/plugins/fastclick/fastclick.js') ?>"></script>

<script src="<?= base_url('assets/dist/js/app.min.js') ?>"></script>

<script src="<?= base_url('assets/dist/js/demo.js') ?>"></script>

<!-- bootstrap datepicker -->
<script src="<?= base_url('assets/plugins/datepicker/bootstrap-datepicker.js') ?>"></script>

<!-- page script -->
<script>
$(function (){
  $("#example1").DataTable();
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true
  });

  //Date picker
  $('#datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
});
</script>
</body>
</html>