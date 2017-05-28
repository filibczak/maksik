<?php
session_start();
if($_SESSION['zalogowany'] == true){
	header('Location: panel.php');
}else{
	header('Location: login.php');
}
?>