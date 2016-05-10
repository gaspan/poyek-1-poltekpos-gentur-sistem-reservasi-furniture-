  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>pilih barang</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
     <style>
      .pic{
        width:150px;
        height:150px;
      }
      .picbig{
        position: absolute;
        width:0px;
        -webkit-transition:width 0.3s linear 0s;
        transition:width 0.3s linear 0s;
        z-index:10;
      }
      .pic:hover + .picbig{
        width:370px;
      }
      </style>
    


    
  </head>
  <body>
  <table class="table table-condensed">
    <tr>
      <td>no</td>
      <td>gambar</td>
      <td>keterangan</td>
      <td>aksi</td>
    </tr>
     <?php 
     include 'pagination1.php';
     include "database/class.proses.php";
     $pemesanan= new PEMESANAN();

     $tampil = $pemesanan->galery_meja();

     $rpp= 4;
     $reload="?page=pilih_meja&pagination=true";
     $page = intval(isset($_GET['pages'])?$_GET['pages'] : 0);
     if ($page<=0) $page = 1;
     $tcount = mysql_num_rows($tampil);
     $tpages = ($tcount) ? ceil($tcount/$rpp) : 1;
     //$start = ($page - 1) * $per_hal;
     $count=0;
     $i=($page-1)*$rpp;
     $no_urut = ($page-1)*$rpp;
    while (($count < $rpp) && ($i < $tcount)) {
      mysql_data_seek($tampil, $i);
      $row=mysql_fetch_array($tampil);
    ?>
      
       <tr><td rowspan="5" width="40px"><?php echo ++$no_urut;?></td></tr>
       <input type="hidden" name="id_barang"<?php echo "value='$row[id_barang]'";?>>
       <tr>
        <td rowspan="5" width="200" height="200">
          <img class="pic" src=<?php echo "$row[gambar]"; ?>>
          <img class="picbig" src=<?php echo "$row[gambar]"; ?>>
        </td>
       <td class="success">nama barang :<?php echo "$row[nama_barang]";?></td>
       <td rowspan='5' width=50px;>
        <a class="btn btn-primary" href= role=button data-toggle="modal" data-target="#myModal<?php echo "$row[id_barang]";?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>

<!--modals-->
          <div class="modal fade" id="myModal<?php echo "$row[id_barang]";?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel<?php echo "$row[id_barang]";?>">Pesan Barang</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="dbcrud.php" role="form" onsubmit="return validasi_input(this)">
                    <div class="form-group">
                      <table class="table table-striped">

                        <input type="hidden" name="id_barang" value="<?php echo "$row[id_barang]"; ?>">
                      
                        <tr>
                          <td rowspan="5">
                            <img src="<?php echo "$row[gambar]"; ?>" width="190px" height="210px">
                          </td>
                          <td>
                            nama :
                          </td>
                          <td>
                            <?php echo "$row[nama_barang]"; ?>
                          </td>
                          <td>
                            
                          </td>
                        </tr>
                        <tr>
                          <td>
                            harga asli :
                          </td>
                          <td>
                            <?php echo "$row[harga_asli]"; ?>
                          </td>
                          <td>
                            
                          </td>
                        </tr>
                        <tr>
                          <td>
                            harga dp:
                          </td>
                          <td>
                            <?php echo "$row[biaya_dp]"; ?>
                          </td>
                          <td>
                            
                          </td>
                        </tr>
                        <tr>
                          <td>
                            harga pelunasan :
                          </td>
                          <td>
                            <?php echo "$row[biaya_pelunasan]"; ?>
                          </td>
                          <td>
                            
                          </td>
                        </tr>
                        <tr>
                          <td>
                            jumlah :
                          </td>
                          <td>
                            <input type="number" min="1" max="1000" name="jumlah" /required>
                          </td>
                          <td  width="70px" height="20px" >
                            <button class='btn-sm btn-warning' type='submit' name="tambah"><span class="glyphicon glyphicon-plus" aria-hidden="true">Tambah</span></button>
                          </td>
                        </tr>

                      </table>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  
                </div>
              </div>
            </div>
          </div>


       </td></tr>
       <tr><td>Harga asli :<?php echo "$row[harga_asli]";?></td></tr>
       <tr><td>Biaya DP :<?php echo "$row[biaya_dp]";?></td></tr>
       <tr><td>Biaya Pelunasan :<?php echo "$row[biaya_pelunasan]";?></td></tr>

    <?php
        $i++; 
        $count++;
      }
      ?>
  </table>

  <div><?php echo paginate_one($reload, $page, $tpages); ?></div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>