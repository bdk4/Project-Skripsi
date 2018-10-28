<?php 
session_start();
error_reporting(0);
include "timeout.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PENGELOLAAN ARSIP</title>
<link rel="shortcut icon" href="images/logo1.png">
<link rel="stylesheet" href="css/style.css" type="text/css"  />
</head>
<body>
<div id="container">
<div id="header"></div>
<div id="menu">
	<ul class="menu-wrap">
	<?php if ($_SESSION['lvl']=='1') { ?>
	<li><a class="border hvrwarna hvr-underline-from-left" href="?module=arsip">Data Arsip</a></li>
	<li>
		<a class="border hvrwarna hvr-underline-from-left" href="?module=carijudul_admin">Cari Arsip</a>
			<ul>
           		<li><a href="?module=carikodeadmin" class="hvrwarna hvr-underline-from-left">Berdasarkan Kode</a></li>
       		</ul>
	</li>
	<li><a class="border hvrwarna hvr-underline-from-left" href="?module=laporan">Laporan</a></li>
	<li><a class="border hvrwarna hvr-underline-from-left" href="logout.php"> Logout</a></li>
	<?php 
}
	if ($_SESSION['lvl']=='2'){
	?>
	<ul class="menu-wrap2">
    <li>
    	<a class="border hvrwarna hvr-underline-from-left" href="?module=carijudul">Cari Arsip</a>
			<ul>
           		<li><a href="?module=carikode" class="hvrwarna hvr-underline-from-left">Berdasarkan Kode</a></li>
       		</ul>
    </li>
	<li><a class="border hvrwarna hvr-underline-from-left" href="?module=laporan">Laporan</a></li>
	<li><a class="border hvrwarna hvr-underline-from-left" href="logout.php"> Logout</a></li>
	<?php
}
	if ($_SESSION['lvl']=='3'){
	?>
	<ul class="menu-wrap4">
    <li><a class="border hvrwarna hvr-underline-from-left" href="?module=user">Data User</a></li>
    <li>
    	<a class="border hvrwarna hvr-underline-from-left" href="?module=carijudul">Cari Arsip</a>
			<ul>
           		<li><a href="?module=carikode" class="hvrwarna hvr-underline-from-left">Berdasarkan Kode</a></li>
       		</ul>
    </li>
	<li><a class="border hvrwarna hvr-underline-from-left" href="?module=laporan">Laporan</a></li>
	<li><a class="border hvrwarna hvr-underline-from-left" href="logout.php"> Logout</a></li>
	<?php }
	if($_SESSION['lvl']=='4'){
	?>
	<ul class="menu-wrap3">
	<li>
		<a class="border hvrwarna hvr-underline-from-left" href="?module=carijudul">Cari Arsip</a>
			<ul>
           		<li><a href="?module=carikode" class="hvrwarna hvr-underline-from-left">Berdasarkan Kode</a></li>
       		</ul>
	</li>
	<li><a class="border hvrwarna hvr-underline-from-left" href="logout.php"> Logout</a></li>
	<?php } ?>
    <li class="clear"></li>
    </ul>
</div>
<div id="content">
<div class="form">
<?php include "data.php"; ?>
</div>
</div>
<div id="footer"></div>
<!-- Copyright © 2012 by David Haril(dhave.kharel@gmail.com) -->
</div>
</body>
</html>