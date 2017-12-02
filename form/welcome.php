<?php 
   session_start();
 if($_SESSION['login'] == null){
header("location: ../form/login_form.php");
} ?>
<?php

//echo 'Bienvenido usuario:'. $_SESSION['login']['user_id'];
//echo "<br>";
//echo  $_SESSION['login']['user_pass'];
//echo "<br>";
?>
<?php

?>
<?php include("header.php");?> 
<?php include("admin_menu.php");?> 
      <div class="jumbotron">
        <h1 class="display-3">Mejengapp</h1>
        <p class="lead">Coordina un partido con tus amigos y diles que vengan a ver los resultados.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Agregar mejenga</a></p>
      </div>

      
<?php include("footer.php");?> 

      

    
