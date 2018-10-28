<?php
include "../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];
$nama = $bagian = $userid = $psswrd = $level = "";


if($module=='user' AND $act=='input'){
	$sql=mysql_query("select * from user where userid='$_POST[userid]'");
$cekdata=mysql_num_rows($sql);
	if (empty($_POST["nama"]) or empty($_POST["bagian"]) or empty($_POST["userid"]) or empty($_POST["psswrd"]) or empty($_POST["level"])) {
		echo "<script>alert('Data User Kurang Lengkap!');self.history.back();</script>";
	}
	elseif ($cekdata > 0) {
		echo "<script>alert('Data User Sudah Ada!');self.history.back();</script>";
	}else{
mysql_query("insert into user set userid='$_POST[userid]', 
									passid='$_POST[psswrd]', 
									nama='$_POST[nama]',
									bagian='$_POST[bagian]', 
									lvl='$_POST[level]'");
		echo "<script>alert('Data User Berhasil Disimpan');window.location.href='../../media.php?module=user';</script>";
}}
elseif($module=='user' AND $act=='edit'){
	if (empty($_POST["nama"]) or empty($_POST["bagian"]) or empty($_POST["userid"]) or  empty($_POST["level"])) {
		echo "<script>alert('Data Kurang Lengkap!');self.history.back();</script>";
	}
else{
	mysql_query("update user set 	userid='$_POST[userid]',
									nama='$_POST[nama]',
									bagian='$_POST[bagian]',
									lvl='$_POST[level]'
							 where 	id='$_POST[id]'");
		echo "<script>alert('Data User Berhasil Diubah');window.location.href='../../media.php?module=user';</script>";
}}
elseif($module=='user' AND $act=='hapus' ){
	mysql_query("delete from user where userid='$_GET[id]'");
		echo "<script>alert('Data User Berhasil Dihapus');window.location.href='../../media.php?module=user';</script>";
}
?>