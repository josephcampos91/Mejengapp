
<hr />
<div class="header">
	<div class="row form-group">
		<div class="col col-xs-12">
			<nav>
				<ul class="nav nav-pills float-right">
					<li class="nav-item">
						<a class="nav-link active" href="./">
							Home
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../class/exit.php">Exit</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../form/torneo_form.php">Torneo</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../form/jugador_form.php">Jugadores</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Partido</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../form/cuenta_form.php">Cuenta</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>
<hr />

<h1 class="bg-primary text-white text-center" style="margin-bottom: 0px;">
	<span>
		Bienvenido
		<any style="text-transform:uppercase">
			<?php echo $_SESSION['login']['user_id']; ?>
		</any>
	</span>
</h1>



<div class="clearfix"></div>