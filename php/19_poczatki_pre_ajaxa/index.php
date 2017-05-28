<?php
	if(isset($_GET['op']) && $_GET['op'] = 'odbierz'){
		//sprawdza czy jest
		if(isset($_POST['ile_losow'])){
			$ile = $_POST['ile_losow'];
		}else{
			$ile = 0;
		}
		//sprawdza czy jest k liczba
		if($ile < 5){	//error
			$tresc = '<h1 style="color: red;">Sry, jakiś error na rejonie</h1>';
		}else{			//NO error
			$tresc = '';
			for($i = 0; $i < $ile; $i++){
				$tresc .= rand(0,50).', ';
			}
		}
	}else{
		$tresc = 'tu będzie wynik';
	}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<title>los</title>
	<meta charset="utf-8">
	<style type="text/css">
		body{
			background-color: black;
			color: grey;
		}
		h1{
			text-align: center;
		}
		#losy{
			width: 800px;
			margin: 0 auto;
			margin-top: 25px;
		}
		p{
			width: 800px;
			margin: 0 auto;
			text-align: inherit;
		}
		input[type="number"]{
			width: 200px;
		}
	</style>
</head>
<body>

	<h1>Losowanie</h1>
	<form action="?op=odbierz" method="POST" id="losy">
		<fieldset><legend>Ile losów</legend>
			<label for="ile_losow"><input type="number" name="ile_losow" placeholder="Ile liczb do wylosowania (min 5)" required min="1"></label>
			<label for="ile_losow_pobierz"><input type="submit" name="ile_losow_pobierz" value="losuj"></label>
			<label for="ile_losow_czysc"><input type="reset" name="ile_losow_czysc" ></label>
		</fieldset>
	</form>

	<h1>Wylosowane liczby</h1>
	<p><?php if(isset($tresc)) echo $tresc ?></p>


</body>
</html>