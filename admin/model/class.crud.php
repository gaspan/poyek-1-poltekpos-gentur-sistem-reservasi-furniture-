<?php 
include_once 'dbconfig.php'; 


Class login
{
	public function __construct()
	{
		$db = new DB_con();
	}

	public function cek_login($username,$password)
	{
		$login=mysql_query("select * from admin where username='$username' and password='$password'");
		return $login;
	}

	
}

Class kelola_pemesanan
{
	public function __construct()
	{
		$db = new DB_con();
	}
	public function tampil_pemesanan()
	{
		$tampil=mysql_query("select pendaftaran.id_customer, pendaftaran.nama_lengkap,pendaftaran.alamat,pendaftaran.no_hp
							from pemesanan 
							inner join pendaftaran on pemesanan.id_customer=pendaftaran.id_customer
							inner join detail_pemesanan on detail_pemesanan.id_customer=pendaftaran.id_customer
							where pemesanan.penyelesaian='belum' and detail_pemesanan.fixasi='fix' group by(pendaftaran.id_customer) order by pemesanan.id_pemesanan desc") 
							or die("query error ".mysql_error());
		return $tampil;
	}

	public function identitas_cus($id_customer)
	{
		$identitas=mysql_query("select nama_lengkap,alamat,no_hp 
								from pendaftaran where id_customer='$id_customer'");
		return $identitas;
	}

	public function lihat_pemesanan($id_customer)
	{
		$lihat_pem=mysql_query("select data_barang.gambar, data_barang.nama_barang,pemesanan.jumlah,pemesanan.tanggal,pemesanan.id_pemesanan 
								from data_barang
								inner join pemesanan on data_barang.id_barang=pemesanan.id_barang
								inner join pendaftaran on pendaftaran.id_customer=pemesanan.id_customer
								inner join detail_pemesanan on pendaftaran.id_customer=detail_pemesanan.id_customer   
								where detail_pemesanan.fixasi='fix' and pendaftaran.id_customer='$id_customer' and pemesanan.penyelesaian='belum' group by(pemesanan.id_pemesanan) order by pemesanan.id_pemesanan desc")
								or die("query error ".mysql_error());
		return $lihat_pem;
	}

	public function tagihan_lihat($id_customer,$id_pemesanan)
	{
		$tampil=mysql_query("select detail_pemesanan.harga_asli_diskon,detail_pemesanan.biaya_dp_diskon,detail_pemesanan.biaya_pelunasan_diskon, detail_pemesanan.id_detail_pemesanan
								  from detail_pemesanan
							      inner join pendaftaran on pendaftaran.id_customer=detail_pemesanan.id_customer
							      inner join pemesanan on pemesanan.id_customer=pendaftaran.id_customer 
							      where detail_pemesanan.fixasi='fix'  AND pendaftaran.id_customer='$id_customer' AND pemesanan.id_pemesanan='$id_pemesanan' order by id_detail_pemesanan desc")
							       or die("query error ".mysql_error());
		return $tampil;
	}

	public function lihat_pembayaran_dp($id_customer,$id)
	{
		$lihat=mysql_query("select pembayaran_dp.bukti_pembayaran
							from pembayaran_dp
							right join detail_pemesanan on pembayaran_dp.id_detail_pemesanan=detail_pemesanan.id_detail_pemesanan
							inner join pendaftaran on detail_pemesanan.id_customer=pendaftaran.id_customer
							where pendaftaran.id_customer='$id_customer' and detail_pemesanan.id_detail_pemesanan='$id'")
							or die("query error ".mysql_error());
		return $lihat;
	}

	public function lihat_kevalidan($id_customer,$id_detail)
	{
		$lihat_valid=mysql_query("select validasi_pembayaran from detail_pemesanan
									where id_customer='$id_customer' and id_detail_pemesanan='$id_detail' ")
					or die("query error ".mysql_error());
		return $lihat_valid;
	}
	public function lihat_id_detail($id_customer)
	{
		$lihat_id=mysql_query("select id_detail_pemesanan from detail_pemesanan 
							where id_customer='$id_customer' order by id_detail_pemesanan desc")
		or die("query error ".mysql_error());
		return $lihat_id;
	}

}

?>