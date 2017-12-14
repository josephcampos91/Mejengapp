<div class="header clearfix">
  <nav>
    <ul class="nav nav-pills float-right">
      <li class="nav-item">
        <a class="nav-link active" href="http://bandecosa.com/security/form/welcome.php">Home <span class="sr-only">(current)</span></a>
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
      <!-- <li class="nav-item">
        <a class="nav-link" href="../form/partido_form.php">Partido</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="../form/juego_form.php">Juego</a>
      </li>-->
      <li class="nav-item">
        <a class="nav-link" href="../form/cuenta_form.php">Cuenta</a>
      </li>
      <?php
      if ($_SESSION["login"]["user_roll"] == 1) {  ?>
      <li class="nav-item">
        <a class="nav-link" href="../form/admin_form.php">ADMIN</a>
      </li>
       <?php }  ?>
    </ul>
  </nav>
  <h3 class="text-muted"><span>User: <?php echo $_SESSION['login']['user_id']; ?></span></h3>

</div>