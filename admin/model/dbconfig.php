<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_NAME','web_pemesanan');

class DB_con
{
 function __construct()
 {
  $conn = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('error connecting to server'.mysql_error());
  mysql_select_db(DB_NAME, $conn) or die('error connecting to database->'.mysql_error());
 }
}

?> 