<?php
if(isset($_POST['op'])){

	switch ($_POST['op']) {
		case '#hom': hom(); break;
		case '#wyp': wyp(); break;
		case '#flm': flm(); break;
		case '#stt': stt(); break;
		case '#adm': adm(); break;
		case '#kli': kli(); break;
		case '#rez': rez(); break;
		case '#gat': gat(); break;
		case '#usr': usr(); break;
		case '#inn': inn(); break;
		
		default:
			echo '<h1>Prosze nie być hackerem!2</h1>';
			break;
	}

}else echo '<h1>Prosze nie być hackerem!</h1>';


//	-----------------------	funkcje php ----------------------------------
function hom(){
?>

<div class="container page-header"> <h1>Wypożyczalnia filmów online <small>Naj-baza filmów na maksiku</small></h1> </div>
<div class="container jumbotron">
  <h1>Witaj!</h1>
  <p>Witaj na naj-strone na maksik.glt.pl</p>
  <p>Ponizej masz pare guzików, kliknij jeden z nich!</p>
  <p>
  	<a class="btn btn-primary btn-lg glyphicon glyphicon-tag" href="wyp.php" role="button"> Wypożyczenia</a>
  	<a class="btn btn-primary btn-lg glyphicon glyphicon-film" href="film.php" role="button"> Filmy</a>
  	<a class="btn btn-primary btn-lg glyphicon glyphicon-signal" href="stat.php" role="button"> Statystyki</a>
  </p>
</div>
<?php
}
function wyp(){

}
function flm(){
?>
<div class="container page-header"> <h1>Filmy <small>Twoja biblioteka ruchomych zdięć</small></h1> </div>
 <div class="container panel panel-default">
    <div class="panel-heading">Lista wyporzyczeń</div>
    <?php
      include('../scripts.php');
      $operacja = '<button type="button" class="btn btn-default glyphicon glyphicon-cog" aria-label="Left Align"> Edytuj</button>';
      $sql = "SELECT filID 'Lp.', filtytul 'tytuł', CONCAT(rezNazwisko, ' ', rezImie) 'Reżuser', '$operacja' AS 'Operacja' FROM `filFilmy` NATURAL JOIN filRezyser";
      $tab = sql2array($sql);
      $HTMLtable = array2HTMLtable($tab, 'table');
      echo $HTMLtable;
    ?>
</div>
<?php
}
function stt(){

}
function adm(){

}
function kli(){
?>
<div class="container page-header"> <h1>Klienci</h1> </div>
 <div class="container panel panel-default">
	<button type="button" class="btn btn-primary glyphicon glyphicon-plus" data-toggle="modal" data-target="#modalFormularz" style="float: right"> Dodaj klienta</button>
    <?php
      include('../scripts.php');
      $operacja = '<button type="button" class="btn btn-default glyphicon glyphicon-cog edit edit-kli" aria-label="Left Align"> Edytuj</button>';
      $sql = "SELECT klID id, klImie Imie, klNazwisko Nazwisko, klWiek Wiek FROM filKlient";
      $arr = sql2array($sql);
      $il = count($arr);
      $tb = '';
      /*	tworzenie tabeli	*/
      $tb .= '<table class="table">';
      //head
      $tb .= '<thead>';
      $tb .= '<tr>';
      	$tb .= '<th>lp.</th>';
      	$tb .= '<th>Imie</th>';
      	$tb .= '<th>Nazwisko</th>';
      	$tb .= '<th>Wiek</th>';
      	$tb .= '<th style="width: 150px;">Operacja</th>';
      $tb .= '<tr>';
      $tb .= '</thead>';
      //body
      $tb .= '<tbody>';
      for($i = 0; $i < $il; $i++){
      	$tb .= '<tr data-usrid="'.$arr[$i]['id'].'">';
      		$tb .= '<td>'.($i+1).'</td>';
      		$tb .= '<td>'.$arr[$i]['Imie'].'</td>';
      		$tb .= '<td>'.$arr[$i]['Nazwisko'].'</td>';
      		$tb .= '<td>'.$arr[$i]['Wiek'].'</td>';
      		$tb .= '<td>'.$operacja.'</td>';
      	$tb .= '</tr>';
      }
      $tb .= '</tbody>';
      $tb .= '</table>';
      echo $tb;
    ?>
</div>
<div class="modal fade" id="modalFormularz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Dodaj Klienta</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="modal-body" id="snd-kli">
				<div class="form-group row">
				  <label for="inputEmail3" class="col-sm-2 col-form-label">Imie</label>
				  <div class="col-sm-10"> <input type="text" class="form-control" name="imie" placeholder="Imie"></div>
				</div>

				<div class="form-group row">
				  <label for="inputEmail3" class="col-sm-2 col-form-label">Nazwisko</label>
				  <div class="col-sm-10"> <input type="text" class="form-control" name="nazwisko" placeholder="nazwisko"></div>
				</div>

				<div class="form-group row">
				  <label for="inputEmail3" class="col-sm-2 col-form-label">Wiek</label>
				  <div class="col-sm-10"> <input type="number" class="form-control" name="wiek" placeholder="Wiek" min="0" max="1337"></div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary" value="save changes">
				</div>
			</form>
		</div>
	</div>
</div>
<?php
}
function rez(){
?>
<div class="container page-header"> <h1>Reżyserowie</h1> </div>
 <div class="container panel panel-default">
	<button type="button" class="btn btn-primary glyphicon glyphicon-plus" data-toggle="modal" data-target="#modalFormularz" style="float: right"> Dodaj Rerzysera</button>
    <?php
      include('../scripts.php');
      $operacja = '<button type="button" class="btn btn-default glyphicon glyphicon-cog edit edit-rez" aria-label="Left Align"> Edytuj</button>';
      $sql = "SELECT rezID id, rezImie Imie, rezNazwisko Nazwisko, rezDataUrodzenia Data FROM filRezyser";
      $arr = sql2array($sql);
      $il = count($arr);
      $tb = '';
      /*	tworzenie tabeli	*/
      $tb .= '<table class="table">';
      //head
      $tb .= '<thead>';
      $tb .= '<tr>';
      	$tb .= '<th>lp.</th>';
      	$tb .= '<th>Imie</th>';
      	$tb .= '<th>Nazwisko</th>';
      	$tb .= '<th>Data urodzenia</th>';
      	$tb .= '<th style="width: 150px;">Operacja</th>';
      $tb .= '<tr>';
      $tb .= '</thead>';
      //body
      $tb .= '<tbody>';
      for($i = 0; $i < $il; $i++){
      	$tb .= '<tr data-usrid="'.$arr[$i]['id'].'">';
      		$tb .= '<td>'.($i+1).'</td>';
      		$tb .= '<td>'.$arr[$i]['Imie'].'</td>';
      		$tb .= '<td>'.$arr[$i]['Nazwisko'].'</td>';
      		$tb .= '<td>'.$arr[$i]['Data'].'</td>';
      		$tb .= '<td>'.$operacja.'</td>';
      	$tb .= '</tr>';
      }
      $tb .= '</tbody>';
      $tb .= '</table>';
      echo $tb;
    ?>
</div>
<div class="modal fade" id="modalFormularz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Dodaj Rerzysera</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="modal-body" id="snd-rez">
				<div class="form-group row">
				  <label for="inputEmail3" class="col-sm-2 col-form-label">Imie</label>
				  <div class="col-sm-10"> <input type="text" class="form-control" name="imie" placeholder="Imie"></div>
				</div>

				<div class="form-group row">
				  <label for="inputEmail3" class="col-sm-2 col-form-label">Nazwisko</label>
				  <div class="col-sm-10"> <input type="text" class="form-control" name="nazwisko" placeholder="nazwisko"></div>
				</div>

				<div class="form-group row">
				  <label for="inputEmail3" class="col-sm-2 col-form-label">Data urodzenia</label>
				  <div class="col-sm-10"> <input type="text" class="form-control" name="wiekU" placeholder="yyyy-mm-dd"></div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary" value="save changes">
				</div>
			</form>
		</div>
	</div>
</div>
<?php
}
function gat(){

}
function usr(){

}
function inn(){

}

?>
