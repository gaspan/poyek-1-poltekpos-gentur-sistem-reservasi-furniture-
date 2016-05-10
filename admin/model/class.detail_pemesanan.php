<?php
include "dbconfig.php";

Class detail_pemesanan
{
	public function __construct()
	{
		$db = new DB_con();
	}
	public function validasi($id_detail,$validasi)
	{
		$penvalidan=mysql_query("UPDATE detail_pemesanan 
								set validasi_pembayaran='$validasi'
								where id_detail_pemesanan='$id_detail'") 
								or die(mysql_error());
	}

	public function ubah_status_pem($id_customer)
	{
		$ubah_status=mysql_query("UPDATE pemesanan
								set status_pembayaran='sudah'
								where id_customer='$id_customer' and penyelesaian='belum' ")
					or die("query error ".mysql_error());
	}

	public function pelunasan($lunas,$id_detail)
	{
		$lunas=mysql_query("INSERT into pelunasan(id_detail_pemesanan,lunas)
							values($id_detail,$lunas)")
				or die(mysql_error());
	}
	public function selesai($id_customer)
	{
		$selesai=mysql_query("UPDATE pemesanan
							set penyelesaian='sudah'
							where id_customer='$id_customer'")
				or die("query error ".mysql_error());
	}

}


?>