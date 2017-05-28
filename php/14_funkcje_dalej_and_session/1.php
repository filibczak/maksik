<?php
	session_start();
	require_once('witaj.inc');

	$imie = 'Zosia';
	$_SESSION['imie'] = $imie;
	$_SESSION['kl'] = 'leko';
/*
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
*/
	echo witaj($imie, 'red');
?>
<a href="2.php">Kliknij tu</a>