<?php
error_reporting(E_ALL);

$MY_CONNECTION = mysql_connect("localhost","root","root");
mysql_select_db("ads");
if ( ! $MY_CONNECTION ) {
  echo("Bad connection");
  die();
}
if ( isset($_REQUEST['dbcheck']) ) {
  echo('Good Database connection');
}
?>
