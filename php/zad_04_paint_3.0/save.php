<?php
if(
	isset($_POST['html'])	&&
	isset($_POST['which']) &&
	(int)$_POST['which'] >= 0 &&
	(int)$_POST['which'] <= 4
){
/*	wszystko jak na razie k	*/	
	$html = $_POST['html'];
	$which = (int)$_POST['which'];
	$xml = simplexml_load_file('obrazy.xml');
	$xml->obraz[$which] = $html;
	$xml->asXML('obrazy.xml');
	
}else{
/*	złe dane wysłane lub brak danych	*/	
	echo 'error';
}
?>