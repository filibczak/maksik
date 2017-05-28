<?php

if(!isset($_POST['ile_par']) || empty($_POST['ile_par'])) echo '<a href="index.php">jakiś bląd, cofnij</a>';
else{
	require_once('chars.inc');
	$ile_par = $_POST['ile_par'];
	#$ile_par = 6;
	$ile_par = $ile_par > $ile_chars ? $ile_chars:$ile_par;
	$ile_par = $ile_par < 2 ? 2:$ile_par;
	for($i = 0; $i < $ile_par; $i++){
		$usedChars[] = $chars[$i];
		$usedChars[] = $chars[$i];
		//$msg .= "<div class='card' data-card-id=></div>";
	}
	shuffle($usedChars);
	$pln = '';
	for($i = 0; $i < $ile_par*2; $i++){
		$znak = $usedChars[$i];
		$pln .= "<div class='card flip' data-znak='$znak' data-ac='f'>
			<div class='front'></div>
			<div class='back'>$znak</div>
		</div>";
	}



?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<style>
	#staty{
		width: 670px;
		background-color: grey;
		margin: 0 auto;
		margin-bottom: 15px;
	}
	#plansza{
		width: 670px;
		background-color: grey;
		margin: 0 auto;
		padding-bottom: 10px;
        perspective:300px;
        -webkit-perspective:300px;
	}
	.card{
        position:relative;
		display: inline-flex;
		width: 100px;
		height: 160px;
		cursor: pointer;
		margin-left: 10px;
		margin-top: 10px;
        transition:1s;
        -webkit-transition:1s;
        transform-style:preserve-3d;
        -webkit-transform-style:preserve-3d;
	}
	.card div{
		text-align: center;
		font-size: 60px;
		font-weight: 900;
		line-height: 150%;
		box-sizing: border-box;
		padding: 18px;
		padding-top: 30px;
		width: 100%;
		height: 100%;
		border: 3px solid darkgrey;
		border-radius: 15px;
	}
	.card .back{
		background-color: lightgrey;
        position:absolute;
        width:100%;
        height:100%;
        backface-visibility:hidden;
        -webkit-backface-visibility:hidden;
      }

    .card .front{
		background-image: url("https://www.toptal.com/designers/subtlepatterns/patterns/circles-and-roundabouts.png");
        background-size:100%;
        position:absolute;
        width:100%;
        height:100%;
        line-height:240px;
        color:#FFF;
        font-size:1.6em;
        transform:rotateY(180deg);
        -webkit-transform:rotateY(180deg);
        backface-visibility:hidden;
        -webkit-backface-visibility:hidden;
    }
    .flip{
        transform:rotateY(180deg);
        -webkit-transform:rotateY(180deg);
    }
	[data-ac=t]{
	    transform:rotateY(0deg);
	    -webkit-transform:rotateY(0deg);
	}
	.zgdn .back{
		border: 3px solid green;
		background-color: lightgreen;
        backface-visibility:hidden;
        -webkit-backface-visibility:hidden;
	}
</style>
<script>

var ile_focus = 0;
var ruch = 0;
var zgatniente = 0;

$(function(){

	$('.flip').click(function(){
		$th = $(this);
		if(ile_focus < 2){//nie ma dwuch odkrytych
			obr($th);
			if(ile_focus==2){
				ruch++;
				var p1 = $('[data-ac="t"]').eq(0).attr('data-znak');
				var p2 = $('[data-ac="t"]').eq(1).attr('data-znak');
				if(p1 == p2){
					$('[data-ac="t"]').eq(0)
						.attr('data-znak', 'f')
						.removeClass('flip')
						.addClass('zgdn');
					$('[data-ac="t"]').eq(1)
						.attr('data-znak', 'f')
						.removeClass('flip')
						.addClass('zgdn');
					zgatniente++;
				}
			}
		}else{//sa dwa odkryte
			$('[data-ac="t"]').attr('data-ac', 'f');
			ile_focus = 0;
			obr($th);
		}
	});

});//jq END

function obr($th){
	if(	$th.attr('data-ac') == 't'	){
		$th.attr('data-ac', 'f');
		ile_focus--;
	}else{
		$th.attr('data-ac', 't');
		ile_focus++;
	}
}

</script>

<div id="staty">
	<div>Ilość ruchów: </div>
</div>
<article id="plansza">
	<?php echo $pln; ?>
</article>
<?php } ?>