<?php
	setlocale(LC_TIME, "pl_PL");
	echo strftime("%A").'<br>';

	$gen_start = getmicrotime();	//liczenie czasu generowania strony
	

	$dzien = 17;
	$mies = 11;
	$rok = 2016;

	if(checkdate($mies, $dzien, $rok)){
		echo 'Data jest k<br>';
	}else{
		echo 'Data NIE jest k<br>';
	}
	echo '<br>';

	echo 'time() = '.time().'<br>';
	echo 'microtime() = '.microtime().'<br>';
	function getmicrotime(){
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}
	echo 'Ładniej wyglądające: '.getmicrotime().'<br>';
	echo '<br>';

	$script_start = getmicrotime();
	for($i = 0; $i < 10000; $i++){
		$test = $i;
	}
	echo 'czas generowania skriptu: '.(getmicrotime() - $script_start).'<br>';
	echo 'data koncowa to '.date('m/d/y',getmicrotime()).'<br>';
	$dzien = 10;
	$miesiadz = 4;
	$rok = 2002;
	$godzina = 12;
	$minuta = 32;
	$sekunda = 0;
	//mktime(godzina, minuta, sekunda, miesiadz, dzien, rok)
	$ts = mktime($godzina, $minuta, $sekunda, $miesiadz, $dzien, $rok);
	echo 'data w timestamp: '.$ts.'<br>';
	echo '<br>';

	$czas_akt = time();
	$za_godz = $czas_akt + 3600;
	echo date('r',$czas_akt).'<br>';
	echo date('r',$za_godz).'<br>';
	echo '<br>';

	$day = date('d');
	$month = date('m');
	$year = date('Y');
	$month++;
	if($month >= 13){
		$month = 1;
		$year++;
	}

	echo 'teraz: '.date('r',strtotime("now")).'<br>';
	echo ' za 1 dni: '.date('r',strtotime("+1 day")).'<br>';
	echo 'za 1 weekend: '.date('r',strtotime("+1 week")).'<br>';
	echo 'za duzo: '.date('r',strtotime("+1 week 2 days 4 hours 2 secends")).'<br>';
	echo '<br>';

	$time1 = mktime(19,30,0);
	$time2 = mktime(20,0,0);
	if($time1 == $time2){
		echo 'Czasy są równe<br>';
	}else if($time1 > $time2){
		echo 'time1 jesst wiekszy<br>';
	}else{
		echo 'time2 jesst wiekszy<br>';
	}
	echo '<br>';

	$data1 = mktime(19,30,0,12,10,2001);
	$data2 = mktime(20,40,2,12,10,2001);
	$data3 = mktime(19,30,0,12,11,2000);
	echo date('r',$data1).'<br>';
	echo date('r',$data2).'<br>';
	echo date('r',$data3).'<br>';
	function sameDay($ts1, $ts2){
		if(date("Y",$ts1) != date("Y",$ts2)){
			return false;
		}
		if(date("m",$ts1) != date("m",$ts2)){
			return false;
		}
		if(date("d",$ts1) != date("d",$ts2)){
			return false;
		}
		return true;
	}
	echo 'ten sam dzen: '.sameDay($data1, $data2).'<br>';
	echo '<br>';



	echo '<br><br><br>czas generowania storny: '.(getmicrotime() - $gen_start);

?>