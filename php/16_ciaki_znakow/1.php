<?php
	$text = '  Ala ma kota	';

	echo '"'.$text.'"<br>';
	echo '<p>substr($text, -6) 6 od końca: '.substr($text, -6).'</p>';
	echo '<p>substr($text, 6) od 6 do konca: '.substr($text, 6).'</p>';
	echo '<p>substr($text, 6, 2) od 6, 2 znaki: '.substr($text, 6, 2).'</p>';
	echo '<p>substr($text, -6, 2) od końca od 6, 2 znaki: '.substr($text, -6, 2).'</p>';

	echo '<br>';
	echo '<p>strlen($text) Ile znaków: '.strlen($text).'</p>';

	echo '<br>';
	echo '<p>strtolower($aext) Wszystko na małych: '.strtolower($text).'</p>';
	echo '<p>strtoupper($text) Wszystko na duzych: '.strtoupper($text).'</p>';

	echo '<br>';
	echo '<p>ucwords($text) Każdy pierwszu wyraz z duzej: '.ucwords($text).'</p>';

	function str_garbaty($t){
		$d = strlen($t);

		for($i = 0; $i < $d; $i++){
			if($i%2==0){
				$t[$i] = strtoupper($t[$i]);
			}else{
				$t[$i] = strtolower($t[$i]);
			}
		}
		return $t;
	}

	echo '<h1>'.str_garbaty($text).'</h1>';

	$t1 = trim($text);
	echo '<p>trim($text) zabiera spacje z przd i po: '.$t1.'</p>';
	echo '<p>strlen($t1): '.strlen($t1).'</p>';

	echo '<br>';
	echo '<p>'.str_replace("a", "@", $text).'<p>';

	echo '<br>';
	echo '<p>'.strpos($text, "kota").'<p>';
	echo '<p>'.strpos($text, "a", 4).'<p>';

	echo '<br>';
	function strPostAll($t, $co){
		$gdzie = 0;
		$wynik = 0;
		while(strpos($t, $co, $gdzie) > -1){
			$gdzie = strpos($t, $co, $gdzie);
			$wynik .= $gdzie . ', ';
			$gdzie++;
		}
		return $wynik;
	}
	echo '<p>'.strPostAll($text, 'a').'<p>';
	echo '<p>md5: '.md5($text).'</p>';
	echo '<p>sha1: '.sha1($text).'</p>';
	echo '<p>crypt: '.crypt($text).'</p>';
	echo '<p>ord($text[2]): '.ord($text[2]).'</p>';
	echo '<p>chr(65): '.chr(65).'</p>';
	echo '<p>htmlspecialchars: '.htmlspecialchars('<'.$text.'>').'</p>';
	echo '<p>strip_tags: '.strip_tags($text).'</p>';
?>