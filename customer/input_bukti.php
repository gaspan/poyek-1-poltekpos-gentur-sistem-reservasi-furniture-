<?php
  $nama_lengkap=$_SESSION['nama_lengkap'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

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

    <div class="jumbotron">
      <div class="container">
            <div class="form-group">
              <div class="panel panel-info">
                  <!-- Default panel contents -->
                  <div class="panel-heading">tagihan anda</div>
                  <div class="panel-body">
                    <p><font size="2">Transfer biaya dp anda ke rek 0987-12182-893030</font></p>
                  </div>

                  <!-- Table -->

                  <table class="table">



                      <?php
                        $id=$_SESSION['id_customer'];

                        include_once "database/class.proses.php";
                        
                        $pemesanan= new PEMESANAN();
                        $hasil=$pemesanan->lihat_tagihan($id);

                        $row=mysql_fetch_array($hasil);
                      ?>


                      <tr>
                        <td>nama</td>
                        <td>: <?php echo "$nama_lengkap"; ?> </td>
                      </tr>
                      <tr>
                        <td>harga yang harus dibayar</td>
                        <td>: Rp.<?php echo "$row[harga_asli_diskon]"; ?>;- </td>
                      </tr>
                      <tr class="danger">
                        <td>dp</td>
                        <td>: Rp.<?php echo "$row[biaya_dp_diskon]"; ?>;- </td>
                      </tr>
                      <tr>
                        <td>pelunasan yang harus dibayar</td>
                        <td>: Rp.<?php echo "$row[biaya_pelunasan_diskon]"; ?>;- </td>
                      </tr>






                  </table>
               </div>
          <form method="POST" action="dbcrud.php" enctype="multipart/form-data">
              <input type="file" name="bukti_pembayaran" accept="image/*" id="exampleInputFile">
              <p class="help-block">Upload bukti trasfer DP anda.</p>
            </div>
            <div class="checkbox">
            </div>
            <button type="submit" name="send" class="btn btn-default">Upload</button>
          </form>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>