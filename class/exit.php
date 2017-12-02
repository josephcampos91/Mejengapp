<?php


   session_start();
   $_SESSION['login'] = null;
   header("location: ../form/login_form.php");

?>