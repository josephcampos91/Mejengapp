
<?php //include("validate.php"); ?>
<?php include("header.php");?> 
<?php include("admin_menu.php");?> 
<?php include("../class/cls_cnx.php");?> 
<?php include("../class/cls_admin.php"); ?>
<?php
$msj = "";
  if ($_SESSION['success_op'] == 1) {   
    $msj ="Success";
    $color_alert = "green";
  }if($_SESSION['success_op'] == 0){
    $msj = "No se ha manipulado ningun dato";
    $color_alert = "red";
  }     
?>
<?php $_SESSION['success_op'] = null; ?>
<h3>Mantenimiento Admin</h3>
<span style="background: yellow;color: <?php echo $color_alert;?>;" ><?php echo $msj ; ?></span>

<?php 
  $obj_admin = new cls_admin(1,1,1);
  $resul = $obj_admin->show();//consultar
  if ($resul->num_rows > 0) {
    ?>
<div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Usuarios (<?php echo $resul->num_rows; ?>)</th>
      </tr>
      <tr>        
        <th>Nick Name</th>
        <th>Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>Roll</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
    while($row = $resul->fetch_assoc()) {
      ?>
      <tr>        
        <td><?php  echo strtoupper($row["user_id"]);  ?></td>
        <td><?php  echo strtoupper($row["user_name"]);  ?></td>
        <td><?php  echo strtoupper($row["user_last_name"]);  ?></td>
        <td><?php  echo strtoupper($row["user_email"]);  ?></td>
      <form action="../class/cls_gestor.php" class="form-signin" method = "post">
        <td><?php  //echo strtoupper($row["user_status"]);  ?>
          <?php
          if ($row["user_status"] == 1) {$activo = "selected";}else{$inactivo = "selected";} 
          ?>
          <select class="form-control" name="ad_status">
            <option value="1" <?php echo  $activo; ?> >Activo</option>
            <option value="0" <?php echo  $inactivo; ?> >Inactivo</option>
          </select>
          <?php $activo = " "; $inactivo = "";?> 
        </td>
        <td><?php  //echo strtoupper($row["user_roll"]);  ?>
          <?php
          if ($row["user_roll"] == 1) {$admin = "selected";}else{$regular = "selected";} 
          ?>
          <select class="form-control" name="ad_roll">
            <option value="0" <?php echo  $regular; ?> >Regular</option>
            <option value="1" <?php echo  $admin; ?> >Admin</option>
          </select>
          <?php $regular = " "; $admin = "";?>
        </td>
        <td>
        
          <input type="text"  class="form-control" name="gestor" hidden value="9" required>
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

<?php include("footer.php"); $_SESSION['add_op'] = null; 
$msj = "";
?> 