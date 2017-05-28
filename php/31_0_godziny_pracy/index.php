<?php
$file = 'dane.txt';

if(@$_GET['save'] == true){
	$dane = @$_POST['dane'];
	if(is_writable($file) && $handle = fopen($file, 'w')){
		if(flock($handle, 2)){
			fwrite($handle, $dane);
			flock($handle, 3);
		}else{
			echo 'nie mozna zarezerwować pliku';
		}
		fclose($handle);
	}else{
		echo 'nie można otworzyć pliku';
	}
	
	
}else{
	if(is_readable($file))
		$content = file_get_contents($file);
	else
		$content = '<h1>Błąd z wczytaniem pliku</h1>';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Godziny pracy</title>
	<style>
		body{
			background-color: lightgrey;
			color: #3e3e3e;
		}
		table{
			margin: 0 auto;
			border-collapse: collapse;
		}
		thead{
			background-color: #929292;
		}
		thead tr th{
			padding: 5px 0;
			width: 150px;
			text-align: center;
		}
		tbody tr{
			border-top: 1px solid #929292;
		}
		tbody tr th{
			padding: 5px;
			text-align: center;
		}
		tbody tr td{
			padding: 5px;
			text-align: center;
			font-size: 20px;
		}
		.imie, .stanowisko{
			display: block;
			min-height: 18px;
			width: 100%;
		}
		.stanowisko{
			color: #787878;
		}
		#zapisz{
			width: 300px;
			height: 35px;
		}
	</style>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
	$(function(){
		$('#zapisz').click(function(){
			var content = $('#godziny').html();
			$.ajax({
				type: 'POST',
				data: 'dane='+content,
				url: '?save=true'
			});
		});
	});
</script>

</head>
<body>

<table id="godziny">
	<?php echo $content; ?>
</table>

</body>
</html>
<?php
}
?>
	<!--<thead>
		<tr>
			<th>Imię i Nazwisko</th>
			<th>Poniedziałek</th>
			<th>Wtorek</th>
			<th>Środa</th>
			<th>Czwartek</th>
			<th>Piątek</th>
		</tr>
	</thead>
	<tbody>
	
		<tr>
			<th contenteditable="true">
				<span class="imie"></span>
				<span class="stanowisko"></span>
			</th>
			<td contenteditable="true"></td>
			<td contenteditable="true"></td>
			<td contenteditable="true"></td>
			<td contenteditable="true"></td>
			<td contenteditable="true"></td>
		</tr>
	
		<tr>
			<th contenteditable="true">
				<span class="imie"></span>
				<span class="stanowisko"></span>
			</th>
			<td contenteditable="true"></td>
			<td contenteditable="true"></td>
			<td contenteditable="true"></td>
			<td contenteditable="true"></td>
			<td contenteditable="true"></td>
		</tr>
	
		<tr>
			<th contenteditable="true">
				<span class="imie"></span>
				<span class="stanowisko"></span>
			</th>
			<td contenteditable="true"></td>
			<td contenteditable="true"></td>
			<td contenteditable="true"></td>
			<td contenteditable="true"></td>
			<td contenteditable="true"></td>
		</tr>
			
		<tr>
			<td colspan="6"><button id="zapisz">Zapisz</button></td>
		</tr>
								
	</tbody>-->