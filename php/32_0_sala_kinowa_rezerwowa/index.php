<?php
session_start();
$_SESSION['rezerwacja'] = '#';
$ilosc_rzadow = 8;
$miejsce_id = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H');
$ilosc_miejsc = 12;

if(isset($_GET['sala'])) $nr_sala = (int)$_GET['sala']; else $nr_sala = 0;

/*sprawdzenie kture miejsca sa juz zajete*/
$xml = @simplexml_load_file('dane.xml');
if(!isset($xml->sala[$nr_sala])) $nr_sala = 0; // jesli uzytkownik pota nie istniejaco sale, to automadzynie pokaze sie z indexme 0
$rezerwacje = @$xml->sala[$nr_sala]->rezerwacja;
foreach(@$rezerwacje as $rezerwacja){
	foreach($rezerwacja->miejsce as $miejsce){
		$rzad = (int)$miejsce->rzad;
		$miejsce_nr = (int)$miejsce->miejsce_nr;
		$zarezerwowane[$rzad][$miejsce_nr] = true;
	}
}

/*stworzenie ksesel*/
$sala = '';
for($i = 0; $i < $ilosc_rzadow; $i++){
	$sala .= '<div class="rzad" data-rzad='.$i.'>';
		$sala .= '<div class="rzad_id">'.$miejsce_id[$i].'</div>';
		$miejscaOdd = $i % 2 == 1 ? ' miejscaOdd':' miejscaEven';
		$sala .= '<div class="miejsca'.$miejscaOdd.'">';
		for($j = 0; $j < $ilosc_miejsc; $j++){
			$book = @$zarezerwowane[$i][$j] == true ? 'miejsceBook':'miejsceDefault';
			$sala .= '<div class="miejsce '.$book.'" data-miejsce="'.$j.'">'.($j+1).'</div>';
		}
		$sala .= '</div>';
		$sala .= '<div class="rzad_id">'.$miejsce_id[$i].'</div>';
	$sala .= '</div>';
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>kino</title>
	<link rel="stylesheet" href="screen.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script>
		$(function(){
			
			var miejsca = '';

			//po kliknieciu na kreslo
			$('.miejsce').click(function(){
				var miejsceBook = $(this).attr('class');
				var b_miejsceBook = miejsceBook.search('miejsceBook');

				if(b_miejsceBook == -1){	//jesli nie zarezerwowane
					var miejsceBookTemp = $(this).attr('class');
					var b_miejsceBookTemp = miejsceBookTemp.search('miejscekBookThemp');
					if(b_miejsceBookTemp == -1){	//jeszcze nie zaklepano (dodanie)
						$(this).addClass('miejscekBookThemp');

					}else{							//juz zaklepano (usuniecie)
						$(this).removeClass('miejscekBookThemp');
						
					}
					var miejsca = dodajOddajMiejsce();
					$('[name="miejsca"]').val(miejsca);
				}
			});
			
			/*zmiana sali*/
			$('[name="s"]').change(function(){
				var kture = $('[name="s"]:checked').val();
				var url = '?sala=' + kture;
				window.open(url, "_self");
			});

			/*dodaje tempy do zmiennej rzad.iejsceNr H */

			function dodajOddajMiejsce(){
				var ilosc_rzadow = 8;
				var ilosc_miejsc = 12;
				var miejsca = '';
				var index = 0;
				while($('.miejscekBookThemp').eq(index).length){
					var miejsce = $('.miejscekBookThemp').eq(index).attr('data-miejsce');
					var rzad = $('.miejscekBookThemp').eq(index).parent().parent().attr('data-rzad');
					miejsca += rzad+'.'+miejsce+' [] ';
					index++;
				}

				return miejsca;
			}

		});//jq END
	</script>
</head>
<body>

	<div id="box">

		<div id="ekran">ekran</div>
		
		<div id="sala"><?php echo $sala; ?></div>

		<div id="menu">

			<form action="zarezerwuj.php" method="POST">
				<input type="text" name="miejsca" hidden>
				<input type="text" name="sala" value="<?php echo $nr_sala; ?>" hidden>
				<input type="submit" id="dalej" value="Zarezerwuj">
			</form>
			
			<div id="numer_sali">
				<h3>numer sal</h3>
				<?php
				$ile = 4;
				for($i = 0; $i < $ile; $i++){
					$checked = $i == $nr_sala ? ' checked':'';
					echo '<label for="s'.$i.'" class="'.$checked.'"><input type="radio" name="s" id="s'.$i.'" value="'.$i.'"'.$checked.' hidden>Sala '.($i+1).'</label>';
				}
				?>
				<h2 id="admin"><a href="admin.php">Panel admina</a></h2>
			</div>

		</div>

	</div>
	
</body>
</html>