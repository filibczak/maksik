<?php

?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Krzysztof Kukiz kukizk@gmail.com">
	<meta name="Keywords" content="">
	<meta name="Description" content="">
	<title>Miesięczny Budżet Domowy</title>
	<link href="" rel="icon" type="image/x-icon">
	<link rel="stylesheet" href="bin/style/screen.css">
	<script src="../../script/jq.js"></script>
	<script>
	
	</script>
	
</head>
<body>
<div id="box">
	<article id="przychody">
		<header>Przychody</header>
		<section>
		
			<table class="cat">
				<tr><th colspan="2"><input type="text" value="Przychody"></th></tr>
				<tr>
					<th><input type="text" class="case-name" name="case-name-0" value="Przychod M"></th>
					<td><input type="text" class="case-valu" name="case-valu-0" value="10 000 zł"></td>
				</tr>
				<tr>
					<th><input type="text" class="case-name" name="case-name-0" value="Przychod W"></th>
					<td><input type="text" class="case-valu" name="case-valu-0" value="10 000 zł"></td>
				</tr>
				<tr>
					<th class="noHover">Razem</th>
					<td class="noHover">20 000 zł</td>
				</tr>
				<tr>
					<td colspan="2"><input type="button" value="Dodaj"></td>
				</tr>
			</table>
			
		</section>
	</article>
	<article id="wydatki">
		<header>Odchody</header>
		<section></section>
	</article>
	<article id="podsumowanie">
		<header>Podsumowanie</header>
		<section></section>
	</article>
</div>
</body>
</html>