<?php
	require_once('names.inc');
	if(isset($_POST['year'])) 	$year	= (int)$_POST['year'];		else die();
	if(isset($_POST['month'])) 	$month 	= (int)$_POST['month'];		else die();

	$mk 				= mktime(0, 0, 0, $month, 1, $year);
	$monthsFirstDay 	= (int)date('N', $mk);
	$monthsDaysNumber 	= (int)date('t', $mk);

	$toDayDay 			= (int)date('j');
	$toDayMonth 		= (int)date('n');
	$toDayYear 			= (int)date('o');
?>

<header>
	<span id="prev_month" class="icon-left-open"></span>
	<span id="active_month"> <?php echo $months_name[$month-1]; ?> <?php echo $year; ?></span>
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
		<?php
			$xml = simplexml_load_file('calender.xml');
			for($i = 0; $i < 6; $i++){
				echo '<tr>';
				for($j = 0; $j < 7; $j++){
					$toDay = ($i*7)+ $j+1+1 - $monthsFirstDay;
					$y = 'y-'.$year;
					$m = 'm-'.$month;
					$d = 'd-'.$toDay;
					if(@$xml->$y->$m->$d->note) $cls = 'is-note';
					else $cls = '';
					if($toDay > 0 && $toDay <= $monthsDaysNumber )
						if($toDay == $toDayDay && $toDayMonth == $month && $toDayYear == $year) echo '<td class="'.$cls.'"><span class="toDay check">'.$toDay.'</span></td>';
						else 																	echo '<td class="'.$cls.'"><span>'.$toDay.'</span></td>';
					else
						echo '<td></td>';
				}
				echo '</tr>';
			}
		?>
	</tbody>
</table>