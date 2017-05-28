<?php
/*
$dane = explode('||', $_POST['dPOST']);
foreach ($dane as $value) {
	echo $value.'<br>';
}
*/
$dane = $_POST['dPOST'];
if(isset($dane)){
	$where = 'goscie.txt';
	if(is_writable($where) && $file = fopen($where, 'a+')){
		if(flock($file, 2)){
			fwrite($file, $dane.'&&');
		}else
			echo 'nie weszło pliku<br>';
	}else
		echo 'Nie otwarto pliku<br>';
}


?>