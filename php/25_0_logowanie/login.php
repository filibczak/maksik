<?php
	session_start();
	if(@$_SESSION['zalogowany'] == true)
		header('Location: index.php')
	/*echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Loguj</title>
	<style>
		body{
			background-color: black;
			color: white;
		}
		form{
			background-color: green;
			padding: 10px;
			padding-bottom: 20px;
			width: 200px;
			margin: 0 auto;
			margin-top: 50px;
		}
		input{
			margin: none;
			padding: none;
			border: none;
			outline: none;

			display: block;
			margin: 0 auto;
			margin-top: 10px;
			width: 150px;
			padding: 5px
		}
		input:focus{
			outline: 2px solid blue;
		}
		input[type="submit"]{
			width: 160px;
		}
	</style>
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script>
		$(function(){
		});//jQ END
	</script>
</head>
<body>
	<form id="login" action="admin.php" method="POST">
		<label for="login"><input type="text" name="login" placeholder="Login" required autofocus></label>
		<label for="password"><input type="password" name="password" placeholder="Hasło" required></label>
		<input type="submit">
	</form>
</body>
</html>