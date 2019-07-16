<!-- jQuery 3 -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- SlimScroll -->
<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/vendor/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  //Date picker
  $('.datepicker').datepicker({
    autoclose: true
  })
</script>

<script>
  $(document).ready(function() {

    $(".pencarian").focusin(function() {
      $("#myModal").modal('show');
    });
    $('#example').DataTable();
    });


    function masuk(txt, data) {
      document.getElementById('textbox').value = data;
      $("#myModal").modal('hide');
    }
</script>

