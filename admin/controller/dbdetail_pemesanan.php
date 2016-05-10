<?php
include "../model/class.detail_pemesanan.php";

$detail_pemesanan = new detail_pemesanan();

if (isset($_POST['kevalidan'])) {
	$validasi=$_POST['validasi'];
	$id_detail=$_POST['id_detail'];
	$id_customer=$_POST['id_customer'];

$detail_pemesanan->validasi($id_detail,$validasi);
$detail_pemesanan->ubah_status_pem($id_customer);


header('location:../views/halaman_utama_admin.php?page=kelola_pemesanan');


}elseif (isset($_POST['bayar'])) {
	$pelunasan=$_POST['pelunasan'];
	$id_detail=$_POST['id_detail'];
	$id_customer=$_POST['id_customer'];


	$detail_pemesanan->pelunasan($pelunasan,$id_detail);
	$detail_pemesanan->selesai($id_customer);

	header('location:../views/halaman_utama_admin.php?page=kelola_pemesanan');
}


?>