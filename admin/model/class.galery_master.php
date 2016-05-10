<?php
include_once "dbconfig.php";

Class galery_master
{
	public function __construct()
	{
		$DB = new DB_con();
	}
	public function lihat_galery_kursi()
	{
		$galery=mysql_query("SELECT * FROM data_barang where jenis_barang='kursi'")
				or die("query error ".mysql_error());
		return $galery;
	}
	public function galery_meja()
	{
		$meja=mysql_query("SELECT * FROM data_barang where jenis_barang='meja'")
				or die("query erorr ".mysql_error());
		return $meja;
	}
	public function galery_lemari()
	{
		$meja=mysql_query("SELECT * FROM data_barang where jenis_barang='lemari'")
				or die("query erorr ".mysql_error());
		return $meja;
	}
	public function galery_paket()
	{
		$meja=mysql_query("SELECT * FROM data_barang where jenis_barang='paket'")
				or die("query erorr ".mysql_error());
		return $meja;
	}
	public function galery_ranjang()
	{
		$meja=mysql_query("SELECT * FROM data_barang where jenis_barang='ranjang'")
				or die("query erorr ".mysql_error());
		return $meja;
	}
	public function jenis_barang()
	{
		$jenis=mysql_query("SELECT * FROM data_barang group by jenis_barang")
				or die("query error ".mysql_error());
		return $jenis;
	}
	public function tambah_data_barang($jenis,$nama,$gambar,$hrg_asli,$biaya_dp,$biaya_pelunasan)
	{
		$tambah=mysql_query("INSERT into data_barang
			values(null,
				'$jenis',
				'$nama',
				'gambarbrg/$jenis/$gambar',
				'$hrg_asli',
				'$biaya_dp',
				'$biaya_pelunasan')")
		or die("query error ".mysql_error());
	}
	public function update_barang($jenis,$nama,$gambar,$hrg_asli,$dp,$pelunasan,$id_brg)
	{
		$barang = mysql_query("UPDATE data_barang SET jenis_barang='$jenis',
							nama_barang='$nama',
							gambar='gambarbrg/$jenis/$gambar',
							harga_asli='$hrg_asli',
							biaya_dp='$dp',
							biaya_pelunasan='$pelunasan'
							where id_barang='$id_brg' ")
		or die("query error ".mysql_error());
	}
}

Class edit_galery extends galery_master
{
	public function lihat_galery($id_brg)
	{
		$lihat=mysql_query("SELECT * FROM data_barang where id_barang='$id_brg' ")
						or die("query error ".mysql_error());
		return $lihat;
	}

}


?>