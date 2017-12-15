
<hr />
<div class="header">
	<div class="row form-group">
		<div class="col col-xs-12">
			<nav>
				<ul class="nav nav-pills float-right">
					<li class="nav-item">
						<a class="nav-link" href="<?php print $_SESSION['base_address'] ?>">
							Home
						</a>
					</li>
					&nbsp;&nbsp;&nbsp;
					<li class="nav-item">
						<a class="nav-link" href="<?php print $_SESSION['base_address']."form/login_form.php" ?>">
							Log in
						</a>
					</li>
					&nbsp;&nbsp;&nbsp;
					<li class="nav-item">
						<form class="form-signin" action="<?php print $_SESSION['base_address']."class/cls_gestor.php" ?>" method="post">
							<div class="input-group">


								<input type="text" class="form-control" name="torneo_id" placeholder="Id Torneo" required="" autofocus="" />
								<input type="text" class="form-control" name="gestor" hidden value="33333" required />
								<span class="input-group-btn">
									<button class="btn btn-lg btn-primary btn-block" type="submit">Go!</button>
								</span>

							</div>
						</form>
					</li>
				</ul>
			</nav>
			<h3 class="text-muted">
				<span>
					<?php echo "Mejengapp"; ?>
				</span>
			</h3>
		</div>
	</div>
</div>
<hr />