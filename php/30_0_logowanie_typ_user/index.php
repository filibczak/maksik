<?php/*
require_once('../scripts.php');
session_start();
if(isset($_SESSION['zalogowany'])){
	$zalogowany = $_SESSION['zalogowany'];
}else{
	$zalogowany = 0;
	$usrName = 0;
	$usrAcces = 0;
	$usrBlock = 0;
}
$connect = polacz_db();*/
if(isset($_POST['data'])){
	$data = explode('|:|', $_POST['data']);
	switch ($data[0]) {
		case 'sprlogin':
			$login = $data[1];
			break;
		
		default:
			break;
	}
}else{
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="charset" content="utf-8">
	<title>Stronka</title>
	<link rel="stylesheet" type="text/css" href="screen.css">
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script>
		$(function(){
			//logowanie
			$('[name="login"]').change(function(){
				var login = $(this).val();
				$.ajax({
					type: 'post',
					data: 'data=sprlogin|:|'+login,
					url: '?'
				})//ajax END


		});//jQ END
	</script>
</head>
<body>
	<div id="box">
		<header id="usrPanem">
			<div id="witaj">Nie zalogowano</div>
			<div id="logInOut">Login</div>
		</header>
		<nav id="strony">
			<ul id="wybStorny">
				<li><a href="#srt1"><span>Strona 1</span></a></li>
				<li><a href="#srt2"><span>Strona 2</span></a></li>
				<li><a href="#srt3"><span>Strona 3</span></a></li>
				<li><a href="#srt4"><span>Strona 4</span></a></li>
			</ul>
		</nav>
		<section id="content">
			
		</section>
		<footer id="stopka">&copy; Drugi Uczeń Jacquar'a 2017</footer>
	</div>
	<div id="loginpanel">
		<div id="loginclose">X</div>
		<form id="login">
			<label for="login"><span>Login:</span><input type="text" name="login" placeholder="Login"></label>
			<label for="pass"><span>Hasło:</span><input type="password" name="pass" placeholder="Hasło"></label>
			<input type="submit" value="Zaloguj się">
		</form>
	</div>
</body>
</html>
<?php 
?>