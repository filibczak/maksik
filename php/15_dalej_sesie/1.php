<?php
	session_start();
	if(isset($_SESSION['view'])){
		$view = ++$_SESSION['view'];
	}else{
		$_SESSION['view'] = $view = 1;
	}

	echo '<h1>Numer: '.$view.'</h1>';

	//session_destroy();
?>