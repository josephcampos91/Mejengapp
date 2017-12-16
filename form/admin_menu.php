<hr />
<div class="header clearfix">
	<div class="row form-group">
		<div class="col col-xs-12">
			<nav>
				<ul class="nav nav-pills float-right">
					<li class="nav-item">
						<a class="nav-link active" href="http://localhost:8081/mejengapp/form/welcome.php">
							Mejenga
							<span class="sr-only">(current)</span>
						</a>
					</li>
                    &nbsp;
					<li class="nav-item">
						<a class="nav-link active" href="../form/jugador_form.php">Jugadores</a>
					</li>
					&nbsp;
					<li class="nav-item">
						<a class="nav-link active" href="../form/torneo_form.php">Torneo</a>
					</li>
					<!-- <li class="nav-item">
                      <a class="nav-link" href="../form/partido_form.php">Partido</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="../form/juego_form.php">Juego</a>
                    </li>-->
                    &nbsp;
					<li class="nav-item">
						<a class="nav-link" href="../form/cuenta_form.php">Cuenta</a>
					</li><?php
						 if ($_SESSION["login"]["user_roll"] == 1) {  ?>
					<li class="nav-item ">
						<a class="nav-link" href="../form/admin_form.php">ADMIN</a>
					</li><?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../class/exit.php">Salir</a>
                    </li>
				</ul>
			</nav>

			<h3 class="text-muted">
				<span>
					Bienvenido: <?php echo $_SESSION['login']["user_id"]; ?>
				</span>
			</h3>
		</div>
	</div>
</div>
<hr />