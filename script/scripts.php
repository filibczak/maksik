<?php
/*----------------------------------------------------------------------------------
	1. laczenie z baza danych
----------------------------------------------------------------------------------*/

/*
	1. laczenie z baza danych
	$connect = polocz_db([baza])
*/
function polacz_db($db = 'd14_kukiz_krzysztof'){
	$wynik = @new MySqli('localhost', 'd14_5cc698', '98Maselko98', $db);
	if(mysqli_connect_errno()){
		echo 'Brak polaczenia z baza, prosze wrucic puźniej<br>'.mysqli_connect_error();
		exit();
	}else{//polaczono sie
		$wynik->query("set name 'utf-8'");
		return $wynik;
	}
}


?>