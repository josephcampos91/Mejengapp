<?php //include("validate.php"); ?>
<?php include("header.php");?> 
<?php include("admin_menu.php");?> 
<?php include("../class/cls_cnx.php");?> 
<?php include("../class/cls_user.php"); ?>

<?php
$msj = "";
  if($_SESSION['success_op'] == 0){
    $msj = "No se ha manipulado ningun dato";
    $color_alert = "red";
  }
  if ($_SESSION['success_op'] == 1) {   
    $msj ="Success";
    $color_alert = "green";
  }
  if ($_SESSION['success_op'] == 3) {   
    $msj ="Success";
    header("location: ../form/login_form.php");
  }
  
?>
<?php $_SESSION['success_op'] = null; ?>
<h3>Mantenimiento Cuenta</h3>
<span style="background: yellow;color: <?php echo $color_alert;?>;" ><?php echo $msj ; ?></span>

<?php 
  $obj_user = new cls_user($_SESSION['login']['id'],1,1,1,1);
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
      <form action="../class/cls_gestor.php" class="form-signin" method = "post">        
        <td><input type="text"  class="form-control" name="user_id"  readonly   required value="<?php  echo $row["user_id"];  ?>" ></td>
        <td><input type="text"  class="form-control" name="user_name"   required value="<?php  echo $row["user_name"];  ?>"></td>
        <td><input type="text"  class="form-control" name="user_last_name"    required value="<?php  echo $row["user_last_name"];  ?>"></td>
        <td><input type="text"  class="form-control" name="user_email"    required value="<?php  echo $row["user_email"];  ?>"></td>
        <input type="text"  class="form-control" name="gestor" hidden value="4" required>
          <td><button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo "Edit"; ?></button></td>
        </form>
      </tr>       
    <?php }   ?>
</tbody>
  </table>

  <h3>Cambiar clave</h3>
  <form action="../class/cls_gestor.php" class="form-signin" method = "post">
          <input type="text"  class="form-control" name="gestor" hidden value="4444" required>
          <input type="password"  class="form-control" name="pw1" placeholder="Nueva Clave"required>
          <input type="password"  class="form-control" name="pw2"   placeholder="Repetir Clave"required>
          <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo "Cambiar Clave"; ?></button>
  </form>
  <h3>Deactivate account</h3>
  <form action="../class/cls_gestor.php" class="form-signin" method = "post">
          <input type="text"  class="form-control" name="gestor" hidden value="444" required>
          <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo "Deactivate account"; ?></button>
        </form>
  </div>

    <?php
  }
?>

<?php include("footer.php"); $_SESSION['add_op'] = null; 
$msj = "";
?> 