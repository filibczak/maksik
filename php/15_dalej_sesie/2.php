<?php
	session_start();

	if( isset($_SESSION['b_zalogowany']) && isset($_SESSION['user']) ){
		$b_zalogowany = $_SESSION['b_zalogowany'];
		$user = $_SESSION['user'];
		/*echo '<script> window.onload = start; function start(){alert("'.$user.'")}</script>';*/
	}else{
		$b_zalogowany = false;
	}

	$dane = array(
		'Qkiz' => '123',
		'F4ilur3' => 'cwelemjestem12',
		'admin' => 'admin',
		'kruk132' => '132'
	);


	if(	isset($_GET['user']) && isset($_GET['pass']) && !$b_zalogowany){
		$user = $_GET['user'];
		$pass = $_GET['pass'];
		unset($_GET['user']);
		unset($_GET['pass']);
		foreach ($dane as $key => $value) {
			if($key == $user && $value == $pass){
				$_SESSION['user'] = $user;
				$_SESSION['b_zalogowany'] = $b_zalogowany = true;
				break;
			}
		}
		if(!$b_zalogowany){
			logout();
		}
		/*
		if($b_zalogowany){
			echo '<script> window.onload = start; function start(){alert("'.$user.' | '.$pass.'")}</script>';
		}else{
			echo '<style>#login{display: block}</style>';

		}*/
	}

	function logout(){
		unset($_SESSION['b_zalogowany']);
		unset($_SESSION['user']);
		header('Location: 2.php');
	}

	if(isset($_GET['logaut'])){

	}


?>

<!DOCTYPE html>
<html lang='pl'>
	<head>
		<meta charset="utf-8">
		<title>elo</title>
		<style>
			body{
			}
			h3{
				text-align: center;
			}
			#menu{
				position: absolute;
				top: 0;
				left: 0;
				width: 150px;
				min-height: 150px;
				background-color: pink
			}
			#login{
				display: <?php if($b_zalogowany){echo 'none';}else{echo 'block';} ?>;
				position: absolute;
				top: 5px;
				left: 155px;
			}
			#hello{
				display: <?php if($b_zalogowany){echo 'block';}else{echo 'none';} ?>;
				position: absolute;
				top: 5px;
				left: 155px;
			}
			#logout{
				position: <?php if($b_zalogowany){echo 'block';}else{echo 'none';} ?>;
				position: absolute;
				top: 5px;
				right: 5px;
			}
		</style>
	</head>
	<body>
		<nav id="menu">
			<h3>Menu:</h3>
			<ul>
				<li><a href="?&akp=1">Wybor 1</a></li>
				<li><a href="?&akp=2">Wybor 2</a></li>
				<li><a href="?&akp=3">Wybor 3</a></li>
			</ul>
		</nav>
		<form id="login">
			<label><input type="text" name="user" placeholder="User" autofocus></label><br>
			<label><input type="password" name="pass" placeholder="Haslo"></label><br>
			<input type="submit" value="Login">
		</form>
		<div id="hello">Witaj <?php if($b_zalogowany){echo $user;} ?> na serwerze!</div>
		<form id="logout">
			<input type="text" name="user" value="" style="visibility: hidden">
			<input type="password" name="pass" value="" style="visibility: hidden">
			<input type="submit" value="LogOut">
		</form>
	</body>
</html>