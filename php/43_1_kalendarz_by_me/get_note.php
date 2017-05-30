<?php
$xml = simplexml_load_file('calender.xml');
if(isset($_POST['year'])) 	$year	= (int)$_POST['year'];		else die();
if(isset($_POST['month'])) 	$month 	= (int)$_POST['month'];		else die();
if(isset($_POST['day'])) 	$day 	= (int)$_POST['day'];		else die();

$y = 'y-'.$year;
$m = 'm-'.$month;
$d = 'd-'.$day;

if(@$xml->$y->$m->$d->note)
foreach ($xml->$y->$m->$d->note as $note) {
	echo '<div class="note">';
	echo '<header>'.($note->header).'</header>';
	echo '<article>'.($note->article).'</article>';
	echo '</div>';
}

?>