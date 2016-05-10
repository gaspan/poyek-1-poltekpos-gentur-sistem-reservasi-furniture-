<?php  
session_start();
ob_start();
include_once 'class.pendaftaran.php';

$pendaftaran = new pendaftaran();

if (isset($_POST['daftar']))
{
	
	$nama_lengkap=$_POST['nama_lengkap'];
	$alamat=$_POST['alamat'];
	$nomor=$_POST['no_hp'];
	$username=$_POST['username'];
	$password=$_POST['password'];

	$cek=$pendaftaran->cek_username($username);
	$cek_user=mysql_num_rows($cek);
	$row=mysql_fetch_array($cek);
	if ($row > 0) {
		header('location:registrasi.php?digunakan');
	}else{
		$pendaftaran->mendaftar($nama_lengkap,$alamat,$nomor,$username,$password);

		$query = $pendaftaran->daftar_session($username);
		$lihat=mysql_fetch_array($query);

		$_SESSION['id_customer']=$lihat['id_customer'];
		$_SESSION['nama_lengkap']=$nama_lengkap;
		$_SESSION['alamat']=$alamat;
		$_SESSION['nomor']=$nomor;
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;

		header('location:registrasi_berhasil.php');
	}

}



?>