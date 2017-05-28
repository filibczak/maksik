<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ksiega gosci</title>
	<style>
		body{
			background-color: black;
			color: white;
		}
		.osoba{
			float: left;
			width: 300px;
			height: 250px;
			background-color: rgba(255,255,255,0.3);
			outline: 1px solid white;
			margin-right: 50px;
			margin-bottom: 50px;
		}
		.nick{
			float: left;
			min-width: 25px;
			min-height: 25px;
			background-color: white;
			border-bottom-right-radius: 20px;
			padding-right: 20px;
			box-shadow: 0 0 15px black;
			color: black;
		}
		.emial{
			float: right;
			min-width: 25px;
			min-height: 25px;
			background-color: white;
			border-bottom-left-radius: 20px;
			padding-left: 20px;
			box-shadow: 0 0 15px black;
			color: black;
		}
		.area{
			display: block;
			margin: 0 auto;
			width: 100%;
			margin-top: 40px;
			background-color: black;
		}
		.del{
			color: red;
			cursor: pointer;
		}
	</style>
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script>
		$(function(){
			$('body').delegate('.del', 'click', function(){
				var block = $(this);
				var nick = block.prev().prev().prev().text();
				var email = block.prev().prev().text();
				var text = block.prev().text();
				var dJS = nick+'||'+email+'||n||'+text;
				$.ajax({
					type: 'POST',
					data: 'data='+dJS,
					url: 'del.php',
					success: function(data){
						alert(data);
					},
					error: function(error){
						alert(error);
					}
				})//ajax END
			});
		});//jq END
	</script>
</head>
<body>
<!--
	<div class="osoba">
		<header class='nick'></header>
		<header class='emial'></header>
		<content class='area'></content>
	</div>
-->
	<?php
		$where = 'goscie.txt';
		if(file_exists($where));
		$content = file_get_contents($where);
		$osoba = explode('&&', $content);
		array_pop($osoba);

		foreach ($osoba as $value) {
			$dane = explode('||', $value);

			echo '<div class="osoba">';
				echo "<header class='nick'>$dane[0]</header>";
				echo "<header class='emial'>$dane[1]</header>";
				echo "<content class='area'>$dane[3]</content>";
				echo '<span class="del">Usuń</sapn>';
			echo '</div>';
		}
	?>
</body>
</html>