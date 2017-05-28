<?php
function polacz_db(){
	$wynik = @new MySqli('localhost', 'd14_5cc698', '98Maselko98', 'd14_kukiz_krzysztof');
	if(mysqli_connect_errno()){
		echo 'Brak polaczenia z baza, prosze wrucic puźniej';
	}else{//polaczono sie
		$wynik->query("set name 'utf-8'");
		echo 'Połączono z bazą';
		return $wynik;
	}
}
?>