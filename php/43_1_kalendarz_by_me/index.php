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
		var year 	= 2017;
		var month 	= 4;
		var day 	= 7;

		$(function(){
			get_calender()

			$('body')
			.delegate('#prev_month', 'click', function(){
				alert(1);
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
			});
		});//jQ END

		function get_calender(){
			$.post('get_calender',{
				year: 	year,
				month: 	month,
				day: 	day
			}).done(function(calendar){
				$('body').html(calendar);
			});
		}
	</script>
</head>
<body>
<!--<div id="kalendarz">
	<header>
		<span id="prev_month" class="icon-left-open"></span>
		<span id="active_month"> kwiecien 2017</span>
		<span id="next_month" class="icon-right-open"></span>
	</header>
	<table>
		<thead>
			<tr>
				<th>Pon</th>
				<th>Wto</th>
				<th>Śro</th>
				<th>Czw</th>
				<th>Pią</th>
				<th>Sob</th>
				<th>Nie</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td></td>
				<td><span>1</span></td>
				<td><span>2</span></td>
				<td><span>3</span></td>
				<td><span>4</span></td>
				<td><span>5</span></td>
			</tr>
			<tr>
				<td><span>11</span></td>
				<td><span>12</span></td>
				<td><span>13</span></td>
				<td><span>14</span></td>
				<td><span>15</span></td>
				<td><span>14</span></td>
				<td><span>15</span></td>
			</tr>
			<tr>
				<td><span>21</span></td>
				<td><span>22</span></td>
				<td><span>23</span></td>
				<td><span>24</span></td>
				<td><span>25</span></td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>-->
</body>
</html>