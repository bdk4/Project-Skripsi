<?php
$aksi="modul/cari/aksi_cari.php";
switch($_GET[act]){
	default:
echo"<form action='' method='POST'>
	<h1 class='head'>Cari Arsip</h1>
	<table class='tabelform'>
	<tr>
	<td><input class='input' name='cari' type='text' placeholder='Cari Berdasarkan Perihal Arsip'></td>&nbsp&nbsp
	<td><input type=submit value=Cari name='submit'></td>
	</tr>
	</table>";
	$input_cari = $_POST[cari]; 
	$cari = $_POST[submit];
	if($cari){
	if($input_cari != "") {
    // query mysql untuk mencari berdasarkan nama negara. .
    $sql = mysql_query("select * from arsip where perihal like '%$input_cari%'") or die (mysql_error());   
    } else {
    $sql = mysql_query("select * from arsip") or die (mysql_error());
    }
    } else {
    $sql = mysql_query("select * from arsip order by tglmsk DESC") or die (mysql_error());
    }		
 $no=1;
 echo"</br><table class='tablestyle' cellspacing='0'>
	<thead>
  <tr>
    <th>No</th>
    <th>Kode Klasifikasi</th>
    <th>Nomor Surat</th>
	<th>Tanggal Masuk</th>
	<th>Tanggal Penyelesaian</th>	
	<th>Asal Surat</th>
	<th>Perihal</th>
	<th>Intruksi</th>
	<th>Kontrol</th>
  </thead>
  </tr>";
    $cek = mysql_num_rows($sql);
   // jika data kurang dari 1
   if($cek < 1) {
     echo"<tr><td colspan='8' align='center'>Data Tidak Ditemukan</td></tr>";
  }else{
   while ($b = mysql_fetch_array($sql)){
echo" 
<tr>
  	<td>$no</td>
	<td>$b[kode]</td>
	</td>
	<td>$b[nosurat]</td>
	<td>".tgl_indo($b['tglmsk'])."</td>
	<td>".tgl_indo($b['tglslsai'])."</td>	
	<td>$b[asal]</td>
	<td>$b[perihal]</td>
	<td>$b[intruksi]</td>
  <td>
	<span><a class='tombol kontrol hvrwarna' href='?module=carijudul&act=lihat&id=$b[nosurat]'>Lihat</a></span>
	</td>
	</tr>";
	$no++;
}} echo"</table></form>";

		break;

			case"lihat":

$edit=mysql_query("select * from arsip where nosurat='$_GET[id]'");
$data=mysql_fetch_array($edit);
echo "<h1 class='head'>Lihat Data Arsip</h1>
<input type=button class=tombol value=Kembali onclick=self.history.back()>
</br>
</br>
	<form action='' method='post'>
	<table class='tablestyle1' cellspacing='0'>
	<th>Kode Klasifikasi</th>
	<th>No Surat</th>
	<th>Tanggal Masuk</th>
	<th>Tanggal Penyelesaian</th>
	<th>Asal</th>
	<th>Perihal</th>
	<th>Intruksi</th>
	<th>Keterangan</th>
	<tr>
	<td>$data[kode]</td>
	<td>$data[nosurat]</td>
	<td>".tgl_indo($data['tglmsk'])."</td>
	<td>".tgl_indo($data['tglslsai'])."</td>
	<td>$data[asal]</td>
	<td>$data[perihal]</td>
	<td>$data[intruksi]</td>
	<td>$data[keterangan]</td></tr>";
	if($data[file]==""){
		echo "";
	} else {
		echo"
	<tr><td>File</td>
	<td colspan='7' align='center'><img src='file_arsip/medium_$data[file]'/></br></br>
	<a class=tombol href='file_arsip/$data[file]' target =_blank>Lihat File</a></td>
	</tr>";}
	echo"
	</table>
	</form>";

		break;
	}
	?>