<?php

//include("validate.php");
include("header.php");
include("admin_menu.php");
include("../class/cls_cnx.php");
include("../class/cls_jugador.php");

$value = "2";
$btn = "add";
$msj = "";
$value_name = "";

if($_SESSION['success_op'] == 0){
    $msj = "No se ha manipulado ningun dato";
    $color_alert = "red";
}
if ($_SESSION['success_op'] == 1) {
    $msj ="Success";
    $color_alert = "green";
}
if($_SESSION['success_op'] == 2){
    $msj = "Ya existe un jugador con este nombre";
    $color_alert = "orange";
}
if ($_SESSION['success_op'] == 11) { //update
    $value = "22";
    $btn = "Edit";
    $value_name = $_SESSION['value_name'];
    $edit = $_SESSION['edit_id'] ;
}

$_SESSION['success_op'] = null;

?>

<h3>Mantenimiento Jugadores</h3>
<span style="background: yellow;color: <?= $color_alert ?>;">
	<?= $msj ?>
</span>
<form action="../class/cls_gestor.php" class="form-signin" method="post">
	<fieldset>
		<input type="text" class="form-control" name="jname" placeholder="Name" value="<?= $value_name ?>" required />
		<input type="text" class="form-control" name="gestor" hidden value="<?= $value ?>" required />
		<input type="text" class="form-control" name="edit" hidden value="<?= $edit ?>" />
		<br />
		<br />
		<button class="btn btn-lg btn-primary btn-block" type="submit">
			<?= $btn ?>
		</button>
	</fieldset>
</form>

<?php
$obj_jugador = new cls_jugador(1);
$resul = $obj_jugador->show();//consultar
if ($resul->num_rows > 0) {
?>
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>
					Jugadores (<?= $resul->num_rows ?>)
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
    while($row = $resul->fetch_assoc()) {
            ?>
			<tr>
				<td>
					<?= strtoupper($row["nombre"]) ?>
				</td>
				<td>
					<form action="../class/cls_gestor.php" class="form-signin" method="post">
						<input type="text" class="form-control" name="gestor" hidden value="222" required />
						<input type="text" class="form-control" name="edit_id" hidden value="<?php echo $row["id"]; ?>" required />
						<button class="btn btn-lg btn-primary btn-block" type="submit"> Delete </button>
					</form>
				</td>
				<td>
					<form action="../class/cls_gestor.php" class="form-signin" method="post">
						<input type="text" class="form-control" name="gestor" hidden value="2222" required />
						<input type="text" class="form-control" name="jname" hidden value="<?php  echo $row["nombre"];  ?>" required />
						<input type="text" class="form-control" name="edit_id" hidden value="<?php echo $row["id"]; ?>" required />
						<button class="btn btn-lg btn-primary btn-block" type="submit"> Edit </button>
					</form>
				</td>
			</tr>
			<?php }   ?>
		</tbody>
	</table>
</div>

<?php
}
?>

<?php include("footer.php"); $_SESSION['add_op'] = null;
	  $msj = "";
?>