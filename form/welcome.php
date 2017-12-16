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
			<?php for($i = 4; $i <= 12; $i +=4){  ?>
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

<?php 

$jugadores = array("Carlos","Javier", "Manuel", "Jose");
print_r($jugadores);

$partido1 = array();
$partido2 = array();

$vs = rand(1, 3);
array_push($partido1, $jugadores[0], $jugadores[$vs]);
array_splice($jugadores, $vs, 1);
array_splice($jugadores, 0, 1);
array_push($partido2, $jugadores[0], $jugadores[1]);

print_r($partido1);
print_r($partido2);
?>

<?php include("footer.php");?>