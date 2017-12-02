<?php

session_start();
if($_SESSION['login'] == null){
	header("location: ../form/login_form.php");
}
$value = "2";
$btn = "add";
$msj = "";

if (isset($_SESSION['edit_op']) && $_SESSION['edit_op'] == 1) {
    $msj ="Usuario editado correctamente";
    $color_alert = "green";
    $value = "2";
    $btn = "add";
}

if(isset($_SESSION['edit_op']) && $_SESSION['edit_op'] == 0){
    $msj = "No se a editado el Usuario";
    $color_alert = "red";
}

if (isset($_SESSION['delete_op']) && $_SESSION['delete_op'] == 1) {
    $msj ="Usuario Eliminado correctamente";
    $color_alert = "green";

}
if(isset($_SESSION['delete_op']) && $_SESSION['delete_op'] == 0){
    $msj = "No se a Eliminado ningun Usuario";
    $color_alert = "red";
}
if (isset($_SESSION['edit_op']) && $_SESSION['edit_op'] == 11) { //update
    $value = "22";
    $btn = "Edit";
    $value_name = $_SESSION['value_name'];
    $edit = $_SESSION['edit_id'] ;
}
if (isset($_SESSION['delete_acc']) && $_SESSION['delete_acc'] == 1) {
    $msj ="Cuenta aliminada correctamente";
    $_SESSION['login'] == null;
    $_SESSION['edit_op'] = null;
    $_SESSION['add_op'] = null;
    $_SESSION['value_name'] = null;
    $_SESSION['edit_id'] = null;
    $_SESSION['delete_op'] = null;
    $_SESSION['delete_acc'] = null;
    $_SESSION['edit_acc']= null;
    header("location: ../form/login_form.php");
}
if(isset($_SESSION['delete_acc']) && $_SESSION['delete_acc'] == 0){
    $msj = "No se a editado el Usuario";
    $color_alert = "red";
}
if (isset($_SESSION['delete_acc']) && $_SESSION['edit_acc'] == 1) {
    $msj ="Usuario Editado correctamente";
    $color_alert = "green";
}
if(isset($_SESSION['delete_acc']) && $_SESSION['edit_acc'] == 0){
    $msj = "No se a Editado el Usuario";
    $color_alert = "red";
}

$_SESSION['edit_op'] = null;
$_SESSION['add_op'] = null;
$_SESSION['value_name'] = null;
$_SESSION['edit_id'] = null;
$_SESSION['delete_op'] = null;
$_SESSION['delete_acc'] = null;
$_SESSION['edit_acc']= null;

?>

<?php include("header.php");?>
<?php include("admin_menu.php");?>
<?php include("../class/cls_cnx.php");?>
<?php include("../class/cls_user.php"); ?>
<?php //$value = "2";//agregar ?>
<a href="welcome.php">Back</a>
<span style="background: yellow;color: <?php echo $color_alert;?>;">
	<?php echo $msj ; ?>
</span>

<?php
$obj_user = new cls_user(0,0,0,0, 0);
$resul = $obj_user->show();//consultar
if ($resul->num_rows > 0) {
?>
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>Nick Name</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Email</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
    while($row = $resul->fetch_assoc()) {
            ?>
			<tr>
				<form action="../class/cls_gestor.php" class="form-signin" method="post">
					<td>
						<input type="text" class="form-control" name="user_id" readonly required value="<?php  echo $row["user_id"];  ?>" />
					</td>
					<td>
						<input type="text" class="form-control" name="user_name" required value="<?php  echo $row["user_name"];  ?>" />
					</td>
					<td>
						<input type="text" class="form-control" name="user_last_name" required value="<?php  echo $row["user_last_name"];  ?>" />
					</td>
					<td>
						<input type="text" class="form-control" name="user_email" required value="<?php  echo $row["user_email"];  ?>" />
					</td>
					<input type="text" class="form-control" name="gestor" hidden value="4" required />
					<td>
						<button class="btn btn-lg btn-primary btn-block" type="submit">
							<?php echo "Edit"; ?>
						</button>
					</td>
				</form>
			</tr>
			<?php }   ?>
		</tbody>
	</table>

	<h3>Cambiar clave</h3>
	<form action="../class/cls_gestor.php" class="form-signin" method="post">
		<input type="text" class="form-control" name="gestor" hidden value="4444" required />
		<input type="password" class="form-control" name="pw1" placeholder="Nueva Clave" required />
		<input type="password" class="form-control" name="pw2" placeholder="Repetir Clave" required />
		<button class="btn btn-lg btn-primary btn-block" type="submit">
			<?php echo "Cambiar Clave"; ?>
		</button>
	</form>
	<h3>Deactivate account</h3>
	<form action="../class/cls_gestor.php" class="form-signin" method="post">
		<input type="text" class="form-control" name="gestor" hidden value="444" required />
		<button class="btn btn-lg btn-primary btn-block" type="submit">
			<?php echo "Deactivate account"; ?>
		</button>
	</form>
</div>

<?php
}
?>

<?php include("footer.php"); $_SESSION['add_op'] = null;
	  $msj = "";
?>