<?php

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>d</title>
	<link rel="stylesheet" type="text/css" href="screen.css">
	<link rel="stylesheet" href="css/fontello.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		var year 	= <?php echo date('Y') ?>;
		var month 	= <?php echo date('m') ?>;
		var day 	= <?php echo date('d') ?>;

		$(function(){
			get_calender();
			get_notes();

			$('body')
			.delegate('#prev_month', 'click', function(){
				month--;
				if(month <= 0){
					year--;
					month = 12;
				}
				get_calender();
			})
			.delegate('#next_month', 'click', function(){
				month++;
				if(month >= 13){
					year++;
					month = 1;
				}
				get_calender();
			})
			.delegate('#kalendarz > table > tbody > tr > td > span', 'click', function(){
				$('span.check').removeClass('check');
				$(this).addClass('check');
				day = parseInt($(this).text());
				get_notes();
			});
		});//jQ END

		function get_calender(){
			$.post('get_calender',{
				year: 	year,
				month: 	month
			}).done(function(calendar){
				$('#kalendarz').html(calendar);
			});
		}
		function get_notes(){
			$.post('get_note',{
				year: 	year,
				month: 	month,
				day: 	day
			}).done(function(notes){
				$('#notes').html(notes);
			});
		}
	</script>
</head>
<body>
<main class="blure">
	<div id="kalendarz"></div>
	<div id="notes">
		<div class="note">
			<header>Tytul</header>
			<article>tresc</article>
		</div>
		<div class="note">
			<header>Tytul 2</header>
			<article>tresc 2</article>
		</div>
	</div>
	<div id="addNote">Dodaj Notatke</div>
</main>
<div id="popup">
	<header>
		<h1>PopUp</h1>
		<div id="exit">X</div>
	</header>
	<article></article>
</div>
</body>
</html>