<?php
$bPassJest = false;
$nowePasy = $_POST['data'];
$nowePasy = explode('||', $nowePasy);

$file='pasy.txt';
if(is_readable($file)){
	$pasy = file_get_contents($file);
	$pasy = explode('|||', $pasy);
	array_pop($pasy);
	$ile = count($pasy);
	for($i = 0; $i < $ile; $i++){
		$pasy[$i] = explode('||', $pasy[$i]);
		if($nowePasy[0] == $pasy[$i][0]){
			$bPassJest = true;
			break;
		}
	}
}

if($bPassJest){
	echo 'Login już istnieje';
}else{
	if(is_writable($file) && $handle = fopen($file, 'a')){
		if(flock($handle, 2)){
			fwrite($handle, $nowePasy[0].'||'.$nowePasy[1].'|||');
			echo 'Dodano uzytkownika';
			flock($handle, 3);
		}
		fclose($handle);
	}
}

?>