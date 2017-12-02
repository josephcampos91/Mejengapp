<?php include("header.php");?>
<?php include("main_menu.php");?>

<?php

if (isset($_GET['error']) &&  $_GET['error'] == 1) {
	$error = "Usuario o clave Incorrecta";

}else{
	$error = "";
}
?>

		<div class="wrapper">
			<div class="col col-xs-12">
				<br />
				<form class="form-signin" action="../class/cls_gestor.php" method="post">
					<div style="font-size:11px; color:#cc0000; margin-top:10px">
						<?php echo $error; ?>
					</div>
					<div class="form-group">
						<label for="user_id">Usuario</label>
						<input type="text" class="form-control" id="user_id" name="user_id" placeholder="Usuario" required="" autofocus="" />
					</div>
					
                    <div class="form-group">
						<label for="user_pass">Contraseña</label>
						<input type="password" class="form-control" id="user_pass" name="user_pass" placeholder="Contrase&nacute;a" required="" />
					</div>
					
					<input type="text" class="form-control" name="gestor" hidden value="0" required />
					<label class="checkbox">
						<input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe" />Remember me
					</label>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
					<div class="etc-login-form">
						<p>
							forgot your password?
							<a href="#">click here</a>
						</p>
						<p>
							new user?
							<a href="user_form.php">create new account</a>
						</p>
					</div>
				</form>
			</div>
		</div>
<?php include("footer.php");?>