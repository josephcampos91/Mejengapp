<?php //include("validate.php"); ?>
<?php include("header.php");?> 
<?php include("main_menu.php");?> 
<?php
$msj = "";
  if ($_SESSION['success_op'] == 1) {
     $msj ="Success";
     $color_alert = "green";
  }if($_SESSION['success_op'] == 0){
    $msj = "No se ha manipulado ningun dato";
    $color_alert = "red";
  }
  if($_SESSION['success_op'] == 2){
    $msj = "Ya existe un usuario con este nombre";
    $color_alert = "orange";
  }  
?>
<?php $_SESSION['success_op'] = null; ?>

<span style="background: yellow;color: <?php echo $color_alert;?>;" ><?php echo $msj ; ?></span>
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