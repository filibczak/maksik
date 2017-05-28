<?php
	$where = 'd.txt';
	if(isset($_GET['d'])){
		$d = $_GET['d'];
		//dopisuje
		if(is_writable($where) && $handle = fopen($where, 'a')){
			if(flock($handle, 2)){
				fwrite($handle, $d.'|:|');
				flock($handle, 3);
			}
			fclose($handle);
		}
		//odczytuje wszystko
		if(is_readable($where)){
			$content = file_get_contents($where);
			$content = explode('|:|', $content);
			array_pop($content);
			$html = '<legend>Wyniki</legend>';
			foreach ($content as $value) {
				$html .= '<span>'.$value.'</span>';
			}
			$html .= '<input type="submit" id="clearFile" name="clearFile" value="Czysc plik">';
			echo $html;
		}
	}else if(isset($_GET['op'])){
		switch ($_GET['op']) {
			case 'del':
				if(is_writable($where) && $handle = fopen($where, 'w')){
					if(flock($handle, 2)){
						fwrite($handle, '');
						flock($handle, 3);
					}
					fclose($handle);
				}
				break;
			
			default:
				break;
		}
	}else{
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<style>
	*{
		margin: 0;
		padding: 0;
		border: none;
		outline: none;
	}
	body{
		background-color: lightgrey;
		color: black;
	}
	#box{
		margin: 0 auto;
		width: 600px;
		min-height: 50px;
	}
	fieldset, legend{
		border: 2px solid green;
		padding: 10px;
	}
	fieldset{
		margin-top: 15px;
	}
	input[type="number"], input[type="text"]{
		padding: 10px;
		background-color: darkgrey;
	}
	input[type="submit"]{
		padding: 10px;
		cursor: pointer;
		float: right;
		background-color: grey;
	}
	input[type="submit"]:hover{
		background-color: darkgrey;
	}
	input{
		width: 120px;
	}
	#wyniki span{
		display: block;
		float: left;
		margin: 10px;
		width: 170px;
		height: 50px;
		background-color: grey;
		box-sizing: border-box;
		padding: 10px;
		text-align: center;
		line-height: 190%;
		overflow-y: scroll;
		overflow-x: hidden;
	}
	#clearFile{
		width: 100%;
		margin: 0 auto;
		float: none;
		clear: both;
	}
	</style>
	<script>
		$(function(){
			$('#calc').submit(function(){
				var dzielna = $('[name="dzielna"]').val();
				var dzielnik = $('[name="dzielnik"]').val();
				var wynik = '';

				if(dzielnik == 0){
					wynik = 'Nie mpżna dzielić przez 0'
				}else{
					wynik = (dzielna/dzielnik).toFixed(4);
				}

				$.ajax({
					url: '?d=' + dzielna + ' / ' + dzielnik + ' = ' + wynik,
					success: function(data){
						$('#wyniki').html(data);
					}
				});

				$('[name="iloraz"]').val(wynik);
				return false;
			});

			$('#clearFile').click(function(){
				if(confirm('czy napewno usunąć')){
					$.ajax({
						url: '?op=del',
						success: function(){
						$('#wyniki').html('<legend>Wyniki</legend><input type="submit" id="clearFile" name="clearFile" value="Czysc plik">');
						}
					});
				}
			});
		});
	</script>
</head>
<body>

<div id="box">
	
<fieldset>
	<legend>Dzielenie</legend>
	<form id="calc">
		<input type="number" name="dzielna">
		/
		<input type="number" name="dzielnik">
		= 
		<input type="text" name="iloraz">
		<input type="submit" name="oblicz" value="oblicz">
	</form>
</fieldset>
	
<fieldset id="wyniki">
	<?php
		if(is_readable($where)){
			$content = file_get_contents($where);
			$content = explode('|:|', $content);
			array_pop($content);
			$html = '<legend>Wyniki</legend>';
			foreach ($content as $value) {
				$html .= '<span>'.$value.'</span>';
			}
			$html .= '<input type="submit" id="clearFile" name="clearFile" value="Czysc plik">';
			echo $html;
		}
	?>
</fieldset>

</div>

</body>
</html>
<?php } ?>