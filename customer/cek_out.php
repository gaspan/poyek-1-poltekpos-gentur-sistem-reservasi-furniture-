<?php
  $id=$_SESSION['id_customer'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cek Out</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(function(){
        $(".tooltipsku").tooltip();
      });
    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<?php
  include "database/class.proses.php";
      $pemesanan = new PEMESANAN();
   
      $query=$pemesanan->tampil_cek_out($id);
      $tanggal=date('l,d-m-y');
?>

    <div class="jumbotron">
      
      <table class="table table-hover">
      <p><font face="georgia" size="3">customer :<?php echo "$_SESSION[nama_lengkap]"; ?> || tanggal :<?php echo "$tanggal"; ?></font></p>
        <tr class="success">
          <td width="1px">no</td>
          <td width="90px">gambar</td>
          <td width="25px">nama brg</td>
          <td width="80px">harga asli</td>
          <td width="80px">biaya dp</td>
          <td width="90px">biaya pelunasan</td>
          <td width="20px">jumlah</td>
          <td width="120px">harga asli x jumlah</td>
          <td width="120px">biaya dp x jumlah</td>
          <td width="px">biaya pelunasan x jumlah</td>
          <td width="100px" class="hidden-print">aksi</td>

        </tr>
    <?php    
      $no=1;
      $total_jumlah=0;
      $total_hargaasli=0;
      $total_biayadp=0;
      $total_biayapelunasan=0;

      while ($row=mysql_fetch_array($query)) {
        $harga_aslixjmlh=$row['harga_asli']*$row['jumlah'];
        $biaya_dpxjmlh=$row['biaya_dp']*$row['jumlah'];
        $biaya_pelunasanXjmlh=$row['biaya_pelunasan']*$row['jumlah'];
    
    ?>

        <tr>
          <input type="hidden" name="id_pemesanan" <?php echo "value='$row[id_pemesanan]'"; ?>>
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
          <td width="100px"><a class="btn btn-warning hidden-print" href="#" role="button" data-toggle="modal" data-target="#myModal<?php echo "$row[id_pemesanan]edit"; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></a>
                 <script type="text/javascript">
                    function validasi_input(form){
                      if(form.jumlah.value==""){
                        alert("isi jumlah pemesanan!!");
                        form.jumlah.focus();
                        return(false);
                      }
                    }
                   </script>


              <!-- Modal  edit-->
<div class="modal fade" id="myModal<?php echo "$row[id_pemesanan]edit"; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Pemesanan</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="dbcrud.php" onsubmit="return validasi_input(this)">
          <input type="hidden" name="id_pemesanan" value="<?php echo "$row[id_pemesanan]"; ?>">
            <table class="table table-condensed">
              <tr>
                <td>Barang</td>
                <td>jumlah</td>
              </tr>
              <tr>
                <td><img src="<?php echo "$row[gambar]"; ?>" width="65px" height="65px"></td>
                <td><input type="number" min="1" max="1000" name="jumlah" value="<?php echo "$row[jumlah]"; ?>"></td>
              </tr>
            </table>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span></button>
        <button type="submit" name="edit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span></button>
        </form>
      </div>
    </div>
  </div>
</div>


            <a class="btn btn-danger hidden-print" href="#" role="button" data-toggle="modal" data-target="#myModal<?php echo "$row[id_pemesanan]del"; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></a>

            <!-- Modal hapus -->
<div class="modal fade" id="myModal<?php echo "$row[id_pemesanan]del"; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><font face="arial" size="3" color="orange">Warning!!!</font></h4>
      </div>
      <div class="modal-body">
        <p><font face="verdana" size="2" color="red">hapus pemesanan?</font></p>
        <img src="<?php echo "$row[gambar]"; ?>" width="65px" height="65px">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <a type="button" href="dbcrud.php?del_id=<?php echo "$row[id_pemesanan]"; ?>" class="btn btn-danger" value="hapus"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
      </form>
      </div>
    </div>
  </div>
</div>

          </td>
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

      
      <form method="POST" action="dbcrud.php">
        <input type="hidden" name="id_customer" value="<?php echo "$id"; ?>">
        <!-- <input type="hidden" name="status_pembayaran" value="belum"> -->
      <td>Rp.<input type="number" name="harga_asli_diskon" style="width:81px;" value=<?php echo "$harga_asli_diskon"; ?> readonly></td>
      <td>Rp.<input type="number"  name="biaya_dp_diskon" style="width:81px;" value=<?php echo "$biaya_dp_diskon"; ?> readonly></td>
      <td colspan="2">Rp.<input type="number" name="biaya_pelunasan_diskon" style="width:100px;" value=<?php echo "$biaya_pelunasan_diskon"; ?> readonly></td>
      <input type="hidden" name="fixasi" value="fix">      
    </tr>
    <tr>
      <td><button type="button" class="btn btn-primary hidden-print" data-toggle="modal" data-target="#myModal<?php echo "$_SESSION[id_customer]"; ?>">pesan</button></td>

      <!-- Modal persetujuan -->
<div class="modal fade" id="myModal<?php echo "$_SESSION[id_customer]"; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Persetujuan</h4>
      </div>
      <div class="modal-body">
        <p><font size="3">setelah anda menyetujui persetujuan ini, anda harus membayar dp melalui rekening, pembayaran biaya pelunasan dilakukan setelah barang dikirim ke rumah anda</font> </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">tidak</button>
        <button type="submit" name="pesan_fix" class="btn btn-primary">saya satuju</button>
      </div>
    </div>
  </div>
</div>

      </form> 
      <td>
        <a class="btn btn-success hidden-print" type="button" value="print" onclick="window.print()">
          <span class="glyphicon glyphicon-print" aria-hidden="true"></span> cetak
        </a>
      </td>
    </tr>
      </table>
            
      
    </div>

   
  </body>
</html>