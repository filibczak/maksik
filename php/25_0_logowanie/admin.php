<?php
	session_start();

	echo '<pre>';
	print_r($_SESSION);
	print_r($_POST);
	echo '</pre>';

	if(isset($_POST['login'])){
		$login = $_POST['login'];
		$password = $_POST['password'];

		$file = file_get_contents('pasy.txt');
		$file = explode('|||', $file);
		array_pop($file);
		echo '<pre>';
		print_r($file);
		echo '</pre>';
		$pass_ile = sizeof($file);
		for($i = 0; $i < $pass_ile; $i++){
			$pass = explode('||', $file[$i]);
			if($pass[0] == $login && $pass[1] == $password){
				$_SESSION['zalogowany'] = true;
				$_SESSION['login'] = $pass[0];
				header('Location: index.php');
				break;
			}
		}
		if($_SESSION['zalogowany'] == false){
			header('Location: index.php');
		}
	}else if(isset($_POST['wyloguj'])){
		$_SESSION['zalogowany'] = false;
		$_SESSION['login'] = '';
		header('Location: index.php');
	}else{
		//header('Location: index.php');
	}
?>