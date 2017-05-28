<?php
session_start();
$chars = array('あ','い','う','え','お','ん','か','き','く','け','こ','さ','し','す','せ','そ','た','ち','つ','て','と','な','に','ぬ','ね','の','は','ひ','ふ','へ','ほ','ま','み','む','め','も','や','ゆ','よ','ら','り','る','れ','を');
$ile_chars = count($chars);

if(	!isset($_SESSION['run']) || !$_SESSION['run']  ) header('location: ../index.php');

if(	!isset($_SESSION['game_chars'])	){
	if(	isset($_POST['ile'])	)	$ile = $_POST['ile'];
	else 							$ile = $ile_chars/2;
	$ile = ($ile > $ile_chars-1) || ($ile < 0) ? $ile_chars-1;$ile;

	for($i )

}

$chars = array('あ','い','う','え','お','ん','か','き','く','け','こ','さ','し','す','せ','そ','た','ち','つ','て','と','な','に','ぬ','ね','の','は','ひ','ふ','へ','ほ','ま','み','む','め','も','や','ゆ','よ','ら','り','る','れ','を');
$ile_chars = count($chars);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>elo</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<style>
		
		.karta{
			height: 162px;
			width: 100px;
			text-align: center;
			font-size: 48px;
			font-weight: 900;
			line-height: 330%;
			color: #333333;
		}
		.karta-off{
			cursor: pointer;
			background-image: url(https://www.toptal.com/designers/subtlepatterns/patterns/congruent_outline.png);
		}
		.karta-off:hover{
			box-shadow: 0 0 10px 2px black;
		}
		.karta-on{
			cursor: default;
			background-color: grey;
		}
	</style>
	<script>
		$(function(){

		});//jq END
	</script>
</head>
<body>
<form id="roz_gre">
	<label><input type="number" name="ile" min='2' max='<?php echo $ile_chars; ?>' placeholder='ilosc par (2-<?php echo $ile_chars; ?>)' style="width: 111px"></label>
	<input type="submit" value="START">
</form>
</div>
</body>
</html>