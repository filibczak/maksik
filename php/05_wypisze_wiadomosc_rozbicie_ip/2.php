<?php

	if(isset($_GET['ip'])){
		$ip = $_GET['ip'];
	}else{
		$ip = $_SERVER['REMOTE_ADDR'];
	}

	$ip = (string)$ip;
	$ip_dl = strlen($ip);

	$poz1 = strpos($ip, '.');	//na kturym miejscu kropka od ip
	$octet1 = substr($ip, $ip_dl*(-1), $poz1);//daje octet to zmiennej

	$ip2 = substr($ip, $ip_dl*(-1)+$poz1+1);//odcina octet z kropka
	$ip_dl = strlen($ip2);	//dlugosc pozostala
	$poz2 = strpos($ip2,'.');	//na kturym miejscu kropka od powstalego ip
	$octet2 = substr($ip2, $ip_dl*(-1), $poz2);//daje octet to zmiennej

	$ip2 = substr($ip2, $ip_dl*(-1)+$poz2+1);//odcina octet z kropka
	$ip_dl = strlen($ip2);	//dlugosc pozostala
	$poz3 = strpos($ip2,'.');	//na kturym miejscu kropka od powstalego ip
	$octet3 = substr($ip2, $ip_dl*(-1), $poz3);//daje octet to zmiennej

	$octet4  = $ip4 = substr($ip, $ip_dl*(-1)+$poz3+1);//odcina octet z kropka




?>

<!DOCTYPE html>
<html lang='pl'>
	<head>
		<meta charset="utf-8">
		<title>elo</title>
		<style>
		</style>
	</head>
	<body>

		<h1><?php echo $ip; ?></h1>
		<ul>
			<li><?php echo $octet1; ?></li>
			<li><?php echo $octet2; ?></li>
			<li><?php echo $octet3; ?></li>
			<li><?php echo $ip4; ?></li>
		</ul>

	</body>
</html>