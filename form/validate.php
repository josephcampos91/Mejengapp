<?php

if($_SESSION['login'] == null){
	header("location: login_form.php");
}else{
	if(time() < $_SESSION['timein']){
		
	}
	else{
		header("location: ../class/exit.php");
	}
}
?>