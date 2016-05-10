<?php
include "../model/class.galery_master.php";

if (isset($_POST['kursi']) || isset($_POST['meja']) || isset($_POST['lemari']) || isset($_POST['paket']) || isset($_POST['ranjang']) || isset($_GET['berhasil']) || isset($_GET['dp_lebih'])) {
	$id_brg=$_POST['id_barang'];
?>

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
                                <i class="fa fa-dashboard"></i> Galery Master <small>Edit Data</small>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<?php

$galery = new edit_galery();
$lihat_jenis = $galery->jenis_barang();
$lihat_det = $galery->lihat_galery($id_brg);
$row_det = mysql_fetch_array($lihat_det);
?>
        	
<script type="text/javascript">
function PreviewImage() {
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
oFReader.onload = function (oFREvent)
 {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
};
};
</script>
		 <center>
         	<div class="page-wrapper">
                <!-- tambah barang -->
				 <form action="../controller/dbgalery_edit.php" method="POST" enctype="multipart/form-data">            
					<div class="row">
					  <div class="col-md-6">
					  	<div class="form-inline">
							<div class="form-group">
								<input type="hidden" name="id_brg" value="<?php echo "$id_brg"; ?>">
								<h3><span class="label label-default">old</span></h3>
						  		<img src="../../customer/<?php echo "$row_det[gambar]"; ?>" style="width: 150px; height: 150px;" />
							</div>
							<div class="form-group">
								<h3><span class="label label-default">new</span></h3>
							  	<img id="uploadPreview" style="width: 150px; height: 150px;" />
								<input  id="uploadImage" type="file" name="gambar" onchange="PreviewImage();" accept="image/*" required/>								
							</div>
						</div>
					  </div>
					  <div class="col-md-6">
					  	<table>
					  		<tr>
					  			<td>
					  			  <div class="input-group">
					  			  	<span class="input-group-addon" id="basic-addon3">jenis  :</span>
					  				<select class="form-control" name="jenis_barang">
					  				<option selected="<?php echo "$row_det[jenis_barang]"; ?>"><?php echo "$row_det[jenis_barang]"; ?></option>
<?php
while ($row=mysql_fetch_array($lihat_jenis)) {
?>
				  					<option value="<?php echo "$row[jenis_barang]"; ?>"><?php echo "$row[jenis_barang]"; ?></option>
<?php
}
?>
					  				</select>
					  			   </div>
					  			</td>
					  		</tr>
					  		<tr>
					  			<td>
					  			  <div class="input-group">
					  			  	<span class="input-group-addon" id="basic-addon3">nama</span>
					  				<input type="text" name="nama" class="form-control input sm" placeholder="nama barang" value="<?php echo "$row_det[nama_barang]"; ?>"  required/>
					  			  </div>
					  			</td>
					  		</tr>
					  		<tr>
					  			<td width="6px">
					  			  <div class="input-group">
					  				<span class="input-group-addon" id="basic-addon3">coast Rp.</span><input type="number" name="harga_asli" class="form-control input-sm" placeholder="Harga asli" value="<?php echo "$row_det[harga_asli]"; ?>" required/><span class="input-group-addon">;-</span>
					  			  </div>
					  			</td>
					  		  
					  		</tr>
					  		<tr>
					  			<td width="6px">
					  			  <div class="input-group">
					  				<span class="input-group-addon" id="basic-addon3">DP Rp.</span><input type="number" name="biaya_dp" class="form-control input-sm" placeholder="Harga DP" value="<?php echo "$row_det[biaya_dp]"; ?>" required/><span class="input-group-addon">;-</span>
					  			  </div>
					  			</td>
					  		</tr>
					  		<tr>
					  			<td>
					  			  <div class="input-group">
					  			  </div>
					  			</td>
					  		</tr>
					  		<tr>
					  			<td>
						  			<div class="input-group">
						  				<button class="btn btn-success" name="edit" type="submit"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> SAVE</button>
						  			</div>
					  			</td>
					  		</tr>
					  	</table>
					  </div>
					</div>
				</form>


         	</div>
         </center>
         
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="bootstrap/js/plugins/morris/raphael.min.js"></script>
    <script src="bootstrap/js/plugins/morris/morris.min.js"></script>
    <script src="bootstrap/js/plugins/morris/morris-data.js"></script>
    
</html>
<?php
}else{
	header('locaion:../views/halaman_utama_admin.php?page=galery_ud');
}
?>