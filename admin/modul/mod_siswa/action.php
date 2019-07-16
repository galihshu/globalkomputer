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

  $module = $_GET['module'];
  $act    = $_GET['act'];
  $salt = '$%DSuTyr47542@#&*!=QxR094{a911}+';

  
  // Input
  if ($module=='siswa' AND $act=='input'){
      $lokasi_file    = $_FILES['foto']['tmp_name'];
      $tipe_file      = $_FILES['foto']['type'];
      $nama_file      = $_FILES['foto']['name'];
      $acak           = rand(1,99);
      $nama_gambar    = $acak.$nama_file; 

      $nis            = mysqli_real_escape_string($con, $_POST['nis']);
      $pass           = mysqli_real_escape_string($con, hash('sha256',$salt.$_POST['password']));

      $email          = mysqli_real_escape_string($con, $_POST['email']);
      $nokwi          = mysqli_real_escape_string($con, $_POST['nokwi']);

      $tgldaftar      = mysqli_real_escape_string($con, $_POST['tgldaftar']);

      $nama_siswa     = mysqli_real_escape_string($con, $_POST['nama_siswa']);
      $kode_program   = mysqli_real_escape_string($con, $_POST['kode_program']);
      $angkatan       = mysqli_real_escape_string($con, $_POST['angkatan']);
      $alamat         = mysqli_real_escape_string($con, $_POST['alamat']);
      $tplhr          = mysqli_real_escape_string($con, $_POST['tplhr']);

      $tglhr          = mysqli_real_escape_string($con, $_POST['tglhr']);

      $jekel          = $_POST['jekel'];
      $agama          = mysqli_real_escape_string($con, $_POST['agama']);
      $notelp         = mysqli_real_escape_string($con, $_POST['notelp']);
      $asalsekolah    = mysqli_real_escape_string($con, $_POST['asalsekolah']);
      $thnlulus       = mysqli_real_escape_string($con, $_POST['thnlulus']);

      // Apabila tidak ada gambar yang di upload
      if (empty($lokasi_file)){    
        $query = "INSERT INTO siswa(nis,
                                password,
                                email,     
                                nokwi, 
                                tgldaftar,
                                nama_siswa,
                                kode_program,
                                angkatan,
                                alamat,
                                tplhr,
                                tglhr,
                                jekel,
                                agama,
                                notelp,
                                asalsekolah,
                                thnlulus) 
                           VALUES('$nis',
                                '$pass', 
                                '$email', 
                                '$nokwi', 
                                '$tgldaftar',
                                '$nama_siswa',
                                '$kode_program',
                                '$angkatan',
                                '$alamat',
                                '$tplhr',
                                '$tglhr',
                                '$jekel',
                                '$agama',
                                '$notelp',
                                '$asalsekolah',
                                '$thnlulus')";

      mysqli_query($con, $query);
      header("location:../../media.php?module=siswa");
      }

      // Apabila ada gambar yang di upload
      else{
        if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
        echo "<script>window.alert('Upload Gagal! Pastikan file yang di upload bertipe *.JPG');
              window.location=('../../media.php?module=siswa')</script>";
        }
          else{
          $folder = "../../../img_siswa/";
          $file_upload = $folder .$nama_gambar;
        
          // upload_gambar
          move_uploaded_file($lokasi_file, $file_upload);
        
          $query = "INSERT INTO siswa(nis,
                                  password,
                                  email,     
                                  nokwi, 
                                  tgldaftar,
                                  nama_siswa,
                                  kode_program,
                                  angkatan,
                                  foto,
                                  alamat,
                                  tplhr,
                                  tglhr,
                                  jekel,
                                  agama,
                                  notelp,
                                  asalsekolah,
                                  thnlulus) 
                             VALUES('$nis',
                                  '$pass', 
                                  '$email', 
                                  '$nokwi', 
                                  '$tgldaftar',
                                  '$nama_siswa',
                                  '$kode_program',
                                  '$angkatan',
                                  '$nama_gambar',
                                  '$alamat',
                                  '$tplhr',
                                  '$tglhr',
                                  '$jekel',
                                  '$agama',
                                  '$notelp',
                                  '$asalsekolah',
                                  '$thnlulus')";

        mysqli_query($con, $query);
        header("location:../../media.php?module=siswa");        
      }
    }
  }
  // Update
  elseif ($module=='siswa' AND $act=='update'){
      $lokasi_file    = $_FILES['foto']['tmp_name'];
      $tipe_file      = $_FILES['foto']['type'];
      $nama_file      = $_FILES['foto']['name'];
      $acak           = rand(1,99);
      $nama_gambar    = $acak.$nama_file; 

      $nis            = mysqli_real_escape_string($con, $_POST['nis']);
      $pass           = mysqli_real_escape_string($con, hash('sha256',$salt.$_POST['password']));

      $email          = mysqli_real_escape_string($con, $_POST['email']);
      $nokwi          = mysqli_real_escape_string($con, $_POST['nokwi']);

      $tgldaftar      = mysqli_real_escape_string($con, trim($_POST['tgldaftar']));

      $nama_siswa     = mysqli_real_escape_string($con, $_POST['nama_siswa']);
      $kode_program   = mysqli_real_escape_string($con, $_POST['kode_program']);
      $angkatan       = mysqli_real_escape_string($con, $_POST['angkatan']);
      $alamat         = mysqli_real_escape_string($con, $_POST['alamat']);
      $tplhr          = mysqli_real_escape_string($con, $_POST['tplhr']);

      $tglhr          = mysqli_real_escape_string($con, $_POST['tglhr']);

      $jekel          = $_POST['jekel'];
      $agama          = mysqli_real_escape_string($con, $_POST['agama']);
      $notelp         = mysqli_real_escape_string($con, $_POST['notelp']);
      $asalsekolah    = mysqli_real_escape_string($con, $_POST['asalsekolah']);
      $thnlulus       = mysqli_real_escape_string($con, $_POST['thnlulus']);
      $id             = $_POST['id'];
       
      if (empty($_POST['password'])) {
        $update = "UPDATE siswa SET nokwi = '$nokwi',
                            email = '$email',
                            tgldaftar = '$tgldaftar',
                            nama_siswa = '$nama_siswa',
                            kode_program = '$kode_program',
                            angkatan = '$angkatan',
                            alamat = '$alamat',
                            tplhr = '$tplhr',
                            tglhr = '$tglhr',
                            jekel = '$jekel',
                            agama = '$agama',
                            notelp = '$notelp',
                            asalsekolah = '$asalsekolah',
                            thnlulus = '$thnlulus' 
                          WHERE nis = '$id'";
      mysqli_query($con, $update);
      header("location:../../media.php?module=siswa");
      }
      else {
        $update = "UPDATE siswa SET password = '$pass',
                            email = '$email',
                            nokwi = '$nokwi',
                            tgldaftar = '$tgldaftar',
                            nama_siswa = '$nama_siswa',
                            kode_program = '$kode_program',
                            angkatan = '$angkatan',
                            alamat = '$alamat',
                            tplhr = '$tplhr',
                            tglhr = '$tglhr',
                            jekel = '$jekel',
                            agama = '$agama',
                            notelp = '$notelp',
                            asalsekolah = '$asalsekolah',
                            thnlulus = '$thnlulus' 
                            WHERE nis = '$id'";
      mysqli_query($con, $update);
      header("location:../../media.php?module=siswa");
    }

    if (!empty($lokasi_file)) {
      if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
        echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=siswa')</script>";
      }
      else{
        $folder = "../../../img_siswa/";
        $file_upload = $folder .$nama_gambar;
        
        // upload_gambar
        move_uploaded_file($lokasi_file, $file_upload);
        mysqli_query($con,"UPDATE siswa SET foto='$nama_gambar' WHERE nis='$id'");
        header("location:../../media.php?module=siswa");
      }
    }
    // header("location:../../media.php?module=siswa");
  }

  elseif ($module=='siswa' AND $act=='delete'){

    $query = "SELECT foto FROM siswa WHERE nis='$_GET[id]'";
    $hapus = mysqli_query($con, $query);
    $r     = mysqli_fetch_array($hapus);

    if ($r['foto']!=""){
      $namafile = $r['foto'];
      // hapus file gambar yang berhubungan dengan berita tersebut
      unlink("../../img_siswa/$namafile");   
  
      $query = "DELETE FROM siswa WHERE nis = '$_GET[id]'";
      mysqli_query($con,$query);
    }
    else {
      $query = "DELETE FROM siswa WHERE nis = '$_GET[id]'";
      mysqli_query($con,$query);
    }
    header("location:../../media.php?module=siswa");
  }
}
?>