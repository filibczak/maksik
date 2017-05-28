<?php

	if(isset($_GET['a'])){

		echo '<pre>';
		print_r($_POST);;
		print_r($_FILES);;
		echo '<pre>';

		$plik_tmp = $_FILES['plik']['tmp_name'];
		$plik_nazwa = $_FILES['plik']['name'];
		$plik_rozmiar = $_FILES['plik']['size'];

		if(is_uploaded_file($plik_tmp)){
			move_uploaded_file($plik_tmp, "upload/$plik_nazwa");
			echo '<p>Plik: <strong>'.$plik_nazwa.'</strong> o rozmiarze: <strong>'.$plik_rozmiar.'</strong></p>';

			if($_FILES['plik']['type'] == 'image/jpeg' || $_FILES['plik']['type'] == 'image/gif'){
				echo '<img src="upload/'.$plik_nazwa.'" width="300" alt>';
			}else if($_FILES['plik']['type'] == 'image/png' || $_FILES['plik']['type'] == 'image/gif'){
				echo '<a href="upload/'.$plik_nazwa.'">tu bedzie, moze</a>';
			}else if($_FILES['plik']['type'] == 'text/plain'){
				$tab = file('upload/'.$plik_nazwa);
				
				echo '<table border="1"><tr><th>Imie</th><th>Nazwisko</th><th>Wiek</th></tr>';
				foreach ($tab as $key => $value) {
					$dl = strlen($value);
					echo '<tr><td>';
					for($i = 0; $i < $dl; $i++){
						if($value[$i] == ' '){
							echo '</td><td>';
						}else{
							echo $value[$i];
						}
					}
					echo '</td></tr>';
				}
				echo '</table>';


			}else{
				echo file_get_contents('upload/'.$plik_nazwa).'<br> teko typu plików nie chcemy';
			}

		}else{
				echo "jakis babol";
		}
	}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Jakis taitel</title>
	<meta charset="utf-8">
</head>
<body>

	<form action="?a=1" method="POST" enctype="multipart/form-data">
		<label for="MAX_FILE_SIZE"><input type="hidden" name="MAX_FILE_SIZE" value="5000000000"></label>	<!-- 5000000000 bait => 4 768,371 582 031 3 mb => ~5gb -->
		<label for="plik"><input type="file" name="plik"></label>
		<label for="wyslij"><input type="submit" name="wyslij" value="Wyślij"></label>
	</form>

</body>
</html>