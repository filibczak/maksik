<?php
require_once('../../php/scripts.php');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Krzysztof Kukiz kukizk@gmail.com">
	<meta name="Keywords" content="">
	<meta name="Description" content="">
	<title>Miesięczny Budżet Domowy</title>
	<link href="" rel="icon" type="image/x-icon">
	<link rel="stylesheet" href="bin/style/screen.css">
	<script src="../../script/jq.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);
		var przy_sum = 0;
		var wyd_sum = 0;
		var ruznica = 0;
		$(function(){
			
			$('.case_int2txt').each(function(){
				var $this = $(this);
				int2txt($this, $this.attr('data-case_val'));
				chil2cat_sum($this);
				main_sum()
			});
			
			$('.case_int2txt').change(function(){
				var $this = $(this);
				val_update($this);
				int2txt($this, $this.val());
				chil2cat_sum($this.parent());
				main_sum()
			});
			
			$('.case-name').change(function(){
				var $this = $(this);
				name_update($this);
			});
			
			$('.cat-name').change(function(){
				var id = $(this).parent().parent().parent().parent().attr('data-id');
				var prz_wyd = $(this).parent().parent().parent().parent().parent().parent().attr('id') == 'przychody' ? 'p':'w';
				var name = $(this).val();
				$.post('bin/scripts/scripts.php',{
					op: 'cat_name_update',
					id: id,
					pw: prz_wyd,
					name: name
				})/*.done(function(data){
					alert(data);
				})*/;
			});
			
			$('.add-chil').click(function(){
				var id = $(this).parent().parent().parent().parent().attr('data-id');
				var prz_wyd = $(this).parent().parent().parent().parent().parent().parent().attr('id') == 'przychody' ? 'p':'w';
				$.post('bin/scripts/scripts.php',{
					op: 'add_chil',
					id: id,
					pw: prz_wyd
				}).done(function(data){
					//alert(data);
					location.reload();
				});
			})
			
			$('.add-cat').click(function(){
				var prz_wyd = $(this).parent().parent().attr('id') == 'przychody' ? 'p':'w';
				$.post('bin/scripts/scripts.php',{
					op: 'add_cat',
					pw: prz_wyd
				}).done(function(data){
					//alert(data);
					location.reload();
				});
			});
			
			$('#piechart > div > div > div > svg > rect').change(function(){
				bgcinh();
			});
			
		})//jQ END
		
		function main_sum(){
			przy_sum = 0;
			wyd_sum = 0;
			$('#przychody td.sum').each(function(){
				przy_sum += (betterParseInt($(this).attr('data-case_val')))*1;
			});
			$('#wydatki td.sum').each(function(){
				wyd_sum += (betterParseInt($(this).attr('data-case_val')))*1;
			});
			ruznica = przy_sum - wyd_sum;
			
			$('#przychody footer').text(int2val(betterParseInt(przy_sum)));
			$('#wydatki footer').text(int2val(betterParseInt(wyd_sum)));
			$('#podsumowanie footer').text(int2val(betterParseInt(ruznica)));
			
			if(ruznica > 0){
				$('#podsumowanie footer').css('color', 'green');
			}else if(ruznica < 0){
				$('#podsumowanie footer').css('color', 'red');
			}else{
				$('#podsumowanie footer').css('color', 'orange');
			}
			
		}
		
		function name_update($this){
			var id = $this.parent().parent().attr('data-id');
			var prz_wyd = $this.parent().parent().parent().parent().parent().parent().attr('id') == 'przychody' ? 'p':'w';
			var name = $this.val();
			$.post('bin/scripts/scripts.php',{
				op: 'name_update',
				id: id,
				pw: prz_wyd,
				name: name
			})/*.done(function(data){
				alert(data);
			})*/;
		}//name_update END
		
		function val_update($this){
			var id = $this.parent().parent().attr('data-id');
			var prz_wyd = $this.parent().parent().parent().parent().parent().parent().attr('id') == 'przychody' ? 'p':'w';
			var val = betterParseInt($this.val());
			$.post('bin/scripts/scripts.php',{
				op: 'val_update',
				id: id,
				pw: prz_wyd,
				val: val
			})/*.done(function(data){
				alert(data);
			})*/;
		}//val_update END
		
		function chil2cat_sum($this){
			$this = $this.parent().parent();
			var sum = 0;
			$this.children('tr').each(function(){
				$(this).children('td').each(function(){
					sum += (betterParseInt($(this).children('.case-val').attr('data-case_val')))*1;
				});
			});
			
			var $sum = $this.children('.sum').children('.sum');
			$sum.attr('data-case_val', sum);
			int2txt($sum, sum);
		}//chil2cat_sum END
		
		function int2txt($this, val){
			val = betterParseInt(val);
			$this.attr('data-case_val', val);
			txt = int2val(val);
			if($this.is('input'))
				$this.val(txt);
			else
				$this.text(txt);
		}//int2txt END
		
		function int2val(val){
			var dl = val.length;
			var txt = '';
			var co3 = 3;
			for(i = dl-1; i >= 0; i--){
				co3--;
				txt = val[i] + txt;
				if(!co3%3){
					co3 = 3;
					txt = ' ' + txt;
				}
			}
			if(txt == '') txt = '0';
			txt += ' zł';
			return txt;
		}
		
		function betterParseInt(txt){
			txt += '';
			var dl = txt.length;
			var number = '';
			for(i = 0; i < dl; i++){
				switch(txt[i]){
					case '0':
					case '1':
					case '2':
					case '3':
					case '4':
					case '5':
					case '6':
					case '7':
					case '8':
					case '9':
						number += txt[i];
						break;
					default: continue;
						break;
				}
			}
			parseInt(number);
			return number;
		}//betterParseInt END

		function drawChart() {

			var data = google.visualization.arrayToDataTable([
				['Task', 'Hours per Day']
				<?php
				$sql = "SELECT cat_wyd_name name, SUM(value) value FROM bd_chil_wyd NATURAL JOIN bd_cat_wyd GROUP BY cat_wyd_name;";
				$arr = sql2array($sql);
				foreach($arr as $a){
					echo ",
					['".($a['name'])."', ".($a['value'])."]";
				}
				?>
			]);

			var options = {
				title: 'Wydatki wdg. Kategorji',
				backgroundColor: 'inherit'
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart'));

			chart.draw(data, options);
			bgcinh()
		}
		
		function bgcinh(){
			$('#piechart div div div svg rect').attr('fill', 'rgba(0,0,0,0)');
		}
		
	</script>
	<style type="text/css">
		article > section{
			padding-bottom: 150px;
		}
	</style>
	
</head>
<body>
<div id="box">
	<article id="przychody">
		<header>Przychody</header>
		<section>
			<?php
			$sql = "SELECT * FROM bd_cat_przy";
			$cat = sql2array($sql);
			foreach($cat as $c){
				$id = $c['cat_przy_id'];
				$name = $c['cat_przy_name'];
				?>
				<table class="cat" data-id="<?php echo $id; ?>">
					<tr><th colspan="2"><input type="text" class="cat-name" value="<?php echo $name; ?>"></th></tr>
					<?php
					$sql = "SELECT * FROM bd_chil_przy WHERE cat_przy_id='$id'";
					$chil = sql2array($sql);
					foreach($chil as $ch){
						$id = $ch['chil_przy_id'];
						$name = $ch['name'];
						$value = $ch['value'];
						?>
						<tr data-id="<?php echo $id; ?>">
							<th><input type="text" class="case-name" value="<?php echo $name; ?>"></th>
							<td><input type="text" class="case-val case_int2txt" data-case_val="<?php echo $value; ?>" value=""></td>
						</tr>
						<?php
					}
					?>
					<tr class="sum">
						<th class="noHover">Razem</th>
						<td class="noHover sum case_int2txt" data-case_val="0"></td>
					</tr>
					<tr>
						<td colspan="2"><input type="button" class="add-chil" value="Dodaj pole"></td>
					</tr>
				</table>
				<?php
			}
			?>
			<div class="cat add-cat">Dodaj kategorje</div>
		</section>
		<footer class="przy-sum">34</footer>
	</article>
	<article id="wydatki">
		<header>Wydatki</header>
		<section>
			<?php
			$sql = "SELECT * FROM bd_cat_wyd";
			$cat = sql2array($sql);
			foreach($cat as $c){
				$id = $c['cat_wyd_id'];
				$name = $c['cat_wyd_name'];
				?>
				<table class="cat" data-id="<?php echo $id; ?>">
					<tr><th colspan="2"><input type="text" class="cat-name" value="<?php echo $name; ?>"></th></tr>
					<?php
					$sql = "SELECT * FROM bd_chil_wyd WHERE cat_wyd_id='$id'";
					$chil = sql2array($sql);
					foreach($chil as $ch){
						$id = $ch['chil_wyd_id'];
						$name = $ch['name'];
						$value = $ch['value'];
						?>
						<tr data-id="<?php echo $id; ?>">
							<th><input type="text" class="case-name" value="<?php echo $name; ?>"></th>
							<td><input type="text" class="case-val case_int2txt" data-case_val="<?php echo $value; ?>" value=""></td>
						</tr>
						<?php
					}
					?>
					<tr class="sum">
						<th class="noHover">Razem</th>
						<td class="noHover sum case_int2txt" data-case_val="0"></td>
					</tr>
					<tr>
						<td colspan="2"><input type="button" class="add-chil" value="Dodaj pole"></td>
					</tr>
				</table>
				<?php
			}
			?>
			<div class="cat add-cat">Dodaj kategorje</div>
		</section>
		<footer class="wyd-sum">34</footer>
	</article>
	<article id="podsumowanie">
		<header>Podsumowanie</header>
		<section><div id="piechart" style="width: 450px; height: 250px;"></div></section>
		<footer class="ruznica">34</footer>
	</article>
</div>
</body>
</html>