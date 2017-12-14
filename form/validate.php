<?php 
session_start();
if($_SESSION['login'] == null){
  header("location: ../form/login_form.php");
}else{
	if(time() < $_SESSION['timein']){}
		else{ 
			header("location: ../class/exit.php");
		}
}
?>