<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Rekap Laporan</title>

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

            <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             <small> PT Indo Pola Furniture</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Rekap Laporan
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->




  <center>
    <div id="page-wrapper">
    
      <form class="form-inline" action="halaman_utama_admin.php?page=rekap_laporan" method="POST">
        <div class="form-group">
        Dari Tanggal:<select name="tanggal1" class="form-control hidden-print">
        <?php
        // tanggal
        echo "
        <option selected>tgl</option>";
        for ($tgl=1; $tgl <=31 ; $tgl++) { 
          $tgl_leng=strlen($tgl);
          if ($tgl_leng==1) 
            $i="0".$tgl;
            else
            $i=$tgl;
            echo "<option value=$i>$i</option>";
        }
        echo "</select>";

        ?>
        Sampai:<select name="tanggal2" class="form-control hidden-print">
        <?php
        // tanggal
        echo "
        <option selected>tgl</option>";
        for ($tgl=1; $tgl <=31 ; $tgl++) { 
          $tgl_leng=strlen($tgl);
          if ($tgl_leng==1) 
            $i="0".$tgl;
            else
            $i=$tgl;
            echo "<option value=$i>$i</option>";
        }
        echo "</select>";

        ?>

         <select name="bulan" class="form-control hidden-print">
          <?php
          // bulan
            $bln=array(1=>"Januari","Februari","Maret","April","Mei",
            "Juni","July","Agustus","September","Oktober",
            "November","Desember");

            echo "<option value=bulan selected>--bulan--</option>";
            for($bulan=1; $bulan<=12; $bulan++){
            echo "<option value=$bulan>$bln[$bulan]</option>";}
          ?>   
         </select>
         <select name="tahun" class="form-control hidden-print">
          <?php
          // tahun
            $now=date("Y");
            echo "<option value=2011 selected>--tahun--</option>";
            for($thn=2011; $thn<=$now; $thn++){
            echo "<option value=$thn>$thn</option>";}
          ?>
         </select>
         <button class="btn btn-success hidden-print" name="rekap" type="submit">Lihat</button>
        </div>
      </form>


        <?php
        include "../model/class.rekap.php";
          if (isset($_POST['rekap'])) {
            $tgl1=$_POST['tanggal1'];
            $tgl2=$_POST['tanggal2'];
            $bulan='0'.$_POST['bulan'];
            $tahun=$_POST['tahun'];

            $rekap = new rekap();
            $rekap_p=$rekap->rekap_bulanan($tgl1,$tgl2,$tahun,$bulan);

        ?>

      <table class="table table-striped">
        <tr class="info">
          <td>no</td>
          <td>periode</td>
          <td>gambar barang</td>
          <td>jumlah</td>
          <td>sub total</td>
        </tr>

        <?php
        $no=1;
        $total=0;
          while ($row_p=mysql_fetch_array($rekap_p)) {
            $harga_asli=$row_p['harga_asli'];
            $diskon=$harga_asli*10/100;
            $harga_fix=$harga_asli-$diskon;

            $harga_subtot=$harga_fix*$row_p['jumlah'];
            
        ?>

        <tr>
          <td><?php echo "$no"; ?></td>
          <td><?php echo "$row_p[tgl]"; ?></td>
          <td><img width="70px" height="70px" src="../../customer/<?php echo "$row_p[gambar]"; ?>"></td>
          <td><?php echo "$row_p[jumlah]";  ?></td>
          <td>Rp.<?php echo "$harga_subtot"; ?>;-</td>
        </tr>
        <?php
        $no++;
        $total=$total+$harga_subtot;
          }
          if ($total > 0) {
            
        ?>
        <tr class="danger">
          <td colspan="4">total</td>
          <td>Rp.<?php echo "$total"; ?>;-</td>
        </tr>
        <?php
          }else{
        ?>
          <tr>
            <td>Tidak ada pemesanan pada bulan <?php echo "$bulan-$tahun"; ?></td>
          </tr>
        <?php
          }
        ?>

      </table>

      <button class="btn btn-warning hidden-print" type="submit" onclick="window.print()">Cetak</button>
      <?php
          }
      ?>
    </div>
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