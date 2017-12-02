<?php

/*session_start();
if($_SESSION['login'] == null){
header("location: ../form/login_form.php");
}
 */
session_start();
$msj = "";
if (isset($_SESSION['add_user']) && $_SESSION['add_user']== 1) {
	$msj ="Usuario ingresado correctamente";
	$color_alert = "green";
}
if(isset($_SESSION['add_user']) && $_SESSION['add_user'] == 0){
    $msj = "No se a ingresado ningun usuario";
    $color_alert = "red";
}
$_SESSION['add_user'] = null;

?>

<?php include("header.php");?>
<?php include("main_menu.php");?>
<a href="welcome.php">Back</a>
<span style="background: yellow;color: <?php echo $color_alert;?>;">
	<?php echo $msj ; ?>
</span>
<form action="../class/cls_gestor.php" class="form-signin" method="post">
	<fieldset>
		<legend>Personal information:</legend>
		First name:
		<br />
		<input type="text" class="form-control" name="firstname" placeholder="Name" value="" required />
		<br />
		Last name:
		<br />
		<input type="text" class="form-control" name="lastname" placeholder="Last Name" value="" required />
		<br />
		Nick name:
		<br />
		<input type="text" class="form-control" name="nickname" placeholder="Nick Name" value="" required />
		<br />
		Password:
		<br />
		<input type="password" class="form-control" name="password" placeholder="Password" value="" required />
		<br />
		Email:
		<br />
		<input type="text" class="form-control" name="email" placeholder="Email" value="" required />
		<input type="text" class="form-control" name="gestor" hidden value="1" required />
		<br />
		<br />
		<button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
	</fieldset>
</form>

<?php include("footer.php"); $_SESSION['add_user'] = null;?>