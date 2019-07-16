<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['user']) AND empty($_SESSION['password'])){
  echo "<h3>Untuk mengakses modul, Anda harus login dulu.</h3>
        <p><a href='../../index.php'>LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  include "../../../config/koneksi.php";
  include "../../../config/fungsi_seo.php";

  $module = $_GET['module'];
  $act    = $_GET['act'];

  
  // Delete
  if ($module=='programstudi' AND $act=='delete'){
    $id = $_GET['id'];
    mysqli_query($con,"DELETE FROM programstudi WHERE kode_program='$id'");
    header("location:../../media.php?module=programstudi");
  }

  // Input
  elseif ($module=='programstudi' AND $act=='input'){
    $kode_program       = mysqli_real_escape_string($con, $_POST['kode_program']);
    $nama_program       = mysqli_real_escape_string($con, $_POST['nama_program']);
    $ketua_program      = mysqli_real_escape_string($con, $_POST['ketua_program']);
    
    $query = "INSERT INTO program_studi(kode_program,nama_program,ketua_program) 
                      VALUES('$kode_program','$nama_program','$ketua_program')";

    mysqli_query($con, $query);
    header("location:../../media.php?module=programstudi");
  }

  // Update
  elseif ($module=='programstudi' AND $act=='update'){
    $kode_program       = mysqli_real_escape_string($con, $_POST['kode_program']);
    $nama_program       = mysqli_real_escape_string($con, $_POST['nama_program']);
    $ketua_program      = mysqli_real_escape_string($con, $_POST['ketua_program']);
    $id                 = mysqli_real_escape_string($con, $_POST['id']);
       
    $query = "UPDATE program_studi SET kode_program = '$kode_program',
                              nama_program = '$nama_program',
                              ketua_program = '$ketua_program'   
                    WHERE kode_program   = '$id'";
    mysqli_query($con, $query);
    header("location:../../media.php?module=programstudi");
  }
}
?>