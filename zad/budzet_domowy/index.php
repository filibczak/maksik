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
				int2txt($(this), $(this).attr('data-case_val'));
			});
			
		})//jQ END
		function int2txt($this, val){
			parseInt(val);
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
			txt += ' zł';
			$this.val(txt);
			$this.text(txt);
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
				$sum = $c['cat_przy_sum'];
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
							<td><input type="text" class="case-valu case_int2txt" data-case_val="<?php echo $value; ?>" value=""></td>
						</tr>
						<?php
					}
					?>
					<tr>
						<th class="noHover">Razem</th>
						<td class="noHover case_int2txt" data-case_val="<?php echo $sum; ?>" value=""></td>
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