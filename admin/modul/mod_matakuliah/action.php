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
  if ($module=='matakuliah' AND $act=='delete'){
    $id = $_GET['id'];
    mysqli_query($con,"DELETE FROM matakuliah WHERE kode_mk='$id'");
    header("location:../../media.php?module=matakuliah");
  }

  // Input
  elseif ($module=='matakuliah' AND $act=='input'){
    $kode_mk          = mysqli_real_escape_string($con, $_POST['kode_mk']);
    $nama_mk          = mysqli_real_escape_string($con, $_POST['nama_mk']);
    $sks              = mysqli_real_escape_string($con, $_POST['sks']);
    $jenis            = mysqli_real_escape_string($con, $_POST['jenis']);
    $jumlah_pertemuan = mysqli_real_escape_string($con, $_POST['jumlah_pertemuan']);
    
    $query = "INSERT INTO matakuliah(kode_mk,nama_mk,sks,jenis,jumlah_pertemuan) 
                      VALUES('$kode_mk','$nama_mk','$sks','$jenis','$jumlah_pertemuan')";

    mysqli_query($con, $query);
    header("location:../../media.php?module=matakuliah");
  }

  // Update
  elseif ($module=='matakuliah' AND $act=='update'){
    $kode_mk          = mysqli_real_escape_string($con, $_POST['kode_mk']);
    $nama_mk          = mysqli_real_escape_string($con, $_POST['nama_mk']);
    $sks              = mysqli_real_escape_string($con, $_POST['sks']);
    $jenis            = mysqli_real_escape_string($con, $_POST['jenis']);
    $jumlah_pertemuan = mysqli_real_escape_string($con, $_POST['jumlah_pertemuan']);
    $id               = mysqli_real_escape_string($con, $_POST['id']);
       
    $query = "UPDATE matakuliah SET kode_mk = '$kode_mk',
                              nama_mk = '$nama_mk',
                              sks = '$sks',
                              jenis = '$jenis',
                              jumlah_pertemuan = '$jumlah_pertemuan' 
                    WHERE kode_mk   = '$id'";
    mysqli_query($con, $query);
    header("location:../../media.php?module=matakuliah");
  }
}
?>