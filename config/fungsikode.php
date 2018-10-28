<?php
function kode($kode){
			$kode = $_POST[kode];
			$ket = getKode(substr($kode))
			return $kode.' '.$ket.' ';		 
	}
	function getKode($kod){
				switch ($kod){
					case 000: 
						return "Umum";
						break;
					case 100:
						return "Pemerintahan";
						break;
					case 200:
						return "Politik";
						break;
					}
				}
?>