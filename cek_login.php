<?php
include "config/koneksi.php";

$username = $_POST['username'];
$passid     = $_POST['password'];

// pastikan username dan password adalah berupa huruf atau angka.

$login=mysql_query("SELECT * FROM user WHERE userid='$username' AND passid='$passid'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION[userid]     = $r[userid];
  $_SESSION[passid]     = $r[passid];
  $_SESSION[lvl]     = $r[lvl];
	

	if($_SESSION[lvl]==1){
	header('location:media.php?module=home');
  } if($_SESSION[lvl]==2){
	header('location:media.php?module=home2');
  } if($_SESSION[lvl]==3){
  header('location:media.php?module=home3');
  } if($_SESSION[lvl]==4){
  header('location:media.php?module=home4');
  }
  }
else{
  include "error-login.php";
}
?>