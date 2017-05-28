<?php

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ksiega gosci</title>
	<style type="text/css" media="screen">
		body{
			background-color: black;
			color: black;
		}
		#wpisSie{
			margin: 0 auto;
			margin-top: 50px;
			background-color: white;
			box-shadow: inset 0 0 10px black;
			height: 300px;
			width: 300px;
			border-radius: 50%;
		}
		form{
			position: relative;
			left: 20px;
			margin: 0 auto;
			margin-top: 50px;
			width: 210px;
		}
		#head{
			position: relative;
			top: 30px;
			padding-top: 10px;
			padding-bottom: 10px;
			background-color: red;
			text-align: center;
			box-shadow: 0 0 10px black;
			background-color: black;
			color: white;
			font-weight: 900;
		}
		#komu{/*
			position: fixed;
			top: 0;
			left: 0;*/
			background-color: red;
			color: black;
		}
	</style>
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script>
		$(function(){
			$('#forma').submit(function(){
				var nick =  $("input[name=nick]").val();
				var email = $("input[name=email]").val();
				var plec = $("input[name=plec]:checked").val();
				var area = $("textarea[name=trescWpisu]").val();
				var ok = true;
				var komunikat = '';
				if(area.length > 100){
					ok = false;
					komunikat += "Za długa tresś<br>";
				}
				if(plec != 'm' && plec != 'k'){
					ok = false;
					komunikat += "tu nie gender<br>";
				}
				
				var eMialLike = /^[0-9a-zA-Z_.-]+@[0-9a-zA-Z.-]+.[a-zA-Z]{2,3}$/;
				if(!eMialLike.test(email)){
					ok = false;
					komunikat += "zły emial<br>";
				}
				
				if(nick.length > 20){
					ok = false;
					komunikat += "Za długi nick<br>";
				}

				if(ok){
					var dJS = 'dPOST=' + nick + '||' + email + '||' + plec + '||' + area;
					$.ajax({
						type 	: "POST",
						url 	: "wyslij.php",
						data 	: dJS,
						success: function(msg){
							$('#komu').fadeOut(1,function(){
								$(this).html(msg).fadeIn(400, function() {
									$(this).delay(3000).fadeOut();
								});
							});
							$('#forma').trigger('reset');
						},
						error: function(error){
							$('#komu').fadeOut(1,function(){
								$(this).html(error).fadeIn(400, function() {
									$(this).delay(3000).fadeOut();
								});
							});
						}
					});
				}else{
					$('#komu').fadeOut(1,function(){
						$(this).html('Błędne dane!!<br>' + komunikat).fadeIn(400, function() {
							$(this).delay(3000).fadeOut();
						});
					});
				}
				
				return false;
			});
		});
	</script>
</head>
<body>
	<div id="wpisSie">
		<div id="head">Księga Gości</div>
		<form id="forma">
			<label for="nick"><input type="text" name="nick" required autofocus placeholder="Nick"></label><br>
			<label for="email"><input type="text" name="email" required autofocus placeholder="E-mail"></label><br>

			Płeć:
			<label><input type="radio" name="plec" value="m" checked>Mężczyzna</label>
			<label><input type="radio" name="plec" value="k">Kobieta</label><br>

			treść:<br>
			<textarea name="trescWpisu"></textarea><br>

			<input type="submit" value="Zapisz">
			<a href="ksiega.php"><input type="button" name="wpisy" value="Zobacz wpisy"></a>
		</form>
	</div>
	<div id="komu"></div>
</body>
</html>