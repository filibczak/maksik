<?php
require_once('chars.inc');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>rozpocznij</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script>
		$(function(){
			$('#startGame').submit(function(){
				var ile_par = $('[name="ile_par"').val();
				$.post('run.php',{ile_par: ile_par})
				.done(function(msg){
					$('body').html(msg);
				})
				return false
			});
		});//jq END
	</script>
</head>
<body>

<form id="startGame">
	<fieldset style="width: 150px; margin: 0 auto;">
		<legend>Rozpocznij gre!</legend>
		<p>
			<label><span style="float: left">Ile par:</span><input style="float: right; text-align: center;" type="number" name="ile_par" min="2" max="<?php echo $ile_chars;?>" placeholder="2 - <?php echo $ile_chars;?>" autofocus value="6"></label>
		</p>
		<p>
			<input type="submit" style="width: 100%; margin-top: 15px;" value="Start!">
		</p>
	</fieldset>
</form>

</div>
</body>
</html>