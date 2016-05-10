<?php 
	include '../database/koneksi.php';

	Class pendaftaran

	{
		public function __construct()
		{
			$db = new DB_conn();
		}

		public function cek_username($username)
		{
			$cek=mysql_query("select username from pendaftaran where username='$username'");
			return $cek;
		}

		public function mendaftar($nama_lengkap,$alamat,$nomor,$username,$password)
		{
			mysql_query("insert into pendaftaran(id_customer,nama_lengkap,alamat,no_hp,username,password)
			values(null,
			'$nama_lengkap',
			'$alamat',
			'$nomor',
			'$username',
			'$password')");
		   
		}
		public function daftar_session($username)
		{
		$lihat = mysql_query("select * from pendaftaran where username='$username'");
		return $lihat;
		}
	}


?>