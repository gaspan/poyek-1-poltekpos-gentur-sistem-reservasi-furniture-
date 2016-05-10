<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Monitoring Data Customer</title>

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
                                <i class="fa fa-dashboard"></i> Monitoring Data Customer
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->




  <center>
    <div id="page-wrapper">
      <table class="table table-hover">
        <tr class="success">
          <td>no</td>
          <td>nama</td>
          <td>alamat</td>
          <td>no hp</td>
        </tr>

        <?php
        include "../model/class.monitor.php";

        $monitor= new monitor_costumer();

        $tampil_customer=$monitor->lihat_costumer();
        $no=1;
        while ($row_cus=mysql_fetch_array($tampil_customer)) {
          ?>
        <tr>
          <td><?php echo "$no"; ?></td>
          <td><?php echo "$row_cus[nama_lengkap]"; ?></td>
          <td><?php echo "$row_cus[alamat]"; ?></td>
          <td>0<?php echo "$row_cus[no_hp]"; ?></td>
        </tr>

          <?php
          $no++;
        }


        ?>
      </table>
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