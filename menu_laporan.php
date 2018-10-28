<?php 
echo "<div>
<h1 class='head'>Laporan Arsip</h1>
<form action='laporan.php' method='POST' target='_blank'>
<table class='tabelform'>
	<tr>
	<td><select name='bulan'>
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
	<td><input class=tombol type=submit name=submit value=Tampilkan></td></tr></form></table>
</div>";
?>