<?php
session_start();
if($_SESSION['zalogowany'] == false){
	header('index.php');
}
$login = @$_SESSION['login'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>qw</title>
	<style>
		.opc{
			cursor: pointer;
		}
		.opc:hover{
			color: red;
		}
		input[type=submit]{
			cursor: pointer;
		}
	</style>
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script>
		$(function(){

			//dodanie usera
			$('#userAdd').submit(function(){
				var user = $('input[name="login"]').val();
				var pass = $('input[name="password"]').val();
				$.ajax({
					type: 'POST',
					data: 'data='+user+'||'+pass,
					url: 'dodaj.php',
					success: function(data){
						alert(data);
					},
					error: function(error){
						alert(error);
					}
				});//ajax END
			});

		});//jQ END
	</script>
</head>
<body>
	<form action="admin.php" method="POST"><input type="submit" name="wyloguj" value="Logout"></form>
	<?php echo '<h1>Zalogowano jako '.$login.'!</h1>'; ?>

	<!-- jesli admin to panel -->
		<?php
		if($login == 'admin'){
			echo '<table border="1"><tr><th>lp.</th><th>login</th><th colspan="3">opcje</th></tr>';

			/* edycja */
			$file = 'pasy.txt';
			if(is_readable($file)){
				$pasy = file_get_contents($file);
				$pasy = explode('|||', $pasy);
				array_pop($pasy);
				$ile = count($pasy);
				for($i = 0; $i < $ile; $i++){
					$pasy[$i] = explode('||', $pasy[$i]);
					echo '<tr data-id="'.$i.'">';
						echo '<th>'.($i+1).'.</th>';
						echo '<td>'.$pasy[$i][0].'</td>';
						echo '<td class="opc edit">Edytuj</td>	<td class="opc del">Usuń</td>	<td class="opc blok">Zablokuj</td>';
					echo '</tr>';
				}
			}

			/*dadanie*/
			echo '<tr><th colspan="5">Dodaj</th></tr><form id="userAdd"><tr>';
				echo '<td colspan="2"><input type="text" name="login" placeholder="login"></td>';
				echo '<td colspan="1"><input type="password" name="password" placeholder="password"></td>';
				echo '<td colspan="1"><input type="submit" value="Dodaj"></td>';
				echo '<td colspan="1" id="addUsrAlert"></td>';
			echo '</form></tr>';

			echo '</table>';
		}
		?>
		

</body>
</html>