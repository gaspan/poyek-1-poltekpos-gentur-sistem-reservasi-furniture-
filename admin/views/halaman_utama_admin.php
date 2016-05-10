<?php
session_start();
$nama_admin=$_SESSION['nama_admin'];
?>

<!DOCTYPE html> 
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin PT Indo Pola Furniture</title>

    
    <!-- Bootstrap Core CSS --> 
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bootstrap/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="bootstrap/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin</a>
            </div> -->
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
              
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo " $nama_admin"; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       <li class="divider"></li>
                        <li>
                            <a href="dblogout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="../controller/dblogout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                 </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse" style="position:absolute;left: 0px;">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="?page=hal_utama"><i class="fa fa-fw fa-dashboard"></i> Admin</a>
                    </li>
                    <li>
                        <a href="?page=kelola_pemesanan"><i class="fa fa-fw fa-bar-chart-o"></i> Kelola Pemesanan</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#galery"><span class="glyphicon glyphicon-hdd" aria-hidden="true"></span> Galery Master </a>
                        <ul id="galery" class="collapse">
                            <li>
                                <a href="?page=galery_master">Tambah Galery</a>
                            </li>
                            <li>
                                <a href="?page=galery_ud">edit galery</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=rekap_laporan"><i class="fa fa-fw fa-table"></i> Rekap Laporan</a>
                    </li>
                  
                  
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Monitoring Data <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="?page=mon_dat_customer">Customer</a>
                            </li>
                            <li>
                                <a href="?page=mon_dat_pemesanan">Pemesanan</a>
                            </li>
                        </ul>
                    </li>
                 
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                

                    <?php

                    switch ($_GET['page']) {
                        case 'hal_utama':
                            include "hal_utama.php";
                            break;

                         case 'kelola_pemesanan':
                            include "kelola_pemesanan.php";
                            break;

                        case 'rekap_laporan':
                            include "rekap_laporan.php";
                            break;

                        case 'mon_dat_customer':
                            include "mon_dat_customer.php";
                            break;
                        
                         case 'mon_dat_pemesanan':
                            include "mon_dat_pemesanan.php";
                            break;

                        case 'det_pem':
                            include "detail_pemesanan.php";
                            break;

                        case 'galery_master':
                            include "galery_master.php";
                            break;
                        case 'galery_ud':
                            include "galery_ud.php";
                            break;
                        case 'edit_galery':
                            include "edit_galery.php";
                            break;

                        default:
                            include "hal_utama.php";
                            break;
                    }



                    ?>
               

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="bootstrap/js/plugins/morris/raphael.min.js"></script>
    <script src="bootstrap/js/plugins/morris/morris.min.js"></script>
    <script src="bootstrap/js/plugins/morris/morris-data.js"></script>

</body>

</html>
