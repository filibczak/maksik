<?php

function suma($a, $b){
	return $a + $b;
}

$suma = suma(5,6);
if($suma >=10){
	echo 'suma('.$suma.') jest wieksza bądź równa 10<br>';
}else{
	echo 'suma('.$suma.') jest mniejsza od 10<br>';
}

$imie = 'Tomasz';
hello($imie, 'red');
function hello($imie, $color){
	echo "<span style='color: $color'>Witaj $imie</span><br>";
}

function expres($porcje = 1, $ilosc = '500ml', $rodzaj = 'kapp(a)ucino'){
	echo "Kawa $rodzaj, zostaine nalana do $porcje kubkow do $ilosc<br>";
}
expres(3, null,'kawa');

/*===============================*/
/*funkcja refurencyjna*/

function silnia($liczba){
	if($liczba < 2){
		return 1;
	}else{
		return $liczba*silnia($liczba-1);
	}
}
echo silnia(170).'<br>';

/*===============================*/
function czy_kobita($imie){
	$last = substr($imie, -1);
	if(($last == 'a' || $last == 'A') && $imie!='Kuba' && $imie!='kuba'){
		return 'tak';
	}else{
		return 'nie';
	}
}
echo 'czy kobieta: '.czy_kobita('MAGDA').'<br>';
/*tablica w funkcji*/

function tab($tab){
	echo '<pre>';
	print_r($tab);
	echo '<pre>';
	return $tab;
}

$tab = array(1,5,8);

echo '<pre>';
print_r(tab($tab));
echo '<pre>';

?>