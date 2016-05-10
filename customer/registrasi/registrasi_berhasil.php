<?php
  session_start();
  if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){
    header('location:registrasi.html');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Berhasil</title>

    <!-- Bootstrap -->
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <center>

<div style="width :700px; background: url(img/light.jpg)no-repeat;">
    <div class="page-header">
      <h3>SISTEM INFORMASI PEMESANAN ONLINE <small>customer</small></h3>
    </div>

        <div class="jumbotron" align="center">
          <div class="container">
           <p>Selamat Anda Berhasil Melakukan Registrasi</p>
           <p><p><a class="btn btn-primary btn-lg" href="../halaman_utama_customer.php?page=home" role="button">Lanjut</a></p></p>
          </div>
        </div>


      <div class="panel panel-danger">
        <div class="panel-body">
          PT Indo Pola Furniture
        </div>
        <div class="panel-footer">&copy; 2015 Designed by gentur and firman</div>
      </div>
</div>
  </center>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="ajax/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>