<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Detail Pemesanan</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bootstrap/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="bootstrap/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <center>
    <div id="page-wrapper">
    <?php
    include "../model/class.crud.php";
    $id_customer=$_POST['id_customer'];
    $kelola_pemesanan = new kelola_pemesanan();

    $lihat_det =$kelola_pemesanan->identitas_cus($id_customer);
    $row=mysql_fetch_array($lihat_det);

    ?>
   
      <table class="table table-bordered">
      <tr class="info">
        <td colspan="5">identitas</td>
      </tr>
        <tr>
          <td class="warning">nama</td>
          <td>: <?php echo "$row[nama_lengkap]"; ?></td>
        </tr>
        <tr>
          <td class="warning">alamat</td>
          <td>: <?php echo "$row[alamat]"; ?></td>
        </tr>
        <tr>
          <td class="warning">no hp</td>
          <td>: 0<?php echo "$row[no_hp]"; ?></td>
        </tr>
        </table>
    <?php
       $barang_pesanan = $kelola_pemesanan->lihat_pemesanan($id_customer);
       

    ?>
    <table class="table table-hover">
    <tr class="info">
      <td colspan="5">pemesanan</td>
    </tr>
    <tr class="warning">
      <td>no</td>
      <td>barang</td>
      <td>gambar</td>
      <td>jumlah</td>
      <td>tanggal</td>
    </tr>
    <?php
      $no_pem=1;
      while ($row_pem=mysql_fetch_array($barang_pesanan)) {
    ?>
      <tr>
        <td><?php echo "$no_pem"; ?></td>
        <td><?php echo "$row_pem[nama_barang]"; ?></td>
        <td><img width="49px" height="49px" src="../../customer/<?php echo "$row_pem[gambar]"; ?>"></td>
        <td><?php echo "$row_pem[jumlah]"; ?></td>
        <td><?php echo "$row_pem[tanggal]"; ?></td>
      </tr>
      

    <?php
    $no_pem++;
      }

      $lihat_idpem = $kelola_pemesanan->lihat_pemesanan($id_customer);
      $row_idpem=mysql_fetch_array($lihat_idpem);
      $id_pemesanan=$row_idpem['id_pemesanan'];

      $lihat_tagihan = $kelola_pemesanan->tagihan_lihat($id_customer,$id_pemesanan);
      $row_tag=mysql_fetch_array($lihat_tagihan);
    ?>
    </table>
    <table class="table table-bordered">
        <tr class="info">
          <td colspan="5">Tagihan</td>
        </tr>
        <tr class="warning">
          <td>harga asli</td>
          <td>biaya dp</td>
          <td>biaya pelunasan</td>
        </tr>
        <tr>
          <td>Rp. <?php echo "$row_tag[harga_asli_diskon]"; ?>;-</td>
          <td>Rp. <?php echo "$row_tag[biaya_dp_diskon]"; ?>;-</td>
          <td>Rp. <?php echo "$row_tag[biaya_pelunasan_diskon]"; ?>;-</td>

        </tr>
        <?php
        $lihatid=$kelola_pemesanan->lihat_id_detail($id_customer);
        $row_lihat=mysql_fetch_array($lihatid);
        $id=$row_lihat['id_detail_pemesanan'];

        $lihat_kevalidan =$kelola_pemesanan->lihat_kevalidan($id_customer,$id);
        $coba_liat =mysql_fetch_array($lihat_kevalidan);

        
        
        $valid="valid";

        if ($coba_liat['validasi_pembayaran']==$valid) {
          ?>
          <tr class="success">
            <td>Pembayaran dp</td>
            <td>lunas</td>
          </tr>
          <tr>
            <td>pelunasan</td>
        <form action="../controller/dbdetail_pemesanan.php" method="POST">    
            <td>
              <div class="checkbox">
                <label>
                    <input type="hidden" name="id_customer" value="<?php echo "$id_customer"; ?>">
                    <input type="hidden" name="id_detail" value="<?php echo "$id"; ?>">
                    <input type="checkbox" name="pelunasan" value="lunas" required>
                    Lunas
                  </label>
                </div>
            </td>
            <td>
              <button class="btn btn-primary" name="bayar" type="submit">Submit</button>
            </td>
        </form>    
          </tr>

        <?php
        }else{


        ?>


        <tr>
          <td>Pembayaran dp</td>



        <?php
        
         
         
         

          $lihat_pem=$kelola_pemesanan->lihat_pembayaran_dp($id_customer,$id);
          $row_dp=mysql_fetch_array($lihat_pem);
                  
          $cek=$row_dp['bukti_pembayaran'];
          
       
                    
          if ($cek != '') {
  

        ?>
          
          <td><img width="200px" src="../../customer/bukti_transaksi/<?php echo "$row_dp[bukti_pembayaran]"; ?>"></td>
        </tr>
        <tr>
         <form action="../controller/dbdetail_pemesanan.php" method="POST">
          <input type="hidden" name="id_customer" value="<?php echo "$id_customer"; ?>">
          <input type="hidden" name="id_detail" value="<?php echo "$row_lihat[id_detail_pemesanan]"; ?>">
          <td>
            <label class="radio-inline">
              <input type="radio" name="validasi" id="inlineRadio1" value="valid"> Valid
            </label>
          </td>
          <td>
            <label class="radio-inline">
              <input type="radio" name="validasi" id="inlineRadio2" value="tidak"> Tidak
            </label>
          </td>
          <td><button class="btn btn-info" type="submit" name="kevalidan">submit</button></td>
          </form>
        </tr>
          <?php
        }else{
          ?>
            <td class="danger">belum membayar</td>
          </tr>
          <?php
        }

        }

          ?>
        
        
      </table>
       <div style="float:left;"><a class="btn btn-success" href="?page=kelola_pemesanan" role="button">Kembali</a></div>
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

  </body>
</html>