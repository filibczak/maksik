<?php 
echo '<pre>';

//odczytuje dane od urzytkownika
$uData = $_POST['data'];
$uData = explode('||', $uData);

$newContent = '';

$direction = 'goscie.txt';

//odczytuje plik
if(is_readable($direction)){
	$content = file_get_contents($direction);
	$content = explode('&&', $content);
	array_pop($content);
	$ile = count($content);
}

//zapisuje plik bez teko do usuniecia
for($i = 0; $i < $ile; $i++){
	$content[$i] = explode('||', $content[$i]);
	if(	$content[$i][0] == $uData[0]	&&
		$content[$i][1] == $uData[1]	&&
		$content[$i][3] == $uData[3]	){

	}else{
		$newContent .= $content[$i][0].'||'.$content[$i][1].'||'.$content[$i][2].'||'.$content[$i][3].'&&';
	}
}


if(is_writable($direction) && $handle = fopen($direction, 'w')){
	if(flock($handle, 2)){
		fwrite($handle, $newContent);
		flock($handle, 3);
	}
	fclose($handle);
}



echo '</pre>';
?>