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
	<script>
		$(function(){
			
			$('.case_int2txt').each(function(){
				var $this = $(this);
				int2txt($this, $this.attr('data-case_val'));
				chil2cat_sum($this);
			});
			
			$('.case_int2txt').change(function(){
				var $this = $(this);
				int2txt($this, $this.val());
				chil2cat_sum($this.parent());
			});
			
		})//jQ END
		
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
		}
		
		function int2txt($this, val){
			val = betterParseInt(val);
			$this.attr('data-case_val', val);
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
			if($this.is('input'))
				$this.val(txt);
			else
				$this.text(txt);
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
		}
	</script>
	
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
				<table class="cat">
					<tr><th colspan="2"><input type="text" value="<?php echo $name; ?>"></th></tr>
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
						<td colspan="2"><input type="button" value="Dodaj pole"></td>
					</tr>
				</table>
				<?php
			}
			?>
		</section>
	</article>
	<article id="wydatki">
		<header>Odchody</header>
		<section></section>
	</article>
	<article id="podsumowanie">
		<header>Podsumowanie</header>
		<section></section>
	</article>
</div>
</body>
</html>