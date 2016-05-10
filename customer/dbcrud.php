<?php
session_start();
include_once 'database/class.proses.php';

$PEMESANAN = new PEMESANAN();
if(isset($_POST['login']))
{
	$username =$_POST['username'];
	$password =$_POST['password'];

	$login=$PEMESANAN->login($username,$password);
	$ketemu=mysql_num_rows($login);
	$row=mysql_fetch_array($login);
	
	if($ketemu>0){
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		$_SESSION['id_customer']=$row['id_customer'];
		$_SESSION['nama_lengkap']=$row['nama_lengkap'];
		$_SESSION['alamat']=$row['alamat'];
		$_SESSION['no_hp']=$row['no_hp'];
		header('location:halaman_utama_customer.php?page=home');

	}else{
		header('location:index.php?salah');
	}



}elseif (isset($_GET['logout'])) {
	unset($_SESSION);
	session_destroy();
	header('location:..');
}elseif (isset($_POST['tambah'])) {
	$id_customer=$_SESSION['id_customer'];
	$id_barang=$_POST['id_barang'];
	$jumlah=$_POST['jumlah'];

	$PEMESANAN->tambah_pemesanan($id_customer,$id_barang,$jumlah);

	header('location:halaman_utama_customer.php?page=pilih_paket');

}elseif (isset($_POST['edit'])) {
	$id_pemesanan=$_POST['id_pemesanan'];
	$jumlah=$_POST['jumlah'];

	$PEMESANAN->edit_pemesanan($id_pemesanan,$jumlah);
	header('location:halaman_utama_customer.php?page=cek_out');
}elseif (isset($_GET['del_id'])) {
	$id=$_GET['del_id'];

	$PEMESANAN->hapus_pemesanan($id);
	header('location:halaman_utama_customer.php?page=cek_out');
}elseif (isset($_POST['pesan_fix'])) {
	$id_customer=$_POST['id_customer'];
	$harga_asli=$_POST['harga_asli_diskon'];
	$biaya_dp=$_POST['biaya_dp_diskon'];
	$biaya_pelunasan=$_POST['biaya_pelunasan_diskon'];
	$fixasi=$_POST['fixasi'];

	$cek_pemesanan=$PEMESANAN->cek_pesanfix($id_customer);
	$hasil=mysql_fetch_array($cek_pemesanan);
	$belum="belum";
	if ($hasil['status_pembayaran']=$belum) {

		$PEMESANAN->pesan_fix($id_customer,$harga_asli,$biaya_dp,$biaya_pelunasan,$fixasi);

		$lihat_id=$PEMESANAN->lihat_id_detailpem($id_customer);
		$row_id_detail=mysql_fetch_array($lihat_id);

		$_SESSION['id_detail_pemesanan']=$row_id_detail['id_detail_pemesanan'];

		header('location:halaman_utama_customer.php?page=input_bukti');
		
	}else{
		header('location:halaman_utama_customer.php?page=input_bukti');
	}
}elseif (isset($_POST['send'])) {
	$id_customer=$_SESSION['id_customer'];
	$tmp=$_FILES['bukti_pembayaran']['tmp_name'];

	$gambar=$_FILES['bukti_pembayaran']['name'];
	move_uploaded_file($tmp, "bukti_transaksi/$gambar");
	
	$lihat=$PEMESANAN->lihat_id_new($id_customer);
	$lihat_row=mysql_fetch_array($lihat);
	$id_det=$lihat_row['id_detail_pemesanan'];

	 $PEMESANAN->input_bukti($id_det,$gambar);
	 header('location:halaman_utama_customer.php?page=barang_dipesan');

}else{
	 header('location :halaman_utama_customer.php?page=input_bukti');
}


?>