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
  if ($module=='kelas' AND $act=='delete'){
    $id = $_GET['id'];
    mysqli_query($con,"DELETE FROM kelas WHERE kode_kelas='$id'");
    header("location:../../media.php?module=kelas");
  }

  // Input
  elseif ($module=='kelas' AND $act=='input'){
    $kode_kelas       = mysqli_real_escape_string($con, $_POST['kode_kelas']);
    $nama_kelas       = mysqli_real_escape_string($con, $_POST['nama_kelas']);
    $ruang            = mysqli_real_escape_string($con, $_POST['ruang']);
    
    $query = "INSERT INTO kelas(kode_kelas,nama_kelas,ruang) 
                      VALUES('$kode_kelas','$nama_kelas','$ruang')";

    mysqli_query($con, $query);
    header("location:../../media.php?module=kelas");
  }

  // Update
  elseif ($module=='kelas' AND $act=='update'){
    $kode_kelas       = mysqli_real_escape_string($con, $_POST['kode_kelas']);
    $nama_kelas       = mysqli_real_escape_string($con, $_POST['nama_kelas']);
    $ruang            = mysqli_real_escape_string($con, $_POST['ruang']);
    $id               = mysqli_real_escape_string($con, $_POST['id']);
       
    $query = "UPDATE kelas SET kode_kelas = '$kode_kelas',
                              nama_kelas = '$nama_kelas',
                              ruang = '$ruang'   
                    WHERE kode_kelas   = '$id'";
    mysqli_query($con, $query);
    header("location:../../media.php?module=kelas");
  }
}
?>