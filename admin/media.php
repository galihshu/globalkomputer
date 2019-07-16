<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['username']) AND empty($_SESSION['password'])) {
  echo "<h3>Untuk mengakses modul, Anda harus login dulu.</h3>
        <p><a href='index.php'>LOGIN</a></p></div>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session 
else {

include ('head.php'); ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include ('header.php'); ?>

  <?php include ('sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php include('content.php'); ?>
  </div>
  <!-- /.content-wrapper -->

  <?php include('footer.php'); ?>

</div>
<!-- ./wrapper -->
<?php include('js.php'); ?>
</body>
</html>
<?php } ?>