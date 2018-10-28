<?php

$aksi="modul/user/aksiuser.php";

switch($_GET[act]){
	default:
	$tampil=mysql_query("select * from user order by nama DESC");
echo"<h2 class='head'>DATA USER</h2>
<div>
	<input type=button class=tombol value='Tambah User' onclick=\"window.location.href='?module=user&act=input';\">
	</div></br>
<table class='tablestyle' cellspacing='0'>
	<thead>
	<th> No </th>
    <th> Nama </th>
    <th> Bagian </th>
    <th> User ID </th>
    <th> Kontrol </th>
    </tr></thead>";
    $tampil = mysql_query("select * from user");
	$no=1;
	while($b=mysql_fetch_array($tampil)){
echo"
	<tr><td>$no</td>
	<td>$b[nama]</td>
	<td>$b[bagian]</td>
	<td>$b[userid]</td>
	<td>
	<span><a class='tombol kontrol hvrwarna' href='?module=user&act=edit&id=$b[userid]'>Edit</a></span>
	<span><a class='tombol kontrol hvrwarna' href=\"$aksi?module=user&act=hapus&id=$b[userid]\" onClick=\"return confirm('Yakin mau menghapusnya?')\">Hapus</a></span>
	</td>
	</tr>";
	$no++;
}
echo"
	</table>";

	break;

	case "input";
echo"<h2 class='head'>DATA USER</h2>
	<form action='$aksi?module=user&act=input' method='post'>
	<table class='tabelform'>
	<tr>
	<td>Nama Pegawai</td><td>:</td><td><input name='nama' type='text'></td>
	</tr>
	<tr>
	<td>Bagian</td><td>:</td><td>
	<select name='bagian'>
	<option value=''>Pilih Bagian</option>";
	$tampil=mysql_query("select * from bagian");
	while($b=mysql_fetch_array($tampil)){
	echo "<option value='$b[Bagian]'>$b[Bagian]</option>";
	}
	echo "</select></td>
	</tr>
	<tr>
	<td>User ID</td><td>:</td><td><input class='input' name='userid' type='text'></td>
	</tr>
	<tr>
	<td>Password ID</td><td>:</td><td><input class='input' name='psswrd' type='Password'></td>
	</tr>
	<tr>
	<td>Level User</td><td>:</td><td>
	<select name='level'>
	<option value=''>Pilih</option>";
	$tampil=mysql_query("select * from level");
	while($b=mysql_fetch_array($tampil)){
	echo "<option value='$b[lvl]'>$b[lvl] $b[keterangan]</option>";
	}
	echo "</select></td>
	</select></td>
	</tr>	
	<tr>
	<td></td><td></td>
	<td><input type=submit value=Simpan><input type=button value=Batal onclick=self.history.back()></td>
	</tr>
	</table>
	</form>";

	break;

	case "edit";
	$id = $_GET['id'];
	$edit=mysql_query("select * from user where userid='$id'");
	$data=mysql_fetch_array($edit);
	echo"<h2 class='head'>DATA USER</h2>
	<form action='$aksi?module=user&act=edit' method='post'>
	<table class='tabelform'>
	<tr>
	<td><input type='hidden' name='id' value='$data[id]'>
	Nama Pegawai</td><td>:</td><td><input name='nama' type='text' value='$data[nama]'></td>
	</tr>
	<tr>
	<td>Bagian</td><td>:</td><td>
	<select name='bagian'>
	<option value=''>Pilih Bagian</option>";
	$tampil=mysql_query("select * from bagian");
	while($b=mysql_fetch_array($tampil)){
	echo "<option value='$b[Bagian]'>$b[Bagian]</option>";
	}
	echo "</select></td>
	</tr>
	<tr>
	<td>User ID</td><td>:</td><td><input class='input' name='userid' type='text' value='$data[userid]'></td>
	</tr>
	<tr>
	<td>Level User</td><td>:</td><td>
	<select name='level'>
	<option value=''>Pilih</option>";
	$tampil=mysql_query("select * from level");
	while($b=mysql_fetch_array($tampil)){
	echo "<option value='$b[lvl]'>$b[lvl] $b[keterangan]</option>";
	}
	echo "</select></td>
	</select></td>
	</tr>	
	<tr>
	<td></td><td></td>
	<td><input type=submit value=Update><input type=button value=Batal onclick=self.history.back()></td>
	</tr>
	</table>
	</form>";

	break;

	case "hapus":

	break;
}
?>