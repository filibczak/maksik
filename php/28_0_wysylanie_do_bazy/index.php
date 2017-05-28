<?php 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ile lat mają operatorzy komurkowi</title>
	<style>
		#operatorzy{
			width: 300px;
		}
		label{
			display: block;
			margin-bottom: 15px;
		}
		table{
			margin-top: 15px;
		}
	</style>
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script>
		$(function(){

			$('#operatorzyForm').submit(function(){
				var imie = $('input[name="imie"]').val();
				var operator = $('select[name="operator"]').val();
				var ileLat = $('input[name="ileLat"]').val();
				$.ajax({
					url: 'send.php?imie='+imie+'&operator='+operator+'&ileLat='+ileLat,
					success: function(data){
						alert(data);
					},
					error(error){
						alert(error);
					}
				});//ajax END
				return false;
			});

			$('[name="show"]').click(function(){
				$.ajax({
					url: 'show.php',
					success: function(data){
						$('#show').html(data);
					}
				})
			});

		})//jQ END	
		</script>
</head>
<body>

	<fieldset id="operatorzy"><legend>Operatorzy</legend>
		<form id="operatorzyForm" action="send.php" method="POST" accept-charset="utf-8">
			<label for="imie">Imie: <input type="text" name="imie" required autofocus placeholder="Imie"></label>
			<label for="operator">Operator:
				<select name="operator">
					<option value="0">Prosze wybrać operatora</option>
					<option value="1">T-Mobile</option>
					<option value="2">PLUS</option>
					<option value="3">Play</option>
					<option value="4">Orange</option>
					<option value="5">njuMobile</option>
					<option value="6">Heyah</option>
					<option value="7">inna</option>
				</select>
			</label>
			<label for="ileLat">Ile lat: <input type="number" name="ileLat" placeholder="Ile lat" min="0" max="255" required></label>
			<input type="submit" value="Wyślij">
		</form>
	</fieldset>
	<input type="button" name="show" value="Pokaz dane">
	<div id="show"></div>
</body>
</html>