<?php
//include("validate.php");
include("header.php");
include("admin_menu.php");
?>

<div class="jumbotron">
	<h1 class="display-3">Mejengapp</h1>
	<hr />
	<p class="lead">Cuantos amigos van a participar en la mejenga? </p>
	<form action="<?php print $_SESSION['base_address'] ?>class/cls_gestor.php" class="form-signin" method = "post">
		<fieldset>

		<select class="form-control" name="num_jugadores" required>
			<?php for($i = 2; $i <= 12; $i++){  ?>
			<option value="<?= $i ?>" <?=isset($_SESSION['num_jugadores']) && $_SESSION['num_jugadores'] == $i ?' selected="selected"' : '';?> ><?= $i ?> jugadores</option>
			<?php } ?>
		</select>
        <br>
        <br>
		<input type="text"  class="form-control" name="gestor" hidden value="55555" required>
		
		<button class="btn btn-lg btn-success" type="submit">Crear Mejenga</button>

		</fieldset>
	</form>
</div>

<?php include("footer.php");?>