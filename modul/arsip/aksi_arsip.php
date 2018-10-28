<?php
include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
include "../../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];
$kode = $nosurat  = $asal = $perihal = $intruksi = $keterangan = "";



if($module=='arsip' AND $act=='input' ){
	$sql=mysql_query("select * from arsip where nosurat='$_POST[nosurat]'");
	$cekdata=mysql_num_rows($sql);
if (empty($_POST["nosurat"]) or empty($_POST["kode"]) or empty($_POST["asal"]) or empty($_POST["perihal"])  or empty($_POST["intruksi"])  or empty($_POST["keterangan"])) {
		echo "<script>alert('Data Arsip Kurang  Lengkap!');self.history.back();</script>";
	}
	elseif ($cekdata > 0) {
		echo "<script>alert('Data Arsip Sudah Ada!');self.history.back();</script>";
	}
	else{
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000,999);
  $nama_file_unik = $acak.$nama_file;
  	if (!empty($lokasi_file)){  
	$tll="$_POST[tahun]-$_POST[bulan]-$_POST[hari]";
	$tgls="$_POST[tahun1]-$_POST[bulan1]-$_POST[hari1]";
	Uploadfoto($nama_file_unik);
	mysql_query("insert into arsip set nosurat='$_POST[nosurat]', 
									kode='$_POST[kode]',
									tglmsk='$tll',
									tglslsai='$tgls',
									asal='$_POST[asal]',
									perihal='$_POST[perihal]',
									intruksi='$_POST[intruksi]',
									keterangan='$_POST[keterangan]',
									file='$nama_file_unik'");
		echo "<script>alert('Data Arsip Berhasil Ditambahkan');window.location.href='../../media.php?module=arsip';</script>";
	}else{
		$tll="$_POST[tahun]-$_POST[bulan]-$_POST[hari]";
		$tgls="$_POST[tahun1]-$_POST[bulan1]-$_POST[hari1]";
	mysql_query("insert into arsip set nosurat='$_POST[nosurat]', 
									kode='$_POST[kode]',
									tglmsk='$tll',
									tglslsai='$tgls',
									asal='$_POST[asal]',
									perihal='$_POST[perihal]',
									intruksi='$_POST[intruksi]',
									keterangan='$_POST[keterangan]'");
		echo "<script>alert('Data Arsip Berhasil Ditambahkan');window.location.href='../../media.php?module=arsip';</script>";
	}
}}
elseif($module=='arsip' AND $act=='hapus' ){
$cari=mysql_query("select * from arsip where nosurat='$_GET[id]'");
$dt=mysql_fetch_array($cari);
$gmbr=$dt['file'];
$tmpfile = "../../file_arsip/$gmbr";
$tmpfile2 = "../../file_arsip/medium_$gmbr";
if($gmbr==""){
mysql_query("delete from arsip where nosurat='$_GET[id]'");
		echo "<script>alert('Data Berhasil Dihapus');window.location.href='../../media.php?module=arsip';</script>";
}else{
	unlink ($tmpfile);
	unlink ($tmpfile2);
	mysql_query("delete from arsip where nosurat='$_GET[id]'");
		echo "<script>alert('Data Berhasil Dihapus');window.location.href='../../media.php?module=arsip';</script>";
}}

elseif($module=='arsip' AND $act=='edit'){
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
		echo "<script>alert('Data Berhasil Diubah');window.location.href='../../media.php?module=arsip';</script>";
}}

?>