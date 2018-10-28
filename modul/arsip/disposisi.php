<?php
$result = mysql_query("select * from arsip");
$jsArray = "var nosurat = new Array();\n"; 
$aksi='modul/arsip/aksi_disposisi.php';


switch($_GET[act]){
	default:
	echo"<form action='' method='POST'>
	<h1 class='head'>Data Disposisi</h1>
	<a class='tombol hvrwarna' href='?module=disposisi&act=input'>Tambah Data Disposisi</a></br>";
	$input_cari = $_POST[cari]; 
	$cari = $_POST[submit];
	if($cari){
	if($input_cari != "") {
    // query mysql untuk mencari berdasarkan nama negara. .
    $sql = mysql_query("select * from disposisi where index like '%$input_cari%'") or die (mysql_error());   
    } else {
    $sql = mysql_query("select * from disposisi") or die (mysql_error());
    }
    } else {
    $sql = mysql_query("select * from disposisi order by tglmsk DESC") or die (mysql_error());
    }		
 $no=1;
 echo"</br><table class='tabel' border='1'>
	<thead>
  <tr>
    <th>No</th>
    <th>Index</th>
    <th>Tanggal Penyelesaian</th>
    <th>Perihal</th>
	<th>Tanggal Masuk</th>
	<th>Asal Surat</th>
	<th>Kontrol</th>
  </thead>
  </tr>";
    $cek = mysql_num_rows($sql);
   // jika data kurang dari 1
   if($cek < 1) {
     echo"<tr><td colspan='8' align='center'>Data Tidak Ada</td></tr>";
  }else{
   while ($b = mysql_fetch_array($sql)){
echo" 
<tr>
  	<td>$no</td>
	<td>$b[indeks]</td>
	<td>".tgl_indo($b['tglslsai'])."</td>
	<td>$b[perihal]</td>
	<td>".tgl_indo($b['tglmsk'])."</td>
	<td>$b[asal]</td>
	<td  align='center'>
	<span><a class='tombol kontrol hvrwarna' href='?module=disposisi&act=edit&id=$b[indeks]'>Edit</a></span>
	<span><a class='tombol kontrol hvrwarna'href=\"$aksi?module=disposisi&act=hapus&id=$b[indeks]\" onClick=\"return confirm('Yakin mau menghapusnya?')\">Hapus</a></span></td>
	</tr>";
	$no++;
}} echo"</table></form>";

		break;

	case "input": 
echo "<h2 class='head'>Tambah Data Disposisi</h2>
	<form action='$aksi?module=disposisi&act=input' method='post'>
	<table class='tabelform'>
	<tr>
	<td>No Surat&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
	<td>:</td><td><select name='nmrsurat' onchange='changeValue(this.value)''>
	<option>Pilih</option>";
	$tampil=mysql_query("select * from arsip");
	while ($row = mysql_fetch_array($result)) {  
    echo '<option value="' . $row['nosurat'] . '">' . $row['nosurat'] . '</option>';  
    $jsArray .= "nosurat['" . $row['nosurat'] . "'] = 
    {kode:'" . addslashes($row['kode']) . "',
    asal:'".addslashes($row['asal'])."',
    tglmsk:'".addslashes($row['tglmsk'])."',
    hal:'".addslashes($row['perihal'])."'};\n";  
}  
echo '</select></table>
	<table class="tabelform">
	<tr>
	<td>Kode Klasifikasi</td><td>:</td><td><input class="input" name="kode"  id="kode"  type="text"></td>
	</tr>
	<tr>
	<td>Kode</br> Kecamatan</td><td>:</td><td><input class="input" name="kodekec"  id="kodekec" type="text" value="kec.pkh"></td>
	</tr>
	<tr>
	<td>Perihal</td><td>:</td><td><input class="input" name="hal" id="hal"  type="text"></td>
	</tr>
	<tr>
	<td>Tanggal Masuk</td><td>:</td><td><input class="input" name="tglmsk" id="tglmsk"  type="text"></td>
	</tr>
	<tr>
	<td>Asal</td><td>:</td><td><input class="input" name="asal" id="asal"  type="text"></td>
	</tr></table>';
	?>
<script type="text/javascript">  
<?php echo $jsArray; ?>
function changeValue(id){
document.getElementById('kode').value = nosurat[id].kode;
document.getElementById('asal').value = nosurat[id].asal;
document.getElementById('tglmsk').value = nosurat[id].tglmsk;
document.getElementById('hal').value = nosurat[id].hal;
};
</script>	
<?php
	echo"<table class='tabelform'>
	<tr>
	<td>Tanggal</br>Penyelesaian&nbsp&nbsp&nbsp&nbsp</td><td>:</td><td><select name='hari'>
                <option value='none' selected='selected'>Tanggal</option>";
			for($h=1; $h<=31; $h++) 
			{ 
				echo"<option value=",$h,">",$h,"</option>";
			}
	echo "</select>
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
	</td>
	</tr>
	<tr>
	<td>File</td><td>:</td><td><input class='input' name='fupload' type='file' accept='image/*'></td>
	</tr>
	<tr>
	<td></td><td></td><td><input type=submit value=Simpan>
	<input type=button value=Batal onclick=self.history.back()>
	</td>
	</tr>	
	</table></form>";
	break;

case "edit":
$edit=mysql_query("select * from disposisi where indeks='$_GET[id]'");
$data=mysql_fetch_array($edit);
echo "<h1 class='head'>Edit Data Disposisi</h1>
	<form action='$aksi?module=disposisi&act=edit' method='post'>
	<table class='tabelform'>
	<tr>
	<td><input type='hidden' name='id' value='$data[id]'>
	Indeks</td><td>:</td><td><input class='input' type='text' name='indx' value='$data[indeks]'></td>
	</td>
	</tr>
	<tr>
	<td>Perihal</td><td>:</td><td><input class='input' type='text' name='hal' value='$data[perihal]'></td>
	</tr>
	<tr>
	<td>Tanggal Masuk</td><td>:</td><td><input class='input' type='text' name='tglmsk' value='$data[tglmsk]'></td>
	</tr>
	<tr>
	<td>Asal</td><td>:</td><td><input class='input' type='text' name='asal' value='$data[asal]'></td>
	</tr>		
	<tr>
	<td>Tanggal Penyelesaian</td><td>:</td><td><select name='hari'>
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
	<td></td><td></td><td><input type=submit value=Simpan>
	<input type=button value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table>
	</form>";

	break;

	case"lihat";

	$edit=mysql_query("select * from disposisi where indeks='$_GET[id]'");
$data=mysql_fetch_array($edit);
echo "<h1 class='head'>Edit Data Disposisi</h1>
<input type=button class=tombol value=Kembali onclick=self.history.back()></br>
	<form action='$aksi?module=disposisi&act=edit' method='post'>
	<table class='tabelform'>
	<tr>
	<td><input type='hidden' name='id' value='$data[id]'>
	Indeks</td><td>:</td><td><input class='input' type='text' name='indx' disabled value='$data[indeks]'></td>
	</td>
	</tr>
	<tr>
	<td>Perihal</td><td>:</td><td><input class='input' type='text' name='hal' disabled value='$data[perihal]'></td>
	</tr>
	<tr>
	<td>Tanggal Masuk</td><td>:</td><td><input class='input' type='text' name='tglmsk' disabled value='".tgl_indo($data['tglmsk'])."'></td>
	</tr>
	<tr>
	<td>Asal</td><td>:</td><td><input class='input' type='text' name='asal' disabled value='$data[asal]'></td>
	</tr>		
	<tr>
	<td>Tanggal Penyelesaian</td><td>:</td><td><input class='input' type='text' name='asal' disabled disabled value='".tgl_indo($data['tglslsai'])."'>
	</td></tr>";
		if($data[file]==""){
		echo "<tr></tr>";
	} else {
		echo"
	<tr>
	<td>File</td><td>:</td>
	</tr>
	<tr><td></td><td></td>
	<td><img src='file_arsip/medium_$data[file]'/></br></br>
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