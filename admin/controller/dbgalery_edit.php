<?php
include "../model/class.galery_master.php";
include "../model/class.harga.php";

if (isset($_POST['edit'])) {
	$tmp=$_FILES['gambar']['tmp_name'];
	$jenis_barang=$_POST['jenis_barang'];

	$gambar=$_FILES['gambar']['name'];
	move_uploaded_file($tmp, "../../customer/gambarbrg/$jenis_barang/$gambar");

	$id = $_POST['id_brg'];
	$nama_barang=$_POST['nama'];
	$harga_asli=$_POST['harga_asli'];
	$harga_dp=$_POST['biaya_dp'];

	$Harga = new harga();
	$cek = $Harga->persentaseDP($harga_asli,$harga_dp);
	if ($cek < 1) {
		header('location:../views/halaman_utama_admin.php?page=galery_ud&dp_lebih');
	}else{
		$harga_pelunasan = $Harga->harga_pelunasan($harga_asli,$harga_dp);

		$galery = new edit_galery();
		$galery->update_barang($jenis_barang,$nama_barang,$gambar,$harga_asli,$harga_dp,$harga_pelunasan,$id);

		header('location:../views/halaman_utama_admin.php?page=galery_ud&berhasil');


	}
}

?>