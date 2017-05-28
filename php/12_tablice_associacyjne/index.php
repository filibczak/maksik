<?php
	$cena['zapiekanka'] = 2;
	$cena['jogurt'] = 4;
	$cena['wunsz_zezcny'] = 99;
	$cena['zycie'] = 0;
	$cena['przemki'] = -999;
	echo '<pre>';
	print_r($cena);
	echo '<pre>';

	$login['Qkiz'] = '1234';
	$login['tt'] = '1234';
	$login['Qkkkkiz'] = '1234';

	foreach ($login as $key => $value) {
		echo $key.' => '.$value.'<br>';
	}
	asort($cena);//sortuje według wartosci
	arsort($cena);//to samo na odwrut
	ksort($cena);//sortuje według klucza
	krsort($cena);//to samo na odwrut

	echo '<br>-------------------------------<br>';

	$tablica = array(
		'osoba1'=>array('imie'=>'przemki','aka'=>'zero','wiek'=>17),
		'osoba2'=>array('imie'=>'Kristofer','aka'=>'Qkiz','wiek'=>18),
		'osoba3'=>array('imie'=>'kevin','aka'=>'gucik','wiek'=>18)
	);
	echo '<pre>';
	print_r($tablica);
	echo '<pre>';
?>