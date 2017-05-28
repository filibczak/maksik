<?php

if(isset($_GET['a']))
	$a = $_GET['a'];
else
	$a = 13;


if ($a % 2 == 0){
	echo "Liczba $a jest parzysta.";
}else{
	echo "Liczba $a nie jest parzysta.";
}

?>