<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Barang yang sedang dipesan</title>

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
    <?php
      $id=$_SESSION['id_customer'];
      include "database/class.proses.php";
      $pemesanan= new PEMESANAN();

      $query=$pemesanan->lihat_barangdipesan($id); 
    ?>
     <?php    
      $no=1;
      $total_jumlah=0;
      $total_hargaasli=0;
      $total_biayadp=0;
      $total_biayapelunasan=0;
      
      $row_lihat=mysql_fetch_array($query);
  if ($row_lihat < 1) {
    ?>
    <div class="jumbotron">
      <p>silahkan transfer tagihan dp anda terlebih dahulu ke no rek 09348-231231-1421 ,kemudian upload bukti pembayaran anda, apabila bukti pembayaran valid
       kami proses pemesanan anda</p>
    </div>
    <?php
  }else{

    ?>
  <div class="jumbotron">
   <table class="table table-hover">
    <tr class="success">
      <td width="2px">no</td>
      <td width="90px">gambar</td>
      <td width="25px">nama brg</td>
      <td width="80px">harga asli</td>
      <td width="80px">biaya dp</td>
      <td width="90px">biaya pelunasan</td>
      <td width="20px">jumlah</td>
      <td width="120px">harga asli x jumlah</td>
      <td width="120px">biaya dp x jumlah</td>
      <td width="px">biaya pelunasan x jumlah</td>
    </tr>


    <?php
    $query2 = $pemesanan->lihat_barangdipesan($id);
      while ($row= mysql_fetch_array($query2)) {
        $harga_aslixjmlh=$row['harga_asli']*$row['jumlah'];
        $biaya_dpxjmlh=$row['biaya_dp']*$row['jumlah'];
        $biaya_pelunasanXjmlh=$row['biaya_pelunasan']*$row['jumlah'];
     
    ?>

 
    <tr>
      <td><?php echo "$no"; ?></td>
      <td><img src="<?php echo "$row[gambar]"; ?>" height="70px" width="70px"> </td>
      <td><?php echo "$row[nama_barang]"; ?></td>
      <td><?php echo "$row[harga_asli]"; ?></td>
      <td><?php echo "$row[biaya_dp]"; ?></td>
      <td><?php echo "$row[biaya_pelunasan]"; ?></td>
      <td><?php echo "$row[jumlah]"; ?></td>
      <td><?php echo "$harga_aslixjmlh"; ?></td>
      <td><?php echo "$biaya_dpxjmlh"; ?></td>
      <td><?php echo "$biaya_pelunasanXjmlh"; ?></td>
    </tr>
    <?php 
      $no++;
      $total_jumlah=$total_jumlah+$row['jumlah'];
      $total_hargaasli=$total_hargaasli+$harga_aslixjmlh;
      $total_biayadp=$total_biayadp+$biaya_dpxjmlh;
      $total_biayapelunasan=$total_biayapelunasan+$biaya_pelunasanXjmlh;
       }

      $diskon_hargaasli=$total_hargaasli*10/100;
      $diskon_biayadp=$total_biayadp*10/100;
      $diskon_biayapelunasan=$total_biayapelunasan*10/100;

      $harga_asli_diskon=$total_hargaasli-$diskon_hargaasli;
      $biaya_dp_diskon=$total_biayadp-$diskon_biayadp;
      $biaya_pelunasan_diskon=$total_biayapelunasan-$diskon_biayapelunasan;
    ?>
    <tr class="warning">
        <td colspan="6"> Total :</td>
        <td><?php echo "$total_jumlah"; ?></td>
        <td>Rp.<?php echo "$total_hargaasli"; ?></td>
        <td>Rp.<?php echo "$total_biayadp"; ?></td>
        <td colspan="2">Rp.<?php echo "$total_biayapelunasan"; ?></td>
    </tr>
    <tr class="danger">
      <td colspan="6"> diskon 10% :</td>
      <td><?php echo "$total_jumlah"; ?></td>
        <!-- <input type="hidden" name="status_pembayaran" value="belum"> -->
      <td>Rp.<?php echo "$harga_asli_diskon"; ?></td>
      <td>Rp.<?php echo "$biaya_dp_diskon"; ?></td>
      <td colspan="2">Rp.<?php echo "$biaya_pelunasan_diskon"; ?></td>      
    </tr>
      </table>
</div>
      <?php
      }
      ?>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>