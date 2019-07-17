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
  if ($module=='instruktur' AND $act=='input'){
      $lokasi_file    = $_FILES['foto']['tmp_name'];
      $tipe_file      = $_FILES['foto']['type'];
      $nama_file      = $_FILES['foto']['name'];
      $acak           = rand(1,99);
      $nama_gambar    = $acak.$nama_file; 

      $kdinstruktur   = mysqli_real_escape_string($con, $_POST['kdinstruktur']);
      $pass           = mysqli_real_escape_string($con, hash('sha256',$salt.$_POST['password']));
      $nama           = mysqli_real_escape_string($con, $_POST['nama']);

      $email          = mysqli_real_escape_string($con, $_POST['email']);
      $alamat         = mysqli_real_escape_string($con, $_POST['alamat']);
      $notelp         = mysqli_real_escape_string($con, $_POST['notelp']);
      $jekel          = $_POST['jekel'];
      $tplhr          = mysqli_real_escape_string($con, $_POST['tplhr']);

      $tglhr          = mysqli_real_escape_string($con, $_POST['tglhr']);

      
      $pendidikan   = mysqli_real_escape_string($con, $_POST['pendidikan']);
      $jabatan       = mysqli_real_escape_string($con, $_POST['jabatan']);
      $agama          = mysqli_real_escape_string($con, $_POST['agama']);
      
      $status    = mysqli_real_escape_string($con, $_POST['status']);
      $spesialmengajar       = mysqli_real_escape_string($con, $_POST['spesialmengajar']);

      // Apabila tidak ada gambar yang di upload
      if (empty($lokasi_file)){    
        $query = "INSERT INTO instruktur(kdinstruktur,
                                password,
                                nama,
                                email,     
                                alamat,
                                notelp,
                                jekel,
                                tplhr,
                                tglhr,
                                pendidikan,
                                jabatan,
                                agama,
                                status,
                                spesialmengajar) 
                           VALUES('$kdinstruktur',
                                '$pass', 
                                '$nama', 
                                '$email', 
                                '$alamat',
                                '$notelp',
                                '$jekel',
                                '$tplhr',
                                '$tglhr',
                                '$pendidikan',
                                '$jabatan',
                                '$agama',
                                '$status',
                                '$spesialmengajar')";

      mysqli_query($con, $query);
      header("location:../../media.php?module=instruktur");
      }

      // Apabila ada gambar yang di upload
      else{
        if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
        echo "<script>window.alert('Upload Gagal! Pastikan file yang di upload bertipe *.JPG');
              window.location=('../../media.php?module=instruktur')</script>";
        }
          else{
          $folder = "../../../img_instruktur/";
          $file_upload = $folder .$nama_gambar;
        
          // upload_gambar
          move_uploaded_file($lokasi_file, $file_upload);
        
          $query = "INSERT INTO instruktur(kdinstruktur,
                                password,
                                nama,
                                email,     
                                alamat,
                                notelp,
                                jekel,
                                tplhr,
                                tglhr,
                                pendidikan,
                                jabatan,
                                agama,
                                status,
                                foto,
                                spesialmengajar) 
                           VALUES('$kdinstruktur',
                                '$pass', 
                                '$nama', 
                                '$email', 
                                '$alamat',
                                '$notelp',
                                '$jekel',
                                '$tplhr',
                                '$tglhr',
                                '$pendidikan',
                                '$jabatan',
                                '$agama',
                                '$status',
                                '$nama_gambar',
                                '$spesialmengajar')";

        mysqli_query($con, $query);
        header("location:../../media.php?module=instruktur");        
      }
    }
  }
  // Update
  elseif ($module=='instruktur' AND $act=='update'){
      $lokasi_file    = $_FILES['foto']['tmp_name'];
      $tipe_file      = $_FILES['foto']['type'];
      $nama_file      = $_FILES['foto']['name'];
      $acak           = rand(1,99);
      $nama_gambar    = $acak.$nama_file; 

      $kdinstruktur   = mysqli_real_escape_string($con, $_POST['kdinstruktur']);
      $pass           = mysqli_real_escape_string($con, hash('sha256',$salt.$_POST['password']));
      $nama           = mysqli_real_escape_string($con, $_POST['nama']);

      $email          = mysqli_real_escape_string($con, $_POST['email']);
      $alamat         = mysqli_real_escape_string($con, $_POST['alamat']);
      $notelp         = mysqli_real_escape_string($con, $_POST['notelp']);
      $jekel          = $_POST['jekel'];
      $tplhr          = mysqli_real_escape_string($con, $_POST['tplhr']);

      $tglhr          = mysqli_real_escape_string($con, $_POST['tglhr']);

      
      $pendidikan   = mysqli_real_escape_string($con, $_POST['pendidikan']);
      $jabatan       = mysqli_real_escape_string($con, $_POST['jabatan']);
      $agama          = mysqli_real_escape_string($con, $_POST['agama']);
      
      $status    = mysqli_real_escape_string($con, $_POST['status']);
      $spesialmengajar       = mysqli_real_escape_string($con, $_POST['spesialmengajar']);
      $id             = $_POST['id'];
       
      if (empty($_POST['password'])) {
        $update = "UPDATE instruktur SET kdinstruktur = '$kdinstruktur',
                            nama = '$nama',
                            email = '$email',
                            alamat = '$alamat',
                            notelp = '$notelp',
                            jekel = '$jekel',
                            tplhr = '$tplhr',
                            tglhr = '$tglhr',
                            pendidikan = '$pendidikan',
                            jabatan = '$jabatan',
                            agama = '$agama',
                            status = '$status',
                            spesialmengajar = '$spesialmengajar' 
                        WHERE kdinstruktur = '$id'";
      mysqli_query($con, $update);
      header("location:../../media.php?module=instruktur");
      }
      else {
        $update = "UPDATE instruktur SET kdinstruktur = '$kdinstruktur',
                            password = '$pass',
                            nama = '$nama',
                            email = '$email',
                            alamat = '$alamat',
                            notelp = '$notelp',
                            jekel = '$jekel',
                            tplhr = '$tplhr',
                            tglhr = '$tglhr',
                            pendidikan = '$pendidikan',
                            jabatan = '$jabatan',
                            agama = '$agama',
                            status = '$status',
                            spesialmengajar = '$spesialmengajar' 
                        WHERE kdinstruktur = '$id'";
      mysqli_query($con, $update);
      header("location:../../media.php?module=instruktur");
    }

    if (!empty($lokasi_file)) {
      if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
        echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=instruktur')</script>";
      }
      else{
        $folder = "../../../img_instruktur/";
        $file_upload = $folder .$nama_gambar;
        
        // upload_gambar
        move_uploaded_file($lokasi_file, $file_upload);
        mysqli_query($con,"UPDATE instruktur SET foto='$nama_gambar' WHERE kdinstruktur='$id'");
        header("location:../../media.php?module=instruktur");
      }
    }
    // header("location:../../media.php?module=siswa");
  }

  elseif ($module=='instruktur' AND $act=='delete'){

    $query = "SELECT foto FROM instruktur WHERE kdinstruktur='$_GET[id]'";
    $hapus = mysqli_query($con, $query);
    $r     = mysqli_fetch_array($hapus);

    if ($r['foto']!=""){
      $namafile = $r['foto'];
      // hapus file gambar yang berhubungan dengan berita tersebut
      unlink("../../img_instruktur/$namafile");   
  
      $query = "DELETE FROM instruktur WHERE kdinstruktur = '$_GET[id]'";
      mysqli_query($con,$query);
    }
    else {
      $query = "DELETE FROM instruktur WHERE kdinstruktur = '$_GET[id]'";
      mysqli_query($con,$query);
    }
    header("location:../../media.php?module=siswa");
  }
}
?>