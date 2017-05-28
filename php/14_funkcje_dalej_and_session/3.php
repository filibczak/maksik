<?php
	session_start();
	if(isset($_SESSION['color']))
		$color = $_SESSION['color'];
	else
		$color = 'black';
?>
<!DOCTYPE html>
<html lang='pl'>
	<head>
		<meta charset="utf-8">
		<title>elo</title>
		<style>
			h1{
				color: <?php echo $color ?>;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<h1>Witaj przybyszu</h1>
		<form id="colors" action="3.2.php" method="post">
			<input type="submit" name="color" style="background-color: red" 	value="red"><br>
			<input type="submit" name="color" style="background-color: green" 	value="green"><br>
			<input type="submit" name="color" style="background-color: blue" 	value="blue"><br>
		</form>
	</body>
</html>