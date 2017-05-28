<?php
	session_start();
	require_once('witaj.inc');
	if(isset($_SESSION['imie'])){
		$imie = $_SESSION['imie'];
	}else{
		$imie = 'Grzegoż';
	}
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';

	echo witaj($imie, 'green');

	unset($_SESSION['imie']); // niszczy zmiennna w sessji
	//session_destroy(); //niszczy calo sessie
/*
	require_once;
	require;
	include_once(d);
	include();
	
	*/
?>


