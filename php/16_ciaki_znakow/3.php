<?php

if(isset($_GET['name'])){
	$name = $_GET['name'];
	$space = strpos($name, ' ');
	$lastName = substr($name, $space);
	echo 'Witaj'.$lastName;
}else{
	echo 'nic ni ma';
}

?>