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
                                <i class="fa fa-dashboard"></i> Galery Master <small>Tambah Data</small>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<?php
include "../model/class.galery_master.php";
$galery = new galery_master();
$lihat_jenis = $galery->jenis_barang();
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
				 <form action="../controller/dbgalery.php" method="POST" enctype="multipart/form-data">            
					<div class="row">
					  <div class="col-md-6">
					  	<img id="uploadPreview" style="width: 150px; height: 150px;" />
						<input  id="uploadImage" type="file" name="gambar" onchange="PreviewImage();" accept="image/*" required/>						
					  </div>
					  <div class="col-md-6">
					  	<table>
					  		<tr>
					  			<td>
					  				<select class="form-control" name="jenis_barang">
					  				<option selected="jenis barang">jenis barang</option>
<?php
while ($row=mysql_fetch_array($lihat_jenis)) {
?>
				  					<option value="<?php echo "$row[jenis_barang]"; ?>"><?php echo "$row[jenis_barang]"; ?></option>
<?php
}
?>
					  				</select>
					  			</td>
					  		</tr>
					  		<tr>
					  			<td>:<input type="text" name="nama" class="form-control" placeholder="nama barang"  required/></td>
					  		</tr>
					  		<tr>
					  			<td>
					  			  <div class="input-group">
					  				<span class="input-group-addon">Rp.</span><input type="number" name="harga_asli" class="form-control input-sm" placeholder="Harga asli" required/><span class="input-group-addon">;-</span>
					  			  </div>
					  			</td>
					  		  
					  		</tr>
					  		<tr>
					  			<td>
					  			  <div class="input-group">
					  				<span class="input-group-addon">Rp.</span><input type="number" name="biaya_dp" class="form-control input-sm" placeholder="Harga DP" required/><span class="input-group-addon">;-</span>
					  			  </div>
					  			</td>
					  		</tr>
					  		<tr>
					  			<td>
					  			  <div class="input-group">
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
         								Barang berhasil ditambahkan
					  				</div>
<?php
}
?>
					  			  </div>
					  			</td>
					  		</tr>
					  		<tr>
					  			<td>
						  			<div class="input-group">
						  				<button class="btn btn-success" name="tambah" type="submit"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> SAVE</button>
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