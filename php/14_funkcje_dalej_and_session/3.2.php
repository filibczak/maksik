<?php
	session_start();
	if(isset($_POST['color']))
		$_SESSION['color'] = $_POST['color'];
	
	header('Location: 3.php');
?>