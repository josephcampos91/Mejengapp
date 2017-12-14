<?php include("validate.php"); ?>
<?php include("header.php");?> 
<?php include("admin_menu.php");?> 
<?php include("../class/cls_cnx.php");?> 
<?php include("../class/cls_partido.php"); ?>
<?php
$value = "5";
$btn = "add";
$msj = "";
$num_jugadores = $_SESSION['num_jugadores'];
  if($_SESSION['success_op'] == 2){
    $msj = "Equipos o Jugadores Duplicados";
    $color_alert = "red";
  }
  if ($_SESSION['success_op'] == 1) {
    $msj ="Success";
    $color_alert = "green";
  }
  if ($_SESSION['success_op'] == 3) {
    $msj ="Este torneo ya tiene jugadores asignados";
    $color_alert = "orange";
  } 

?>
<?php $_SESSION['success_op'] = null; ?>
<h3>Creando Mejenga</h3>
<p>Asegurate de no repetir equipos o jugadores asi como tambien asignar equipos a un torneo ya existente.</p>
<br>
<span style="background: yellow;color: <?php echo $color_alert;?>;" ><?php echo $msj ; ?></span>
<?php 
  $obj_partido = new cls_partido(1,1,1,1,1,1);
  $resul_jugador = $obj_partido->validar_cantidad_jugadores($num_jugadores);//validar_cantidad_jugadores
  $resul_equipo = $obj_partido->cargar_equipos();//validar_cantidad_jugadores  
  $resul_torneo = $obj_partido->valida_torneo();
  if ($resul_jugador->num_rows > 0) {
    $row = 1;
    if ($resul_jugador->num_rows >= $num_jugadores ) {
    if ($resul_torneo->num_rows > 0) {  ?>
      <div class="row">
      <?php //echo " num_jugadores ".$num_jugadores;
        $bk_num_jugadores = $num_jugadores;
        $primer_row =1;
        $segunda_row =1;
        $selectedvar = "";
      ?>
        <div class="col-lg-12">
          <form action="../class/cls_gestor.php" class="form-signin" method = "post">
          <?php while($row <= $num_jugadores ){  ?>
            <?php
              $resul_jugador = $obj_partido->validar_cantidad_jugadores($num_jugadores);//validar_cantidad_jugadores
              $resul_equipo = $obj_partido->cargar_equipos();//validar_cantidad_jugadores  
            ?>
            <fieldset>
            <span>Jugador</span>
              <select class="form-control" name="jugador-<?php echo $row;?>" required>
                <?php $segunda_row = 1;
                while($row1 = $resul_jugador->fetch_assoc()) {                  
                  if ($primer_row == $segunda_row) {
                    $selectedvar = "selected";                   
                  }else{ $selectedvar = "";}
                   $segunda_row++;
              ?>
                <option value="<?php  echo $row1["id"];  ?>" <?php echo $selectedvar; ?> required ><?php  echo $row1["nombre"];  ?></option>
              <?php } ?>
              </select> 
              <span>Equipo</span>   
              <select class="form-control" name="equipo-<?php echo $row;?>" required>
              <?php $segunda_row = 1;
                while($row2 = $resul_equipo->fetch_assoc()) {
                  if ($primer_row == $segunda_row) {
                    $selectedvar = "selected";
                  }else{$selectedvar = "";}
                  $segunda_row++;
              ?>
                <option value="<?php  echo $row2["id"];  ?>" <?php echo $selectedvar; ?> required ><?php  echo $row2["nombre"];  ?></option>
              <?php } ?>
              </select> 
            </fieldset>
            <br>
            <?php $row++;
              $primer_row++;              
            } ?>
            
            <br>
            <span>Torneo</span>
            <select class="form-control" name="fk_torneo" required>
              <?php
              $resul_torneo = $obj_partido->valida_torneo();//validar_cantidad_jugadores  
              if ($resul_torneo->num_rows > 0) {
              while($row3 = $resul_torneo->fetch_assoc()) {
            ?>
              <option value="<?php  echo $row3["id"];  ?>" required ><?php  echo $row3["nombre"];  ?></option>
            <?php } 
              } ?>
            </select>
            <input type="text"  class="form-control" name="gestor" hidden value="5" required> 
            <button class="btn btn-lg btn-success" type="submit"><?php echo "Agregar"; ?></button>
          </form>
        </div>
      </div>
    <?php }else{?>
        <span style="background: yellow;color: <?php echo "red";?>;" ><?php echo "No Tiene Suficientes Torneos, Tienes (".$resul_torneo->num_rows.")"; ?><a href="torneo_form.php"> Click para agregar</a></span>
      <?php          
          }
      }else{
        ?>
        <span style="background: yellow;color: <?php echo "red";?>;" ><?php  echo "No Tiene Suficientes Jugadores, Tienes (".$resul_jugador->num_rows.")"; ?><a href="jugador_form.php"> Click para agregar</a></span>
      <?php     
    }
    
  }else{?>
        <span style="background: yellow;color: <?php echo "red";?>;" ><?php echo "No Tienes Jugadores"; ?><a href="jugador_form.php"> Click para agregar</a></span>
      <?php   
    }
    ?>
  

<?php include("footer.php"); $_SESSION['add_op'] = null;

$msj = "";
?> 