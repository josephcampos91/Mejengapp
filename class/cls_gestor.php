<?php
include("cls_cnx.php");
include("cls_user.php");
include("cls_jugador.php");
include("cls_login.php");
include("cls_torneo.php");
session_start();
if ($_POST['gestor'] == 0) {//login
   $_SESSION["login"] = null;  

   $obj_login = new cls_login($_POST['user_id'] ,$_POST['user_pass'] );
   $obj_login->validar();
   if ($_SESSION["login"] != null) {
      header("Location: ../form/welcome.php");
      die();
   }else{
      header("Location: ../form/login_form.php?error=1");
      die();
   }
}
/********************************************************************/
/* USER
/********************************************************************/
if ($_POST['gestor'] == 1) {//add user
	$obj_user = new cls_user($_POST['nickname'],$_POST['firstname'],$_POST['lastname'],$_POST['password'],$_POST['email']);
	 $resul = $obj_user->insert();//consultar
	 if ( $resul > 0) {   
	   $_SESSION['add_user'] = 1;   
	}
	else{	    
	   $_SESSION['add_user'] = 0;
	}
	header("location: ../form/user_form.php");
}
/********************************************************************/
/* JUGADOR
/********************************************************************/
if ($_POST['gestor'] == 2) {//add jugador
	$obj_jugador = new cls_jugador($_POST['jname']);
	$resul = $obj_jugador->insert();//consultar
	 if ( $resul > 0) {   
	   $_SESSION['add_op'] = 1;   
	}
	else{	    
	   $_SESSION['add_op'] = 0;
	}
	header("location: ../form/jugador_form.php");
}
if ($_POST['gestor'] == 22) {//edit jugador
	$edit_id = $_POST['edit'];
	$jname = $_POST['jname'];
	$obj_jugador = new cls_jugador($jname);
	$resul = $obj_jugador->update($edit_id);//consultar
	 if ( $resul > 0) {   
	  	$_SESSION['edit_op'] = 1;  
	}
	else{	    
	  	$_SESSION['edit_op'] = 0;
	} 
	header("location: ../form/jugador_form.php");
}
if ($_POST['edit'] == 2) {//edit jugador
	$edit_id = $_POST['edit_id'];
	$jname = $_POST['jname'];
	$_SESSION['edit_op'] = "11";
	$_SESSION['edit_id'] = $edit_id;
	$_SESSION['value_name'] = $jname;
header("location: ../form/jugador_form.php");
}
if ($_POST['gestor'] == 222) {//delete jugador
	$edit_id = $_POST['edit_id'];
	$jname = $_POST['jname'];
	$obj_jugador = new cls_jugador($jname);
	$resul = $obj_jugador->delete($edit_id);//consultar
	 if ( $resul > 0) {   
	  	$_SESSION['delete_op'] = 1;  
	}
	else{	    
	  	$_SESSION['delete_op'] = 0;
	} 
	header("location: ../form/jugador_form.php");
}
/********************************************************************/
/* TORNEO
/********************************************************************/
if ($_POST['gestor'] == 3) {//add torneo
	$obj_torneo = new cls_torneo($_POST['toname']);
	$resul = $obj_torneo->insert();//consultar
	 if ( $resul > 0) {   
	   $_SESSION['add_op'] = 1;   
	}
	else{	    
	   $_SESSION['add_op'] = 0;
	}	
	header("location: ../form/torneo_form.php");
}
if ($_POST['gestor'] == 33) {//edit torneo
	$edit_id = $_POST['edit'];
	$jname = $_POST['jname'];
	$obj_torneo = new cls_torneo($jname);
	$resul = $obj_torneo->update($edit_id);//consultar
	 if ( $resul > 0) {   
	  	$_SESSION['edit_op'] = 1;  
	}
	else{	    
	  	$_SESSION['edit_op'] = 0;
	} 
	header("location: ../form/torneo_form.php");
}
if ($_POST['edit'] == 3) {//edit torneo
	$edit_id = $_POST['edit_id'];
	$jname = $_POST['jname'];
	$_SESSION['edit_op'] = "11";
	$_SESSION['edit_id'] = $edit_id;
	$_SESSION['value_name'] = $jname;
header("location: ../torneo_form.php");
}
if ($_POST['gestor'] == 333) {//delete TORNEO
	$edit_id = $_POST['edit_id'];
	$jname = $_POST['jname'];
	$obj_torneo = new cls_torneo($jname);
	$resul = $obj_torneo->delete($edit_id);//consultar
	 if ( $resul > 0) {   
	  	$_SESSION['delete_op'] = 1;  
	}
	else{	    
	  	$_SESSION['delete_op'] = 0;
	} 
	header("location: ../form/torneo_form.php");
}
/********************************************************************/
/* CUENTA
/********************************************************************/
if ($_POST['gestor'] == 4) {//edit cuenta
	$user_id = $_POST['user_id'];
	$user_name = $_POST['user_name'];
	$user_last_name = $_POST['user_last_name'];
	$user_email = $_POST['user_email'];
	$obj_user = new cls_user($user_id,$user_name,$user_last_name,0,$user_email);
	$resul = $obj_user->update();//consultar
	 if ( $resul > 0) {   
	  	$_SESSION['edit_acc'] = "1"; 
	}
	else{	    
	  	$_SESSION['edit_acc'] = "0";
	} 
header("location: ../form/cuenta_form.php");
}
if ($_POST['gestor'] == 4444) {//cambiar clave cuenta
	$pw1 = $_POST['pw1'];
	$pw2 = $_POST['pw2'];
	if ($pw1 == $pw2) {
		 
		$obj_user = new cls_user(0,0,0,0,0);
		$resul = $obj_user->updateClave(base64_encode($pw1));//consultar
		if ( $resul > 0) {   
		  	$_SESSION['edit_acc'] = "1"; 
		}
		else{	    
		  	$_SESSION['edit_acc'] = "0";
		}  
	}else{
		$_SESSION['edit_acc'] = "0";
	}
	
header("location: ../form/cuenta_form.php");
}
if ($_POST['gestor'] == 444) {//delete cuenta
	
	$obj_user = new cls_user(0,0,0,0,0);
	$resul = $obj_user->delete();//consultar
	 if ( $resul > 0) {   
	  	$_SESSION['delete_acc'] = "1"; 
	}
	else{	    
	  	$_SESSION['delete_acc'] = "0";
	} 
header("location: ../form/cuenta_form.php");
}

 

?>