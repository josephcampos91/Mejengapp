<?php
session_unset();
$_SESSION = array();

header("location: ../form/login_form.php");
?>