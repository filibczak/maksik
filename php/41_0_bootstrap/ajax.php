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
?>
<div class="container page-header"> <h1>Wyporzyczenia</h1> </div>
 <div class="container panel panel-default">
  <button type="button" class="btn btn-primary glyphicon glyphicon-plus" data-toggle="modal" data-target="#modalFormularz" style="float: right"> Wyporzycz</button>
    <?php
      include('../scripts.php');
      $operacja = '<button type="button" class="btn btn-default glyphicon glyphicon-cog edit edit-kli" aria-label="Left Align"> Edytuj</button>';
      $sql = "SELECT wypID id, wypDataWyp  wyp, wypDataOddania odt, CONCAT_WS(' ', klImie, klNazwisko) kln, filTytul tytul FROM filWypozyczenia NATURAL JOIN filKlient NATURAL JOIN filFilmy";
      $arr = sql2array($sql);
      $il = count($arr);
      $tb = '';
      /*  tworzenie tabeli  */
      $tb .= '<table class="table">';
      //head
      $tb .= '<thead>';
      $tb .= '<tr>';
        $tb .= '<th>lp.</th>';
        $tb .= '<th>Klient</th>';
        $tb .= '<th>Tytuł</th>';
        $tb .= '<th>Wyporzyczona</th>';
        $tb .= '<th>Oddano</th>';
        $tb .= '<th style="width: 150px;">Operacja</th>';
      $tb .= '<tr>';
      $tb .= '</thead>';
      //body
      $tb .= '<tbody>';
      for($i = 0; $i < $il; $i++){
        $tb .= '<tr data-usrid="'.$arr[$i]['id'].'">';
          $tb .= '<td>'.($i+1).'</td>';
          $tb .= '<td>'.$arr[$i]['kln'].'</td>';
          $tb .= '<td>'.$arr[$i]['tytul'].'</td>';
          $tb .= '<td>'.$arr[$i]['wyp'].'</td>';
          $tb .= '<td>'.$arr[$i]['odt'].'</td>';
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
        <h5 class="modal-title" id="exampleModalLabel">Wyporzycz</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" id="snd-wyp">

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Klient</label>
          <div class="col-sm-10"> 
            <select class="form-control" name="kln">
              <option>Wybierz klienta</option>
              <?php
                $sql = "SELECT klID id, CONCAT_WS(' ', klImie, klNazwisko) kln FROM filKlient;";
                $arr = sql2array($sql);
                foreach ($arr as $key => $arr) {
                  echo '<option value="'.$arr['id'].'">'.$arr['kln'].'</option>';
                }
              ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Film</label>
          <div class="col-sm-10"> 
            <select class="form-control" name="flm">
              <option>Wybierz film</option>
              <?php
                $sql = "SELECT filID id, filTytul flm FROM filFilmy;";
                $arr = sql2array($sql);
                foreach ($arr as $key => $arr) {
                  echo '<option value="'.$arr['id'].'">'.$arr['flm'].'</option>';
                }
              ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Wyporzyczono</label>
          <div class="col-sm-10"><input class="form-control" type="date" name="wyp" value="<?php echo date('Y-m-d'); ?>"></div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Oddano</label>
          <div class="col-sm-10"><input class="form-control" type="date" name="odd"> </div>
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
function flm(){
?>
<div class="container page-header"> <h1>Filmy <small>Twoja bibliotek ruchomych obrazów</small></h1> </div>
 <div class="container panel panel-default">
  <button type="button" class="btn btn-primary glyphicon glyphicon-plus" data-toggle="modal" data-target="#modalFormularz" style="float: right"> Dodaj Film</button>
    <?php
      include('../scripts.php');
      $operacja = '<button type="button" class="btn btn-default glyphicon glyphicon-cog edit edit-flm" aria-label="Left Align"> Edytuj</button>';
      $sql = "SELECT filID id, filTytul tytul, CONCAT_WS(' ', rezImie, rezNazwisko) rezyser, GatNazwa gatunek, filRokProd rokProdukcji,  filCzasTr czasTrwania FROM filFilmy NATURAL JOIN filRezyser NATURAL JOIN filGatunek";
      $arr = sql2array($sql);
      $il = count($arr);
      $tb = '';
      /*  tworzenie tabeli  */
      $tb .= '<table class="table">';
      //head
      $tb .= '<thead>';
      $tb .= '<tr>';
        $tb .= '<th>lp.</th>';
        $tb .= '<th>Tytuł</th>';
        $tb .= '<th>Reżyser</th>';
        $tb .= '<th>Gatunek</th>';
        $tb .= '<th>Rok Produkcji</th>';
        $tb .= '<th>Czas trwania</th>';
        $tb .= '<th style="width: 150px;">Operacja</th>';
      $tb .= '<tr>';
      $tb .= '</thead>';
      //body
      $tb .= '<tbody>';
      for($i = 0; $i < $il; $i++){
        $tb .= '<tr data-usrid="'.$arr[$i]['id'].'">';
          $tb .= '<td>'.($i+1).'</td>';
          $tb .= '<td>'.$arr[$i]['tytul'].'</td>';
          $tb .= '<td>'.$arr[$i]['rezyser'].'</td>';
          $tb .= '<td>'.$arr[$i]['gatunek'].'</td>';
          $tb .= '<td>'.$arr[$i]['rokProdukcji'].'</td>';
          $tb .= '<td>'.$arr[$i]['czasTrwania'].'</td>';
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
        <h5 class="modal-title" id="exampleModalLabel">Dodaj Film</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" id="snd-flm">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Tytuł</label>
          <div class="col-sm-10"> <input type="text" class="form-control" name="tytul" placeholder="Wpisz tytuł"></div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Reżyser</label>
          <div class="col-sm-10"> 
            <select class="form-control" name="rez" id=".select-rez">
              <option>Wybierz reżysera</option>
              <?php
                $sql = "SELECT rezID id, CONCAT_ws(' ', rezImie, rezNazwisko) rezyser FROM filRezyser;";
                $arr = sql2array($sql);
                foreach ($arr as $key => $arr) {
                  echo '<option value="'.$arr['id'].'">'.$arr['rezyser'].'</option>';
                }
              ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Gatunek</label>
          <div class="col-sm-10"> 
            <select class="form-control" name="gat">
              <option>Wybierz gatunek</option>
              <?php
                $sql = "SELECT gatID id, gatNazwa gat FROM filGatunek;";
                $arr = sql2array($sql);
                foreach ($arr as $key => $arr) {
                  echo '<option value="'.$arr['id'].'">'.$arr['gat'].'</option>';
                }
              ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Rok prudukcji</label>
          <div class="col-sm-10"> <input type="number" class="form-control" name="rokProdukcji" placeholder="1337"></div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Czas trwania</label>
          <div class="col-sm-10"> <input type="time" class="form-control" name="czasTrwania" placeholder="Czas trwania"></div>
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
?>
<div class="container page-header"> <h1>Gatunki</h1> </div>
 <div class="container panel panel-default">
	<button type="button" class="btn btn-primary glyphicon glyphicon-plus" data-toggle="modal" data-target="#modalFormularz" style="float: right"> Dodaj Gatunek</button>
    <?php
      include('../scripts.php');
      $operacja = '<button type="button" class="btn btn-default glyphicon glyphicon-cog edit edit-gat" aria-label="Left Align"> Edytuj</button>';
      $sql = "SELECT gatID id, gatNazwa Nazwa FROM filGatunek";
      $arr = sql2array($sql);
      $il = count($arr);
      $tb = '';
      /*	tworzenie tabeli	*/
      $tb .= '<table class="table">';
      //head
      $tb .= '<thead>';
      $tb .= '<tr>';
      	$tb .= '<th>lp.</th>';
      	$tb .= '<th>nazwa gatunku</th>';
      	$tb .= '<th style="width: 150px;">Operacja</th>';
      $tb .= '<tr>';
      $tb .= '</thead>';
      //body
      $tb .= '<tbody>';
      for($i = 0; $i < $il; $i++){
      	$tb .= '<tr data-usrid="'.$arr[$i]['id'].'">';
      		$tb .= '<td>'.($i+1).'</td>';
      		$tb .= '<td>'.$arr[$i]['Nazwa'].'</td>';
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
				<h5 class="modal-title" id="exampleModalLabel">Dodaj Gatunek</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="modal-body" id="snd-gat">

				<div class="form-group row">
				  <label for="inputEmail3" class="col-sm-2 col-form-label">Nazwa</label>
				  <div class="col-sm-10"> <input type="text" class="form-control" name="nazwa" placeholder="Nazwa"></div>
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
function usr(){

}
function inn(){

}

?>
