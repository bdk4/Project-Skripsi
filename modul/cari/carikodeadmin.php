<?php 
$aksi="modul/cari/aksi_cari.php";

switch($_GET[act]){
	default:
echo "<form action='' method='POST'>
	<h1 class='head'>Cari Arsip</h1>
	<table class='tabelform'>
	<tr>
	<td><select name='kode'>
	<option value=''>Pilih</option>";
	$tampil=mysql_query("select * from kodearsip");
	while($b=mysql_fetch_array($tampil)){
	echo "<option value='$b[kode]'>$b[kode] $b[keterangan]</option>";
	}
	echo "</select>&nbsp&nbsp</td>
	<td><input class=tombol type=submit value=Cari></td>
	</tr>
	</table>";
	if(isset($_POST[kode])){
 $sql = "select * from arsip WHERE kode = ".$_POST[kode];
 $q = mysql_query($sql);
 $no=1;
 echo"
	</br><table class='tablestyle' cellspacing='0'>
	<tr>
  <thead>
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
  $cek = mysql_num_rows($q);
   // jika data kurang dari 1
   if($cek < 1) {
     echo"<tr><td colspan='8' align='center'>Data Tidak Ditemukan</td></tr>";
  }else{
  	while ($b = mysql_fetch_array($q)){
echo"
<tr>
  	<td>$no</td>
	<td>$b[kode]</td>
	<td>$b[nosurat]</td>
	<td>".tgl_indo($b['tglmsk'])."</td>
	<td>".tgl_indo($b['tglmsk'])."</td>
	<td>$b[asal]</td>
	<td>$b[perihal]</td>
	<td>$b[intruksi]</td>
	<td>
	<span><a class='tombol kontrol hvrwarna' href='?module=carikodeadmin&act=lihat&id=$b[nosurat]'>Lihat</a></span><br>
	<span><a class='tombol kontrol hvrwarna' href='?module=carikodeadmin&act=edit&id=$b[nosurat]'>Edit</a></span><br>
	<span><a class='tombol kontrol hvrwarna'href=\"$aksi?module=carikodeadmin&act=hapus&id=$b[nosurat]\" onClick=\"return confirm('Yakin mau menghapusnya?')\">Hapus</a></span><br>
	</td>
  </tr>";
  $no++;
}
}
}
echo"</table></form>";
break;

case "edit":
$edit=mysql_query("select * from arsip where nosurat='$_GET[id]'");
$data=mysql_fetch_array($edit);
echo "<h1 class='head'>Edit Data Arsip</h1>
	<form action='$aksi?module=carikodeadmin&act=edit' method='post'>
	<table class='tabelform'>
	<tr>
	<td><input type='hidden' name='id' value='$data[id]'>
	Kode Klasifikasi</td><td>:</td><td><select name='kode'>
	<option value=''>Pilih</option>";
	$tampil=mysql_query("select * from kodearsip");
	while($b=mysql_fetch_array($tampil)){
	echo "<option value='$b[kode]'>$b[kode] $b[keterangan]</option>";
	}
	echo "</select></td>
	</td>
	</tr>
	<tr>
	<td>Nomor Surat</td><td>:</td><td><input class='input' name='nosurat' type='text' value='$data[nosurat]'></td>
	</tr>
	<tr>
	<td>Tanggal Surat</td><td>:</td><td><select name='hari'>
                <option value='none' selected='selected'>Tanggal</option>";
			for($h=1; $h<=31; $h++) 
			{ 
				echo"<option value=",$h,">",$h,"</option>";
			} 
	echo"</select>
	<select name='bulan'>
            	<option value='none' selected='selected'>Bulan</option>
				<option value='1'>Januari</option>
				<option value='2'>Februari</option>
				<option value='3'>Maret</option>
				<option value='4'>April</option>
				<option value='5'>Mei</option>
				<option value='6'>Juni</option>
				<option value='7'>Juli</option>
				<option value='8'>Agustus</option>
				<option value='9'>September</option>
				<option value='10'>Oktober</option>
				<option value='11'>November</option>
				<option value='12'>Desember</option>
			</select>
	<select name='tahun'>
            <option value='none' selected='selected'>Tahun</option>";
			$now =  date("Y");
			$skrg = 2000;
			for($l=$skrg; $l<=$now; $l++)
			{
				echo"<option value=",$l,">",$l,"</option>";
			}	
	echo "</select>
	<tr>
	<td>Tanggal</br>Penyelesaian&nbsp&nbsp&nbsp&nbsp</td><td>:</td><td><select name='hari1'>
                <option value='none' selected='selected'>Tanggal</option>";
			for($h=1; $h<=31; $h++) 
			{ 
				echo"<option value=",$h,">",$h,"</option>";
			}
	echo "</select>
	<select name='bulan1'>
            	<option value='none' selected='selected'>Bulan</option>
				<option value='1'>Januari</option>
				<option value='2'>Februari</option>
				<option value='3'>Maret</option>
				<option value='4'>April</option>
				<option value='5'>Mei</option>
				<option value='6'>Juni</option>
				<option value='7'>Juli</option>
				<option value='8'>Agustus</option>
				<option value='9'>September</option>
				<option value='10'>Oktober</option>
				<option value='11'>November</option>
				<option value='12'>Desember</option>
			</select>
	<select name='tahun1'>
            <option value='none' selected='selected'>Tahun</option>";
			$now =  date("Y");
			$skrg = 2000;
			for($l=$skrg; $l<=$now; $l++)
			{
				echo"<option value=",$l,">",$l,"</option>";
			}
		echo "</select>	
	</td>
	</tr>
	<tr>
	<td>Asal Surat</td><td>:</td><td><input class='input' name='asal' type='text' value='$data[asal]'></td>
	</tr>
	<tr>
	<td>Perihal</td><td>:</td><td><input class='input' name='perihal' type='text' value='$data[perihal]'></td>
	</tr>
	<tr>
	<td>Intruksi Pimpinan</td><td>:</td><td><input class='input' name='intruksi' type='text' value='$data[intruksi]'></td>
	</tr>
	<tr>
	<td>Keterangan</td><td>:</td><td><input class='input' name='keterangan' type='text' value='$data[keterangan]'></td>
	</tr>
	<tr>
	<td>File</td><td>:</td><td><input class='input' name='file' type='file'></td>
	</tr>
	<tr>
	<td></td><td></td><td><input type=submit value=Simpan>
	<input type=button value=Batal onclick=window.location.href='media.php?module=carikodeadmin'>
	</td>
	</tr>
	</table>
	</form>";
	break;

	case"lihat":

$edit=mysql_query("select * from arsip where nosurat='$_GET[id]'");
$data=mysql_fetch_array($edit);
echo "<h1 class='head'>Lihat Data Arsip</h1>
	<input type=button class=tombol value=Kembali onclick=window.location.href='media.php?module=carikodeadmin'>
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

case "hapus":

break;
}
?>