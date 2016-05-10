<?php
include_once 'koneksi.php'; 

Class PEMESANAN
{
	public function __construct()
	{
		$db = new DB_conn();
	}

	public function login($username,$password)
	{
		$hasil = mysql_query("select*from pendaftaran where username='$username' and password='$password'");
		return $hasil;
	}
	public function jumlah_record_kursi()
	{
		$query=mysql_query("SELECT COUNT(*) from data_barang where jenis_barang='kursi'")
					or die("query error ".mysql_error() );
		return $query;
	}

	public function galery_kursi()
	{
		$galery_kursi= mysql_query("SELECT * from data_barang where jenis_barang='kursi' ORDER BY id_barang");
		return $galery_kursi;
	}
	public function jumlah_record_lemari()
	{
		$query=mysql_query("SELECT COUNT(*) from data_barang where jenis_barang='lemari'")
					or die("query error ".mysql_error() );
		return $query;
	}

	public function galery_lemari()
	{
		$galery_lemari=mysql_query("SELECT * from data_barang where jenis_barang='lemari' ORDER BY id_barang ");
		return $galery_lemari;
	}
	public function jumlah_record_meja()
	{
		$query=mysql_query("SELECT COUNT(*) from data_barang where jenis_barang='meja'")
					or die("query error ".mysql_error() );
		return $query;
	}

	public function galery_meja()
	{
		$galery_meja=mysql_query("SELECT * from data_barang where jenis_barang='meja' ORDER BY id_barang ");
		return $galery_meja;
	}
	public function jumlah_record_paket()
	{
		$query=mysql_query("SELECT COUNT(*) from data_barang where jenis_barang='paket'")
					or die("query error ".mysql_error() );
		return $query;
	}
	public function galery_paket()
	{
		$galery_paket=mysql_query("SELECT * from data_barang where jenis_barang='paket' ORDER BY id_barang");
		return $galery_paket;
	}
	public function jumlah_record_ranjang()
	{
		$query=mysql_query("SELECT COUNT(*) from data_barang where jenis_barang='ranjang'")
					or die("query error ".mysql_error() );
		return $query;
	}
	public function galery_ranjang()
	{
		$galery_ranjang=mysql_query("SELECT * from data_barang where jenis_barang='ranjang' ORDER BY id_barang ");
		return $galery_ranjang;
	}

	public function tambah_pemesanan($id_customer,$id_barang,$jumlah)
	{
		mysql_query("insert into pemesanan values(null,
			$id_customer,
			$id_barang,
			$jumlah,
			'belum',
			now(),
			'belum')")
		or die("query error ".mysql_error());
	}

	public function tampil_cek_out($id)
	{
		$tampil_cekout=mysql_query("select data_barang.id_barang, pemesanan.id_pemesanan, pendaftaran.nama_lengkap,data_barang.gambar,data_barang.nama_barang,data_barang.harga_asli,data_barang.biaya_dp,data_barang.biaya_pelunasan,pemesanan.jumlah, pemesanan.tanggal 
								  from data_barang 
							      inner join pemesanan on data_barang.id_barang=pemesanan.id_barang
							      inner join pendaftaran on pendaftaran.id_customer=pemesanan.id_customer 
							      where pendaftaran.id_customer='$id' and pemesanan.status_pembayaran='belum'")
								  or die("query error ".mysql_error());
		return $tampil_cekout;
	}

	public function edit_pemesanan($id_pemesanan,$jumlah)
	{
		mysql_query("update pemesanan set jumlah='$jumlah'
										where id_pemesanan='$id_pemesanan'")
										or die("query error ".mysql_error());
	}

	public function hapus_pemesanan($id)
	{
		mysql_query("delete from pemesanan where id_pemesanan='$id'")
					or die("query error ".mysql_error());
	}

	public function cek_pesanfix($id_customer)
	{
		$cek_pesanfix=mysql_query("select status_pembayaran from pemesanan where id_customer='$id_customer'")
								  or die("query error ".mysql_error());
		return $cek_pesanfix;

	}

	public function pesan_fix($id_customer,$harga_asli,$biaya_dp,$biaya_pelunasan,$fixasi)
	{
		mysql_query("INSERT INTO detail_pemesanan values(
				null,	
				'$id_customer',
				'belum',
				'$harga_asli',
				'$biaya_dp',
				'$biaya_pelunasan',
				'$fixasi',
				now())")
				or die("query error ".mysql_error());
	}

	public function lihat_id_detailpem($id_customer)
	{
		$lihat=mysql_query("select id_detail_pemesanan from detail_pemesanan where id_customer='$id_customer'")
							or die("query error ".mysql_error());
		return $lihat;
	}

	public function lihat_tagihan($id)
	{
		$lihat_tagihan=mysql_query("select detail_pemesanan.harga_asli_diskon,detail_pemesanan.biaya_dp_diskon,detail_pemesanan.biaya_pelunasan_diskon
                        FROM detail_pemesanan
                        where detail_pemesanan.id_customer='$id' and detail_pemesanan.validasi_pembayaran='belum'")
						or die("query error ".mysql_error());
		return $lihat_tagihan;
	}

	public function lihat_id_new($id_customer)
	{
		$lihatnew=mysql_query("select id_detail_pemesanan from detail_pemesanan
							where id_customer='$id_customer' order by id_detail_pemesanan desc")
		or die("query error ".mysql_error());
		return $lihatnew;
	}

	public function input_bukti($id_detail,$gambar)
	{
		mysql_query("insert into pembayaran_dp(id_detail_pemesanan,bukti_pembayaran)
			values('$id_detail','$gambar')")
		or die("query error ".mysql_error());
	}

	public function lihat_barangdipesan($id)
	{
		$lihat_pesanan=mysql_query("select pemesanan.id_pemesanan, pendaftaran.nama_lengkap,data_barang.gambar,data_barang.nama_barang,data_barang.harga_asli,data_barang.biaya_dp,data_barang.biaya_pelunasan,pemesanan.jumlah, pemesanan.tanggal from data_barang 
							      inner join pemesanan on data_barang.id_barang=pemesanan.id_barang
							      inner join pendaftaran on pendaftaran.id_customer=pemesanan.id_customer 
							      where pendaftaran.id_customer='$id' and pemesanan.status_pembayaran='sudah' and pemesanan.penyelesaian='belum'")
								  or die("query error ".mysql_error());
		return $lihat_pesanan;

	}
}


?>