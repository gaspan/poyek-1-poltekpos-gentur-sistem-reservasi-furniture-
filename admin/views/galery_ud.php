<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>galery</title>
    
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bootstrap/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="bootstrap/css/plugins/morris.css" rel="stylesheet">
    <!-- flickity.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/flickity.css">

    <!-- Custom Fonts -->
    <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    
    	 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             <small> PT Indo Pola Furniture</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Galery Master
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<?php
include "../model/class.galery_master.php";

$galery = new galery_master();

$lihat_galery_kursi =  $galery->lihat_galery_kursi();

?>

         <center>
         	<div class="page-wrapper">
<?php
if (isset($_GET['dp_lebih'])) {

?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        Harga DP tidak boleh lebih dari 50%
                                    </div>
<?php
}
?>
<?php
if (isset($_GET['berhasil'])) {

?>
                                    <div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        Data Barang berhasil diubah
                                    </div>
<?php
}
?>
            <form action="?page=edit_galery" method="POST">	
         	  <h3><span class="label label-default">kursi</span></h3>
         		<div class="gallery js-flickity">
<?php
while ($row=mysql_fetch_array($lihat_galery_kursi)) {
?>

         			 <div class="gallery-cell">
                        <input type="hidden" name="id_barang" value="<?php echo "$row[id_barang]"; ?>">
         				<button class="btn btn-default" name="kursi" type="submit"><img width="80px" height="90px" src="../../customer/<?php echo "$row[gambar]"; ?>"></button>
         			 </div>
<?php
}
?>        		</div>
            </form>	
            <form action="?page=edit_galery" method="POST"> 
			  <h3><span class="label label-default">meja</span></h3>
			  	<div class="gallery js-flickity">
<?php
	$galery_meja = $galery->galery_meja();
	while ($row_meja=mysql_fetch_array($galery_meja)) {

?>
			  		<div class="gallery-cell">
                        <input type="hidden" name="id_barang" value="<?php echo "$row_meja[id_barang]"; ?>">
         				<button class="btn btn-default" name="meja" type="submit"><img width="80px" height="90px" src="../../customer/<?php echo "$row_meja[gambar]"; ?>"></button>
			  		</div>
<?php
	}
?>			  		
			  	</div>
            </form> 
            <form action="?page=edit_galery" method="POST"> 
			  	<h3><span class="label label-default">lemari</span></h3>
			  	<div class="gallery js-flickity">
<?php
	$galery_lemari = $galery->galery_lemari();
	while ($row_lemari=mysql_fetch_array($galery_lemari)) {

?>
			  		<div class="gallery-cell">
                        <input type="hidden" name="id_barang" value="<?php echo "$row_lemari[id_barang]"; ?>">
         				<button class="btn btn-default" name="lemari" type="submit"><img width="80px" height="90px" src="../../customer/<?php echo "$row_lemari[gambar]"; ?>"></button>
			  		</div>
<?php
	}
?>			  		
			  	</div>
            </form> 
            <form action="?page=edit_galery" method="POST"> 
			  	<h3><span class="label label-default">paket</span></h3>
			  	<div class="gallery js-flickity">
<?php
	$galery_paket = $galery->galery_paket();
	while ($row_paket=mysql_fetch_array($galery_paket)) {

?>
			  		<div class="gallery-cell">
                        <input type="hidden" name="id_barang" value="<?php echo "$row_paket[id_barang]"; ?>">
         				<button class="btn btn-default" name="paket" type="submit"><img width="80px" height="90px" src="../../customer/<?php echo "$row_paket[gambar]"; ?>"></button>
			  		</div>
<?php
	}
?>			  		
			  	</div>
            </form> 
            <form action="?page=edit_galery" method="POST">  
			  	<h3><span class="label label-default">ranjang</span></h3>
			  	<div class="gallery js-flickity">
<?php
	$galery_ranjang = $galery->galery_ranjang();
	while ($row_ranjang=mysql_fetch_array($galery_ranjang)) {

?>
			  		<div class="gallery-cell">
                        <input type="hidden" name="id_barang" value="<?php echo "$row_ranjang[id_barang]"; ?>">
         				<button class="btn btn-default" name="ranjang" type="submit"><img width="80px" height="90px" src="../../customer/<?php echo "$row_ranjang[gambar]"; ?>"></button>
			  		</div>
<?php
	}
?>			  		
			  	</div>
            </form>

         	</div>
         </center>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/jquery.min.js"></script>
	  
    <!-- flickity.pkgd.js -->
    <script src="assets/flickity.pkgd.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="bootstrap/js/plugins/morris/raphael.min.js"></script>
    <script src="bootstrap/js/plugins/morris/morris.min.js"></script>
    <script src="bootstrap/js/plugins/morris/morris-data.js"></script>
    
</html>