<?php

include_once "dbconfig.php";

Class monitor_costumer
{
	public function __construct()
	{
		$db = new DB_con();
	}

	public function lihat_costumer()
	{
		$lihat=mysql_query("select * from pendaftaran")
			or die("query error ".mysql_error());
		return $lihat;

	}
	public function barang_pesanan()
	{
		$pemesanan=mysql_query("select data_barang.gambar,data_barang.nama_barang, pemesanan.jumlah 
							from data_barang
							inner join pemesanan on data_barang.id_barang=pemesanan.id_barang
							inner join pendaftaran on pemesanan.id_customer=pendaftaran.id_customer 
							inner join detail_pemesanan on pendaftaran.id_customer=detail_pemesanan.id_customer 
							where pemesanan.penyelesaian='belum' and detail_pemesanan.fixasi='fix' group by data_barang.id_barang  order by id_pemesanan asc")
			or die("query error ".mysql_error());
		return $pemesanan;
	}
}



?>