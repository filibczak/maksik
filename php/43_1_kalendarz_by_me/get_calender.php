<?php
	require_once('names.inc');
	if(isset($_POST['year'])) 	$year	= $_POST['year'];		else die();
	if(isset($_POST['month'])) 	$month 	= (int)$_POST['month'];		else die();
	if(isset($_POST['day'])) 	$day 	= (int)$_POST['day'];		else die();
?>

<div id="kalendarz">
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
</div>