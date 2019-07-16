<?php
// Apabila user belum login
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<h3>Untuk mengakses modul, Anda harus login dulu.</h3>
        <p><a href='index.php'>LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else {

	include "../config/koneksi.php";

	// Dashboard
	if ($_GET['module']=='home') {               
		if ($_SESSION['level']=='admin' OR $_SESSION['level']=='user'){
		  include ('modul/mod_home/home.php');
		}
	}

	// Module Users
	elseif ($_GET['module']=='users'){
		if ($_SESSION['level']=='admin' OR $_SESSION['level']=='user'){
			include "modul/mod_users/users.php";
		}
	}

	// Module Program Studi
	elseif ($_GET['module']=='programstudi'){
		if ($_SESSION['level']=='admin'){
			include "modul/mod_programstudi/programstudi.php";
		}
	}

	// Module Kelas
	elseif ($_GET['module']=='kelas'){
		if ($_SESSION['level']=='admin'){
			include "modul/mod_kelas/kelas.php";
		}
	}

	// Module Mata Kuliah
	elseif ($_GET['module']=='matakuliah'){
		if ($_SESSION['level']=='admin'){
			include "modul/mod_matakuliah/matakuliah.php";
		}
	}

	// Module Siswa
	elseif ($_GET['module']=='siswa'){
		if ($_SESSION['level']=='admin'){
			include "modul/mod_siswa/siswa.php";
		}
	}
	
	// Module Cari Siswa
	elseif ($_GET['module']=='carisiswa'){
		if ($_SESSION['level']=='admin'){
			include "modul/mod_siswa/carisiswa.php";
		}
	}

	// Module Instruktur
	elseif ($_GET['module']=='instruktur'){
		if ($_SESSION['level']=='admin'){
			include "modul/mod_instruktur/instruktur.php";
		}
	}

	// Module Tags
	elseif ($_GET['module']=='tags'){
		if ($_SESSION['level']=='admin'){
			include "modul/mod_tags/tags.php";
		}
	}

	// Module Posts
	elseif ($_GET['module']=='posts'){
		if ($_SESSION['level']=='admin' OR $_SESSION['level']=='user'){
			include "modul/mod_posts/posts.php";
		}
	}
}
?>