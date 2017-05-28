<?php

	if(isset($_GET['ip'])){
		$ip = $_GET['ip'];
	}else{
		$ip = $_SERVER['REMOTE_ADDR'];
	}

	$ip = (string)$ip;
	$ip_leng = strlen($ip);

	$poz1 = strpos($ip, '.', 0);	//na kturym miejscu kropka od ip
	$octet1 = substr($ip, 0, $poz1);//daje octed do zmiiennej

	$poz2 = strpos($ip, '.', $poz1+1);	//na kturym miejscu kropka od ip
	$octet2 = substr($ip, $poz1+1, $poz2-$poz1-1);//daje octed do zmiiennej

	$poz3 = strpos($ip, '.', $poz2+1);	//na kturym miejscu kropka od ip
	$octet3 = substr($ip, $poz2+1, $poz3-$poz2-1);//daje octed do zmiiennej

	$octet4 = substr($ip, $poz3+1, $ip_leng-$poz3-1);//daje octed do zmiiennej


	/*
	*	next zadanie
	*/

	if(isset($_GET['name'])){
		$name = $_GET['name'];
	}else{
		$name = 'Ania Kluska';
	}
	$pozycja_spacja = strpos($name, ' ', 0);
	$first_name = substr($name, 0, $pozycja_spacja);
	

?>

<!DOCTYPE html>
<html lang='pl'>
	<head>
		<meta charset="utf-8">
		<title><?php echo $ip ?></title>
		<style>
		</style>
	</head>
	<body>

		<h1><?php echo $first_name; ?></h1>
		<h1><?php echo $ip; ?></h1>
		<ul>
			<li><?php echo $octet1; ?></li>
			<li><?php echo $octet2; ?></li>
			<li><?php echo $octet3; ?></li>
			<li><?php echo $octet4; ?></li>
		</ul>

	</body>
</html>