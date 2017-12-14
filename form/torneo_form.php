<?php include("validate.php"); ?>
<?php include("header.php");?> 
<?php include("admin_menu.php");?> 
<?php include("../class/cls_cnx.php");?> 
<?php include("../class/cls_torneo.php"); ?>

<?php
  $value = "3";
  $btn = "add";
  $msj = "";
  if($_SESSION['success_op'] == 0){
    $msj = "No se ha manipulado ningun dato";
    $color_alert = "red";
  }
  if ($_SESSION['success_op'] == 1) {   
    $msj ="Success";
    $color_alert = "green";  
  }
  if($_SESSION['success_op'] == 2){
    $msj = "Ya existe un torneo con este nombre";
    $color_alert = "orange";
  }
  if ($_SESSION['success_op'] == 3) {
    $msj ="Este torneo aun no se juega";
    $color_alert = "orange";
  } 
  if ($_SESSION['success_op'] == 11) { //update  
    $value = "33";
    $btn = "Edit";
    $value_name = $_SESSION['value_name'];
    $edit = $_SESSION['edit_id'] ;
  }  
?>
<?php $_SESSION['success_op'] = null; ?>
<h3>Mantenimiento Torneos</h3>
<span style="background: yellow;color: <?php echo $color_alert;?>;" ><?php echo $msj ; ?></span>
<form action="../class/cls_gestor.php" class="form-signin" method = "post">
  <fieldset>
    <input type="text"  class="form-control" name="jname" placeholder= "Name" value="<?php echo $value_name;?>" required>
    <input type="text"  class="form-control" name="gestor" hidden value="<?php echo $value; ?>" required>
    <input type="text"  class="form-control" name="edit" hidden value="<?php echo $edit; ?>">
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo $btn; ?></button>
  </fieldset>
</form>
<?php 
  $obj_torneo = new cls_torneo(1,1);
  $resul = $obj_torneo->show();//consultar
  
  if ($resul->num_rows > 0) {
    ?>
<div class="table-responsive">          
  <table class="table" class="table table-inverse">
    <thead>
      <tr>
        <th>Torneos (<?php echo $resul->num_rows; ?>)</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
    while($row = $resul->fetch_assoc()) {
      $fk_torneo_id =$row["id"];
      if ($row['turno'] == 0) {
         $value_torneo_ini = 55;
         $btn_torneo_ini = "INICIAR";
         $btn_style = "success";
      }else{
        $value_torneo_ini = 555;
        $btn_torneo_ini = "Detalle";
        $btn_style = "warning";
      }
      ?>
      <tr>        
        <th><?php  echo strtoupper($row["nombre"]);  ?></th>
        <td></td>
      </tr>
      <?php 
      $resul_equipo_jugador = $obj_torneo->show_equipo_jugador($fk_torneo_id);//consultar
      if ($resul_equipo_jugador->num_rows > 0) {
          while($row1 = $resul_equipo_jugador->fetch_assoc()) {
      ?>
      <tr>
        <td><?php  echo strtoupper($row1["junom"]);  ?></td>
        <td><?php  echo strtoupper($row1["quinom"]);  ?></td>
      </tr>
      <?php } 
      }else{
        ?>

        <?php
      }
      ?>
      <tr>
        <td colspan="2">
          <form action="../class/cls_gestor.php" class="form-signin" method = "post">
            <input type="text"  class="form-control" name="gestor" hidden value="<?php echo $value_torneo_ini;?>" required>
            <input type="text"  class="form-control" name="edit_id" hidden value="<?php echo $fk_torneo_id; ?>" required>
            <button class="btn btn-lg btn-<?php echo $btn_style; ?> btn-block" type="submit"><?php echo $btn_torneo_ini; ?></button>
          </form>
        </td>
      </tr>
      <tr>
        <td>
          <form action="../class/cls_gestor.php" class="form-signin" method = "post">
            <input type="text"  class="form-control" name="gestor" hidden value="333" required>
            <input type="text"  class="form-control" name="edit_id" hidden value="<?php echo $torneo_id; ?>" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo "Delete"; ?></button>
          </form>
          </td>
          <td>
          <form action="../class/cls_gestor.php" class="form-signin" method = "post">
            <input type="text"  class="form-control" name="gestor" hidden value="3333" required>
            <input type="text"  class="form-control" name="jname" hidden value="<?php  echo $row["nombre"];  ?>" required>
            <input type="text"  class="form-control" name="edit_id" hidden value="<?php echo $torneo_id; ?>" required>
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
<?php include("footer.php"); $_SESSION['add_op'] = null;

$msj = "";
?> 