<?php
 
$user_name = "root";
$password = "";
$database = "web_pemesanan2";
$host_name = "localhost"; 
 
mysql_connect($host_name, $user_name, $password) or die("koneksi gagal");
 
mysql_select_db($database) or die("database tidak ditemukan");

 
?>