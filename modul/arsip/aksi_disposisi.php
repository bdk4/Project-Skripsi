<?php
include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
include "../../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];



if($module=='disposisi' AND $act=='input' ){
	$indx="$_POST[kode]/$_POST[nmrsurat]/$_POST[kodekec]";
	$sql=mysql_num_rows(mysql_query("select * from disposisi where indeks='$indx'"));
	if ($sql > 0) {
		echo "<script>alert('data sudah ada!');self.history.back();</script>";
	}else{
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['jpg'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000,999);
  $nama_file_unik = $acak.$nama_file;
  	if (!empty($lokasi_file)){
		$tll="$_POST[tahun]-$_POST[bulan]-$_POST[hari]";
			Uploadfoto($nama_file_unik);
	mysql_query("insert into disposisi set 	indeks='$indx',
											tglslsai='$tll',
											perihal='$_POST[hal]',
											tglmsk='$_POST[tglmsk]',
											asal='$_POST[asal]',
											file='$nama_file_unik'");
		echo "<script>alert('Data Berhasil Disimpan');window.location.href='../../media.php?module=disposisi';</script>";
}else{
		$tll="$_POST[tahun]-$_POST[bulan]-$_POST[hari]";
	mysql_query("insert into disposisi set nosurat='$_POST[nosurat]', 
									kode='$_POST[kode]',
									tglmsk='$tll',
									asal='$_POST[asal]',
									perihal='$_POST[perihal]',
									intruksi='$_POST[intruksi]',
									keterangan='$_POST[keterangan]'");
		echo "<script>alert('sukses !!');window.location.href='../../media.php?module=arsip';</script>";
	}
}}

elseif($module=='disposisi' AND $act=='edit'){
		$tll="$_POST[tahun]-$_POST[bulan]-$_POST[hari]";
	mysql_query("update disposisi set 		indeks='$_POST[indx]',
											tglslsai='$tll',
											perihal='$_POST[hal]',
											tglmsk='$_POST[tglmsk]',
											asal='$_POST[asal]'
									 where 	id='$_POST[id]'");
		echo "<script>alert('Data Berhasil Disimpan');window.location.href='../../media.php?module=disposisi';</script>";
}

elseif($module=='disposisi' AND $act=='hapus' ){
$cari=mysql_query("select * from disposisi where indeks='$_GET[id]'");
$dt=mysql_fetch_array($cari);
$gmbr=$dt['file'];
$tmpfile = "../../file_arsip/$gmbr";
$tmpfile2 = "../../file_arsip/medium_$gmbr";
if($gmbr==""){
mysql_query("delete from disposisi where indeks='$_GET[id]'");
		echo "<script>alert('Data Berhasil Dihapus');window.location.href='../../media.php?module=disposisi';</script>";
}else{
	unlink ($tmpfile);
	unlink ($tmpfile2);
	mysql_query("delete from disposisi where indeks='$_GET[id]'");
		echo "<script>alert('Data Berhasil Dihapus');window.location.href='../../media.php?module=disposisi';</script>";
}}
?>