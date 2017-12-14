<?php
   session_start();
   $_SESSION['login'] = null;
   $_SESSION["timeout"] = null;
   $_SESSION['timein'] = null;
   header("location: ../form/login_form.php");
?>