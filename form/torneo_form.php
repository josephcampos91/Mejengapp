<?php
session_start();
 if($_SESSION['login'] == null){
header("location: ../form/login_form.php");
}
$value = "3";
$btn = "add";
$msj = "";
  if ($_SESSION['add_op'] == 1) {
    $msj ="Jugador ingresado correctamente";
    $color_alert = "green";
  }if($_SESSION['add_op'] == 0){
    $msj = "No se a ingresado ningun jugador";
    $color_alert = "red";
  }
  if ($_SESSION['edit_op'] == 1) {   
    $msj ="Jugador editado correctamente";
    $color_alert = "green";
    $value = "3";
    $btn = "add";
  }if($_SESSION['edit_op'] == 0){
    $msj = "No se a editado ningun jugador";
    $color_alert = "red";
  }
  if ($_SESSION['delete_op'] == 1) { //delete  
    $msj ="Jugador Eliminado correctamente";
    $color_alert = "green";
    $value = "3";
    $btn = "add";
  }if($_SESSION['delete_op'] == 0){
    $msj = "No se a Eliminado ningun jugador";
    $color_alert = "red";
  }
 if ($_SESSION['edit_op'] == 11) { //update  
    $value = "33";
    $btn = "Edit";
    $value_name = $_SESSION['value_name'];
    $edit = $_SESSION['edit_id'] ;
  } 
   
  $_SESSION['edit_op'] = null;
  $_SESSION['add_op'] = null;
  $_SESSION['value_name'] = null;
  $_SESSION['edit_id'] = null;
  $_SESSION['delete_op'] = null;
  
?>

<?php include("header.php");?> 
<?php include("admin_menu.php");?> 
<?php include("../class/cls_cnx.php");?> 
<?php include("../class/cls_torneo.php"); ?>
<a href="welcome.php">Back</a>
<span style="background: yellow;color: <?php echo $color_alert;?>;" ><?php echo $msj ; ?></span>
<form action="../class/cls_gestor.php" class="form-signin" method = "post">
  <fieldset>
    <legend>Torneo:</legend>
    Name:<br>
    <input type="text"  class="form-control" name="toname" placeholder= "Name" value="" required>
        <input type="text"  class="form-control" name="gestor" hidden value="<?php echo $value; ?>" required>
    	<input type="text"  class="form-control" name="edit" hidden value="<?php echo $edit; ?>">
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
  </fieldset>
</form>
<?php 
  $obj_torneo = new cls_torneo(1);
  $resul = $obj_torneo->show();//consultar
  if ($resul->num_rows > 0) {
    ?>
<div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Torneos (<?php echo $resul->num_rows; ?>)</th>
      </tr>
    </thead>
    <tbody>
    <?php
    while($row = $resul->fetch_assoc()) {
      ?>
      <tr>        
        <td><?php  echo strtoupper($row["nombre"]);  ?></td>
        <td>
        <form action="../class/cls_gestor.php" class="form-signin" method = "post">
          <input type="text"  class="form-control" name="gestor" hidden value="333" required>
          <input type="text"  class="form-control" name="edit_id" hidden value="<?php echo $row["id"]; ?>" required>
          <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo "Delete"; ?></button>
        </form>
        </td>
        <td>
        <form action="../class/cls_gestor.php" class="form-signin" method = "post">
          <input type="text"  class="form-control" name="edit" hidden value="3" required>
          <input type="text"  class="form-control" name="gestor" hidden value="33" required>
          <input type="text"  class="form-control" name="jname" hidden value="<?php  echo $row["nombre"];  ?>" required>
          <input type="text"  class="form-control" name="edit_id" hidden value="<?php echo $row["id"]; ?>" required>
          <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo "Edit"; ?></button>
        </form>
        </td>
      </tr>       
    <?php }   ?>
</tbody>
  </table>
  </div>

    <?php
  }
?>
<?php include("footer.php"); $_SESSION['add_torneo'] = null;

$msj = "";
?> 