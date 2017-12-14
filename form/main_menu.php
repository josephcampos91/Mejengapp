<div class="header clearfix">
  <nav>
    <ul class="nav nav-pills float-right">
      <li class="nav-item">
        <a class="nav-link active" href="../form/welcome.php">Home <span class="sr-only">(current)</span></a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="http://bandecosa.com/security/form/login_form.php">Log in</a>
      </li>      
      <li class="nav-item">
        <form class="form-signin" action = "../security/class/cls_gestor.php" method = "post">           
           <input type="text" class="form-control" name="torneo_id" placeholder="Id Torneo" required="" autofocus="" />           
           <input type="text"  class="form-control" name="gestor" hidden value="33333" required>           
           <button class="btn btn-lg btn-primary btn-block" type="submit">Consultar Torneo</button>              
         </form>
      </li>
    </ul>
  </nav>
  <h3 class="text-muted"><span><?php echo "Fifaapp"; ?></span></h3>

</div>