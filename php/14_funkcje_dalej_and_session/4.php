<?php
	/*
		losuj > sprawcz czy poprzednia wiekasz or mniejsza
	*/
	session_start();

	echo 'Twój los: '.$los.'<br>';
	if(isset($_SESSION['los'])){
		$los_pre = $_SESSION['los'];
		echo 'Twój pobrzedni los: '.$los_pre.'<br>';

	}

	$los = rand(-500,500);

?>