<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LAPORAN DATA ARSIP</title>
<link rel="stylesheet" href="css/print.css" type="text/css"  />
</head>
<style>
@media print {
input.noPrint { display: none; }
}
</style>
<body class="body">
<div id="wrapper">
<?php
include "config/koneksi.php";
include "config/fungsi_indotgl.php";
$nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                      "Juni", "Juli", "Agustus", "September", 
                      "Oktober", "November", "Desember");
$bul=$_POST['bulan'];
$bull= ($nama_bln[$bul]);
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$tampil = "select * from arsip where Month(tglmsk)='$bulan' and Year(tglmsk) = '$tahun'";
$sql=mysql_query($tampil);
$cek=mysql_num_rows($sql);
if($cek>0){
	echo "
	<form action=pdf.php><h1><img src='images/logo.png' width='80' height='80' align='left'><div style='text-align:center;font-size:25px;'>PEMERINTAH KABUPATEN TANGERANG</br>
KECAMATAN PAKUHAJI</div></h1></br>
<HR WIDTH=100% SIZE=3 NOSHADE>
<h4>Laporan Bulan $bull Tahun $tahun</h4>
	<table class='tabel' cellspacing='0' border='0'>
	<thead align='center'>
  <tr>
	<th rowspan='2'>No</th>
    <th rowspan='2'>Kode Klasifikasi</th>
	<th rowspan='2'>No Surat</th>
    <th rowspan='2'>Asal</th>
	<th rowspan='2'>Perihal</th>
	<th rowspan='2'>Tanggal Masuk</th>
	<th rowspan='2'>Tanggal Penyelesaian</th>
  </tr>
  </tr>
  </thead>";
  $no=1;
    while ($b = mysql_fetch_array($sql)){
echo" 
<tr>
  	<td>$no</td>
	<td>$b[kode]</td>
	<td>$b[nosurat]</td>
	<td>$b[asal]</td>
	<td>$b[perihal]</td>
		<td>".tgl_indo($b['tglmsk'])."</td>
	<td>".tgl_indo($b['tglslsai'])."</td>	
  </tr>";
  $no++;
  }
echo "  
</table></form>
	";
	?>
	<div style="text-align:center;padding:20px;">
	<input class="noPrint" type="button" value="Cetak Halaman" onclick="window.print()">
	</div>
<?php 
} else {
	echo "<h2><div style='text-align:center;font-size:25px;'>Data Tidak Ditemukan</div></h2>";
}
?>
</div>
</body>
</html>
