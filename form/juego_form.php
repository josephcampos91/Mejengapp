<?php //include("validate.php"); ?>
<?php include("header.php");?> 
<?php include("admin_menu.php");?> 
<?php include("../class/cls_cnx.php");?> 
<?php include("../class/cls_juego.php"); ?>

<?php
session_start();
if ($_SESSION['fk_torneo_id'] == null) {
header("location: ../form/juego_form.php");
}
$msj ="";
  if ($_SESSION['success_op'] == 1) {
    //$msj ="Success";
   // $color_alert = "green";
  }
  if ($_SESSION['success_op'] == 0) {
   // $msj ="Error";
    //$color_alert = "red";
  }
?>
<?php $_SESSION['success_op'] = null; ?>
      <div class="jumbotron">
        <h3 class="display-3">Juego del torneo <?php echo $_SESSION['fk_torneo_id']; ?></h3>
        <span style="background: yellow;color: <?php echo $color_alert;?>;" ><?php echo $msj ; ?></span>
        <p class="lead">...</p>
<div class="table-responsive">
        
  <table class="table" class="table table-inverse">
    <thead>
      <tr>
        
        <th>Jugador-1</th>
        <th>Equipo-1</th>
        <th>Puntos-1</th>
        <th>VS</th>
        <th>Jugador-2</th>
        <th>Equipo-2</th>
        <th>Puntos-2</th>
      </tr>
    </thead>
    <tbody>

    
       <?php 
      $obj_juego = new cls_juego($_SESSION['fk_torneo_id']);
      $resulju1 = $obj_juego->show_partido();
      $turno = 1;
      $fase = 0;
      while($row = $resulju1->fetch_assoc()) {
          $resul_fk_jugador_x_equipo_1 = $obj_juego->show_jugador_equipo($row['fk_jugador_x_equipo_1']);
          $resul_fk_jugador_x_equipo_2 = $obj_juego->show_jugador_equipo($row['fk_jugador_x_equipo_2']);
          $partido_id = $row['id'];
          $turno_id = $row['turno'];
          $puntos_1 = $row['puntos_jugador_1'];
          $puntos_2 = $row['puntos_jugador_2'];
          if ($turno_id == 0) {
            $fase = 0;
          }else{
            $fase = 1;
          }
          while($row1 = $resul_fk_jugador_x_equipo_1->fetch_assoc()) {
            $resul_fk_jugador = $obj_juego->show_jugador_x_equipo($row1['id']);
             while($row2 = $resul_fk_jugador->fetch_assoc()) {
              
                    $jname1 = $row2['jname'];
                    $ename1 = $row2['ename'];
             }             
             
          }
          
          while($row1 = $resul_fk_jugador_x_equipo_2->fetch_assoc()) {
            $resul_fk_jugador = $obj_juego->show_jugador_x_equipo($row1['id']);
             while($row2 = $resul_fk_jugador->fetch_assoc()) {
                    $jname2 = $row2['jname'];
                    $ename2 = $row2['ename'];
             }  
             
             
          }
          
        ?>
        <tr>
          <form action="../class/cls_gestor.php" class="form-signin" method = "post"> 
          <td><?php echo $jname1;?></td>
          <td><?php echo $ename1;?></td>
          <td><input class="form-control"  type="number" name="puntos1" value="<?php echo $puntos_1; ?>"></td>
          <td>VS</td>
          <td><?php echo $jname2;?></td>
          <td><?php echo $ename2;?></td>
          <td><input class="form-control" name="puntos2" type="number" value="<?php echo $puntos_2; ?>"></td>
          <td>
            <input type="text"  class="form-control" name="partido_id" hidden value="<?php echo $partido_id; ?>" required>
            <input type="text"  class="form-control" name="gestor" hidden value="555555" required> 
            <input type="text"  class="form-control" name="turno" hidden value="<?php echo  $turno; ?>" required> 
            <input type="text"  class="form-control" name="torneo_id" hidden value="<?php echo $_SESSION['fk_torneo_id']; ?>" required>
            <button class="btn btn-lg btn-success" type="submit"><?php echo "Terminar"; ?></button>
          </td>
        </tr>
        </form>
        <?php  
        $turno++;
      }
if ($fase == 1) {
   ?>
  <form action="../class/cls_gestor.php" class="form-signin" method = "post"> 
    <input type="text"  class="form-control" name="gestor" hidden value="5555555" required>
    <input type="text"  class="form-control" name="torneo_id" hidden value="<?php echo $_SESSION['fk_torneo_id']; ?>" required>
    <button class="btn btn-lg btn-success" type="submit"><?php echo "Sguiente Fase"; ?></button>
  </form>
   <?php
}
       ?>
  </tbody>
  </table>
 
  </div>
      </div>
<?php include("footer.php"); 
$msj = "";
?> 