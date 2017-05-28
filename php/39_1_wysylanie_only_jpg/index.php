 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title></title>
 	<style type="text/css">
 		body{
 			background-color: grey;
 			color: black;
 			margin: 0;
 		}
 		img.captcha{
 			position: relative;
 			top: 5px;
 		}
 		img.content{
 			height: 250px;
 			float: left;
 			margin-right: 15px;
 			margin-bottom: 15px;
 		}
 	</style>
 </head>
 <body>
 	<form action="scripts.php?op=sendNudes" method="POST"  enctype="multipart/form-data">
 	<fieldset id="wyslij">
 		<legend>Wyslij</legend>

		<label for="MAX_FILE_SIZE"><input type="hidden" name="MAX_FILE_SIZE" value="5000000000"></label>
		<label for="plik"><input type="file" name="plik"></label>

		<img class="captcha" src="captcha.php">
		<input type="text" name="captcha">

		<label>wymiary: <input type="number" name="width"> x <input type="number" name="height"></label>

		<label for="wyslij"><input type="submit" name="wyslij" value="Wyślij"></label>
		<?php if(isset($_GET['kom'])){echo '<span style="color: red">'.$_GET['kom'].'</span>';} ?>
 	</fieldset>
 	</form>

 	<fieldset id="wyslane_obrazki">
 		<legend>obrazki</legend>
 		<?php 
 			$directory = 'img/';
 			$dir = opendir($directory);
 			while($img = readdir($dir)){
 				if($img != '.' && $img != '..'){
 					echo "<img class='content' src='img/$img'>";
 				}
 			}
 		?>
 	</fieldset>
 </body>
 </html>
 
	<!--<form action="?a=1" method="POST" enctype="multipart/form-data">
		<label for="MAX_FILE_SIZE"><input type="hidden" name="MAX_FILE_SIZE" value="5000000000"></label>
		<label for="plik"><input type="file" name="plik"></label>
		<label for="wyslij"><input type="submit" name="wyslij" value="Wyślij"></label>
	</form>-->