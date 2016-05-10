<?php
  session_start();
  if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){
    header('location:index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>pemesanan furniture online</title>
   

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="hovernav/hovernav.css">
    <link rel="stylesheet" type="text/css" href="assets/css/multilevel-nav.css">
    <link rel="shortcut icon" href="gambarbrg/profile.png">
   

   
  </head>
  <body>
  <div class="container">
    <div class="page-header">
      <img src="gambarbrg/header.jpg">
    </div>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="?page=home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
        


       <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">galery <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?page=pilih_kursi">kursi</a></li>
            <li><a href="?page=pilih_meja">meja</a></li>
            <li><a href="?page=pilih_lemari">lemari</a></li>
             <li><a href="?page=pilih_ranjang">ranjang</a></li>
              <li><a href="?page=pilih_paket">paket</a></li>
          </ul>
        </li>       
        <li>
          <li class="dropdown">
          <a href="halaman_utama_customer.php?" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pemesanan <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="dropdown-submenu">  
              <a href="">Transaksi</a>
              <ul class="dropdown-menu">
                <li class="disabled"><a href="">pilih barang</a> </li>
                <li role="separator" class="divider"></li>
                <li><a href="?page=pilih_kursi">kursi</a> </li>                
                <li><a href="?page=pilih_meja">meja</a> </li>
                <li><a href="?page=pilih_lemari">lemari</a> </li>
                <li><a href="?page=pilih_ranjang">ranjang</a> </li>
                <li><a href="?page=pilih_paket">paket</a> </li>
                <li role="separator" class="divider"></li>
                <li><a href="?page=cek_out">Cek Out</a> </li>
              </ul>
            </li>
            <li><a href="?page=input_bukti">Input Bukti transaksi</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="?page=barang_dipesan">Tinjau pesananan</a></li>
          </ul>
        </li>       
        <li>
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#contact">
            <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>
          </button>
            <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Contact Person</h4>
                  </div>
                  <div class="modal-body">
                      <img width="500px" width="500px" src="gambarbrg/alamat.jpg">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">              
          <li><button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></button></li>

          <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Keluar</h4>
                </div>
                <div class="modal-body">
                  <p>anda yakin untuk keluar?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <a class="btn btn-danger" href="dbcrud.php?logout" role="button">YA</a> 
              </div>
            </div>
          </div>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php
  switch ($_GET['page']) {
    case 'home':
      include "home.php";
      break;
   
    case 'transaksi':
      include "transaksi.php";
      break;

    case 'input_bukti':
      include "input_bukti.php";
      break;

    case 'barang_dipesan':
      include "barang_dipesan.php";
      break;


    case 'kursi':
      include "pilih_kursi.php";
      break;

    case 'meja':
      include "pilih_meja.php";
      break;

    case 'lemari':
      include "pilih_lemari.php";
      break;

    case 'paket':
      include "pilih_paket.php";
      break;

    case 'ranjang':
     include "pilih_ranjang.php";
      break;

    case 'pilih_kursi':
     include "pilih_kursi.php";
      break;

    case 'pilih_meja':
     include "pilih_meja.php";
      break;

    case 'pilih_lemari':
     include "pilih_lemari.php";
      break;

    case 'pilih_ranjang':
     include "pilih_ranjang.php";
      break;

    case 'pilih_paket':
     include "pilih_paket.php";
      break;

    case 'cek_out':
     include "cek_out.php";
      break;
    
    default:
      include "home.php";
      break;
  }
?>
      
    
      <div class="panel panel-info">
          <div class="panel-body">
            PT Indo Pola Furiture
          </div>
      <div class="panel-footer">&copy; 2016 Programmer Gentur Ariyadi ; Designer M. Firman and Gentur</div>
    </div>
  </div>
          
          
          

    <script src="hovernav/hovernav.js"></script>
    <script src="assets/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
  </body>
</html>