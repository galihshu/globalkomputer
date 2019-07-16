<?php
date_default_timezone_set('Asia/Jakarta');

$con = mysqli_connect("localhost","root","","db_global");

if(mysqli_connect_errno()){
	exit('Error Koneksi Database :' . mysqli_connect_error());
}
?>