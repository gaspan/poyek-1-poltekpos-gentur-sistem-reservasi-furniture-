<?php
session_start();
ob_start();
include_once '../model/class.crud.php';

if (isset($_POST['login'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];

	$login = new login();
	$cek_login=$login->cek_login($username,$password);
	$ada=mysql_num_rows($cek_login);
	$row=mysql_fetch_array($cek_login);

	if ($ada>0) {
		$_SESSION['id_admin']=$row['id_admin'];
		$_SESSION['nama_admin']=$row['nama_lengkap'];
		$_SESSION['username']=$row['username'];
		$_SESSION['password']=$row['password'];
		header('location:../views/halaman_utama_admin.php?page=hal_utama');
	}else{
		header('location:../index.php?salah');
	}


	
} 


?>