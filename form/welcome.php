<?php //include("validate.php"); ?>
<?php 
include("header.php"); 
include("admin_menu.php");
?> 

      <div class="jumbotron">
        <h1 class="display-3">Jumbotron heading</h1>
        <p class="lead">Invita a tus amigos a ver tus torneos </p>
        <form action="<?php print $_SESSION['base_address'] ?>class/cls_gestor.php" class="form-signin" method = "post">
          <fieldset>
           <select class="form-control" name="num_jugadores" required>
              <option value="3">3 Jugadores</option>
              <option value="4">4 Jugadores</option>
              <option value="5">5 Jugadores</option>
              <option value="6">6 Jugadores</option>
              <option value="7">7 Jugadores</option>
              <option value="8">8 Jugadores</option>
              <option value="9">9 Jugadores</option>
              <option value="10">10 Jugadores</option>
              <option value="11">11 Jugadores</option>
              <option value="12">12 Jugadores</option>
            </select> 
            <input type="text"  class="form-control" name="gestor" hidden value="55555" required>
            <br>
            <button class="btn btn-lg btn-success" type="submit"><?php echo "Crear Mejenga"; ?></button>
          </fieldset>
        </form>
       
      </div>


<?php include("footer.php");?> 

      

    
