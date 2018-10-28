<?php
include "config/koneksi.php";

include "config/fungsi_indotgl.php";

	
if ($_SESSION['lvl']=='1'){
	if($_GET['module']=="home"){
		echo "<div class='home'>SELAMAT DATANG</br>
		DI APLIKASI PENGELOLAAN ARSIP KECAMATAN PAKUHAJI</div>";
	}
	
	else if($_GET['module']=="arsip"){
	include "modul/arsip/arsip.php";
	}
	else if($_GET['module']=="disposisi"){
	include "modul/arsip/disposisi.php";
	}
	else if($_GET['module']=="carikodeadmin"){
	include "modul/cari/carikodeadmin.php";
	}
	else if($_GET['module']=="carijudul_admin"){
	include "modul/cari/carijudul_admin.php";
	}
	else if($_GET['module']=="laporan"){
	include "menu_laporan.php";
	}
 }
 
 if ($_SESSION['lvl']=='2'){
 	if($_GET['module']=="home2"){
	echo "<div class='home'>SELAMAT DATANG</br>
		DI APLIKASI PENGELOLAAN ARSIP KECAMATAN PAKUHAJI</div>";
	}
	else if($_GET['module']=="carikode"){
	include "modul/cari/carikode.php";
	}
	else if($_GET['module']=="carijudul"){
	include "modul/cari/carijudul.php";
	}
	else if($_GET['module']=="laporan"){
	include "menu_laporan.php";
	}
 }
	if ($_SESSION['lvl']=='3'){
		if($_GET['module']=="home3"){
		echo "<div class='home'>SELAMAT DATANG</br>
		DI APLIKASI PENGELOLAAN ARSIP KECAMATAN PAKUHAJI</div>";
	}
	else if($_GET['module']=="user"){
	include "modul/user/user.php";
	}
	else if($_GET['module']=="carikode"){
	include "modul/cari/carikode.php";
	}
	else if($_GET['module']=="carijudul"){
	include "modul/cari/carijudul.php";
	}
	else if($_GET['module']=="laporan"){
	include "menu_laporan.php";
	}
 }
 if ($_SESSION['lvl']=='4'){
 	if($_GET['module']=="home4"){
		echo "<div class='home'>SELAMAT DATANG</br>
		DI APLIKASI PENGELOLAAN ARSIP KECAMATAN PAKUHAJI</div>";
	}
	else if($_GET['module']=="carikode"){
	include "modul/cari/carikode.php";
	}
	else if($_GET['module']=="carijudul"){
	include "modul/cari/carijudul.php";
	}
}
?>