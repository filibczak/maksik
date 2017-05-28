<?php
	
	$kolory = array('red','green','blue','yellow');

	$los = rand(0,count($kolory)-1);
	echo 'wylosowano kolor '.$kolory[$los].'<br><br>';

	array_shift($kolory);	//ucina z pocatku
	array_pop($kolory);	//ucina z konca
	array_push($kolory, 12); //dodaje po ostatnie miejsce
	echo '<pre>';
	var_dump($kolory);
	echo '</pre>';
	shuffle($kolory);	//miesza tablice
	echo '<pre>';
	var_dump($kolory);
	echo '</pre>';
	
	if(in_array('pink', $kolory)){ //sprawdza czy jest w tablicy
		echo 'true<br>';
	}else{
		echo 'false<br>';
	}

	$wejscie = array('red','green','blue','red');
	$wynik = array_unique($wejscie);	//powtarza tablice bez tublikatow
	echo '<pre>';
	var_dump($wynik);
	echo '</pre>';

	for($i = 0; $i < 100; $i++){
		$losy = [];
		for($j = 0; $j < 6;){
			$los = rand(1,49);
			if(!in_array($los, $losy)){
				$losy[] = $los;
				$j++;
			}
		}
		sort($losy);
		$t = implode(', ', $losy);
		echo $t.'<br>';
	}

?>