<?php
include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";


$module=$_GET['module'];
$act=$_GET['act'];
$nosurat = $kode = $asal = $perihal = $intruksi = $keterangan = "";

if($module=='carikodeadmin' AND $act=='hapus' ){
	mysql_query("delete from arsip where nosurat='$_GET[id]'");
		echo "<script>alert('Data Berhasil Dihapus');window.location.href='../../media.php?module=carikodeadmin';</script>";
}

elseif($module=='carikodeadmin' AND $act=='edit'){
if (empty($_POST["nosurat"]) or empty($_POST["kode"]) or empty($_POST["asal"]) or empty($_POST["perihal"])  or empty($_POST["intruksi"])  or empty($_POST["keterangan"])) {
		echo "<script>alert('Data Kurang Lengkap!');self.history.back();</script>";
	}else{
		$tll="$_POST[tahun]-$_POST[bulan]-$_POST[hari]";
		$tgls="$_POST[tahun1]-$_POST[bulan1]-$_POST[hari1]";
	mysql_query("update arsip set 	nosurat='$_POST[nosurat]',
									kode='$_POST[kode]',
									tglmsk='$tll',
									tglslsai='$tgls',
									asal='$_POST[asal]',
									perihal='$_POST[perihal]',
									intruksi='$_POST[intruksi]',
									keterangan='$_POST[keterangan]'
							 where 	id='$_POST[id]'");
		echo "<script>alert('Data Berhasil Disimpan');window.location.href='../../media.php?module=arsip';</script>";
}}

elseif($module=='carijudul_admin' AND $act=='hapus' ){
	mysql_query("delete from arsip where nosurat='$_GET[id]'");
		echo "<script>alert('Data Berhasil Dihapus');window.location.href='../../media.php?module=carijudul_admin';</script>";
}

elseif($module=='carijudul_admin' AND $act=='edit'){
if (empty($_POST["nosurat"]) or empty($_POST["kode"]) or empty($_POST["asal"]) or empty($_POST["perihal"])  or empty($_POST["intruksi"])  or empty($_POST["keterangan"])) {
		echo "<script>alert('Data Kurang Lengkap!');self.history.back();</script>";
	}
	else{
		$tll="$_POST[tahun]-$_POST[bulan]-$_POST[hari]";
	$tgls="$_POST[tahun1]-$_POST[bulan1]-$_POST[hari1]";	
	mysql_query("update arsip set 	nosurat='$_POST[nosurat]',
									kode='$_POST[kode]',
									tglmsk='$tll',
									tglslsai='$tgls',
									asal='$_POST[asal]',
									perihal='$_POST[perihal]',
									intruksi='$_POST[intruksi]',
									keterangan='$_POST[keterangan]'
							 where 	id='$_POST[id]'");
		echo "<script>alert('Data Berhasil Disimpan');window.location.href='../../media.php?module=arsip';</script>";
}}

?>
