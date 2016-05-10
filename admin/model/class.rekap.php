<?php
include_once "dbconfig.php";

Class rekap
{
	public function __construct()
	{
		$db = new DB_con();
	}

	public function rekap_bulanan($tgl1,$tgl2,$tahun,$bulan)
	{
		$rekap=mysql_query("select data_barang.gambar,pemesanan.jumlah,data_barang.harga_asli, detail_pemesanan.tgl
							from data_barang
							inner join pemesanan on data_barang.id_barang=pemesanan.id_pemesanan
							inner join pendaftaran on pemesanan.id_customer=pendaftaran.id_customer
							inner join detail_pemesanan on pendaftaran.id_customer=detail_pemesanan.id_customer 
							where tgl >='$tahun-$bulan-$tgl1' and tgl <= '$tahun-$bulan-$tgl2' group by data_barang.id_barang")
			or die("query error ".mysql_error());
		return $rekap;
	}
}

?>

