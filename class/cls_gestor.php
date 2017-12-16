<?php
include("cls_cnx.php");
include("cls_log.php");
include("cls_admin.php");
include("cls_user.php");
include("cls_jugador.php");
include("cls_login.php");
include("cls_torneo.php");
include("cls_partido.php");
include("cls_juego.php");
include("cls_jugador_equipo.php");
session_start();

cls_log::info("gestor = ".$_POST['gestor']);

if ($_POST['gestor'] == 0) {//login
	cls_log::info("login");
	cls_log::info("user_id".$_POST['user_id']);
	cls_log::info("user_pass".$_POST['user_pass']);
	$_SESSION["login"] = null;

	$obj_login = new cls_login($_POST['user_id'] ,$_POST['user_pass'] );
	$obj_login->validar();
	if ($_SESSION["login"] != null) {
		// print_r($_SESSION['login']["user_id"]);
		header("Location: ../form/welcome.php");
		//die();
	}else{
		$_SESSION['success_op'] =1;
		header("Location: ../form/login_form.php");
		die();
	}
}
/********************************************************************/
/* USER
/********************************************************************/
if ($_POST['gestor'] == 1) {//add user
	cls_log::info("add user");

	$obj_user = new cls_user($_POST['nickname'],$_POST['firstname'],$_POST['lastname'],$_POST['password'],$_POST['email']);
	$resul_valida_user = $obj_user->valida_user();
	if ($resul_valida_user->num_rows > 0) {
		$_SESSION['success_op'] = 2;
	}else{
		$resul = $obj_user->insert();//consultar
		if ( $resul > 0) {
			$_SESSION['success_op'] = 1;
		}
		else{
			$_SESSION['success_op'] = 0;
		}
	}

	header("location: ../form/user_form.php");

}
/********************************************************************/
/* ADMIN
/********************************************************************/
if ($_POST['gestor'] == 9) {// user admin
	$edit_id = $_POST['edit_id'];
	$ad_status =  $_POST['ad_status'] ;
	$ad_roll = $_POST['ad_roll'] ;

	$obj_admin = new cls_admin($edit_id,$ad_status,$ad_roll);
	$resul = $obj_admin->update();//consultar
	if ( $resul > 0) {
		$_SESSION['success_op'] = 1;
	}
	else{
		$_SESSION['success_op'] = 0;
	}
	header("location: ../form/admin_form.php");
}

/********************************************************************/
/* JUGADOR
/********************************************************************/
if ($_POST['gestor'] == 2) {//add jugador
	$obj_jugador = new cls_jugador($_POST['jname']);
	$resul_valida_name = $obj_jugador->valida_name();

	if ($resul_valida_name->num_rows > 0) {
		$_SESSION['success_op'] = 2; // ya existe
	}else{
		$resul = $obj_jugador->insert();//consultar
		if ( $resul > 0) {
			$_SESSION['success_op'] = 1;
		}
		else{
			$_SESSION['success_op'] = 0;
		}
	}

	header("location: ../form/jugador_form.php");
}

if ($_POST['gestor'] == 22) {//edit jugador

	$edit_id = $_POST['edit'];
	$jname = $_POST['jname'];
	$obj_jugador = new cls_jugador($jname);
	$resul_valida_name = $obj_jugador->valida_name();
	if ($resul_valida_name->num_rows > 0) {
		$_SESSION['success_op'] = 2;
	}else{
		$resul = $obj_jugador->update($edit_id);//consultar
		if ( $resul > 0) {
			$_SESSION['success_op'] = 1;
		}
		else{
			$_SESSION['success_op'] = 0;
		}
	}
	header("location: ../form/jugador_form.php");
}

if ($_POST['gestor'] == 2222) {//edit jugador
	$edit_id = $_POST['edit_id'];
	$jname = $_POST['jname'];
	$_SESSION['success_op'] = "11";
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
		$_SESSION['success_op'] = 1;
	}
	else{
		$_SESSION['success_op'] = 0;
	}
	header("location: ../form/jugador_form.php");
}

/********************************************************************/
/* TORNEO
/********************************************************************/
if ($_POST['gestor'] == 3) {//add torneo
	$turno =0;
	$obj_torneo = new cls_torneo($_POST['jname'],$turno);
	$resul_valida_name = $obj_torneo->valida_name();
	if ($resul_valida_name->num_rows > 0) {
		$_SESSION['success_op'] = 2;
	}else{
		$resul = $obj_torneo->insert();//consultar
		if ( $resul > 0) {
			$_SESSION['success_op'] = 1;
		}
		else{
			$_SESSION['success_op'] = 0;
		}
	}
	header("location: ../form/torneo_form.php");
}

if ($_POST['gestor'] == 33) {//edit torneo

	$edit_id = $_POST['edit'];
	$jname = $_POST['jname'];
	$turno =1;
	$obj_torneo = new cls_torneo($jname,$turno);
	$resul_valida_name = $obj_torneo->valida_name();
	if ($resul_valida_name->num_rows > 0) {
		$_SESSION['success_op'] = 2;
	}else{
		$resul = $obj_torneo->update($edit_id);//consultar
		if ( $resul > 0) {
			$_SESSION['success_op'] = 1;
		}
		else{
			$_SESSION['success_op'] = 0;
		}
	}
	header("location: ../form/torneo_form.php");
}

if ($_POST['gestor'] == 3333) {//edit torneo

	$edit_id = $_POST['edit_id'];
	$jname = $_POST['jname'];
	$_SESSION['success_op'] = "11";
	$_SESSION['edit_id'] = $edit_id;
	$_SESSION['value_name'] = $jname;
	header("location: ../form/torneo_form.php");
}

if ($_POST['gestor'] == 333) {//delete TORNEO

	$edit_id = $_POST['edit_id'];
	$jname = '';//$_POST['jname'];
	$turno =1;
	$obj_torneo = new cls_torneo($jname,$turno);

	cls_log::info('$edit_id = '.$edit_id);

	$resul = $obj_torneo->delete($edit_id);//consultar

	cls_log::info($resul);

	if ( $resul > 0) {
		$_SESSION['success_op'] = 1;
	}
	else{
		$_SESSION['success_op'] = 0;
	}
	header("location: ../form/torneo_form.php");
}

if ($_POST['gestor'] == 33333) {//consulta con id de torneo
	$torneo_id = $_POST['torneo_id'];
	echo "consultando id de torneo ".$torneo_id;
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
		$_SESSION['success_op'] = "1";
	}
	else{
		$_SESSION['success_op'] = "0";
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
			$_SESSION['success_op'] = "1";
		}
		else{
			$_SESSION['success_op'] = "0";
		}
	}else{
		$_SESSION['success_op'] = "0";
	}

	header("location: ../form/cuenta_form.php");
}

if ($_POST['gestor'] == 444) {//delete cuenta

	$obj_user = new cls_user(0,0,0,0,0);
	$resul = $obj_user->delete();//consultar
	if ( $resul > 0) {
		$_SESSION['success_op'] = "3";
	}
	else{
		$_SESSION['success_op'] = "0";
	}
	header("location: ../form/cuenta_form.php");
}

/********************************************************************/
/* JUGADOR POR EQUIPO
/********************************************************************/
if ($_POST['gestor'] == 5) {//add jugador_equipo

	$fk_torneo = $_POST['fk_torneo'];
	$num_jugadores = 0;
	$num_equipos = 0;

	if (isset($_POST['jugador-1'])) { $jugador_1 =$_POST['jugador-1'];$num_jugadores=1;$vec_jugadores['jugador'][0]=$jugador_1;}else{ $jugador_1 = null; }
	if (isset($_POST['jugador-2'])) { $jugador_2 =$_POST['jugador-2'];$num_jugadores=2;$vec_jugadores['jugador'][1]=$jugador_2;}else{ $jugador_2 = null; }
	if (isset($_POST['jugador-3'])) { $jugador_3 =$_POST['jugador-3'];$num_jugadores=3;$vec_jugadores['jugador'][2]=$jugador_3;}else{ $jugador_3 = null; }
	if (isset($_POST['jugador-4'])) { $jugador_4 =$_POST['jugador-4'];$num_jugadores=4;$vec_jugadores['jugador'][3]=$jugador_4;}else{ $jugador_4 = null; }
	if (isset($_POST['jugador-5'])) { $jugador_5 =$_POST['jugador-5'];$num_jugadores=5;$vec_jugadores['jugador'][4]=$jugador_5;}else{ $jugador_5 = null; }
	if (isset($_POST['jugador-6'])) { $jugador_6 =$_POST['jugador-6'];$num_jugadores=6;$vec_jugadores['jugador'][5]=$jugador_6;}else{ $jugador_6 = null; }
	if (isset($_POST['jugador-7'])) { $jugador_7 =$_POST['jugador-7'];$num_jugadores=7;$vec_jugadores['jugador'][6]=$jugador_7;}else{ $jugador_7 = null; }
	if (isset($_POST['jugador-8'])) { $jugador_8 =$_POST['jugador-8'];$num_jugadores=8;$vec_jugadores['jugador'][7]=$jugador_8;}else{ $jugador_8 = null; }
	if (isset($_POST['jugador-9'])) { $jugador_9 =$_POST['jugador-9'];$num_jugadores=9;$vec_jugadores['jugador'][8]=$jugador_9;}else{ $jugador_9 = null; }
	if (isset($_POST['jugador-10'])) { $jugador_10 =$_POST['jugador-10'];$num_jugadores=10;$vec_jugadores['jugador'][9]=$jugador_10;}else{ $jugador_10 = null; }
	if (isset($_POST['jugador-11'])) { $jugador_11 =$_POST['jugador-11'];$num_jugadores=11;$vec_jugadores['jugador'][10]=$jugador_11;}else{ $jugador_11 = null; }
	if (isset($_POST['jugador-12'])) { $jugador_12 =$_POST['jugador-12'];$num_jugadores=12;$vec_jugadores['jugador'][11]=$jugador_12;}else{ $jugador_12 = null; }

	if (isset($_POST['equipo-1'])) { $equipo_1 =$_POST['equipo-1'];$num_equipos=1;$vec_equipos['equipo'][0]=$equipo_1;}else{ $equipo_1 = null; }
	if (isset($_POST['equipo-2'])) { $equipo_2 =$_POST['equipo-2'];$num_equipos=2;$vec_equipos['equipo'][1]=$equipo_2;}else{ $equipo_2 = null; }
	if (isset($_POST['equipo-3'])) { $equipo_3 =$_POST['equipo-3'];$num_equipos=3;$vec_equipos['equipo'][2]=$equipo_3;}else{ $equipo_3 = null; }
	if (isset($_POST['equipo-4'])) { $equipo_4 =$_POST['equipo-4'];$num_equipos=4;$vec_equipos['equipo'][3]=$equipo_4;}else{ $equipo_4 = null; }
	if (isset($_POST['equipo-5'])) { $equipo_5 =$_POST['equipo-5'];$num_equipos=5;$vec_equipos['equipo'][4]=$equipo_5;}else{ $equipo_5 = null; }
	if (isset($_POST['equipo-6'])) { $equipo_6 =$_POST['equipo-6'];$num_equipos=6;$vec_equipos['equipo'][5]=$equipo_6;}else{ $equipo_6 = null; }
	if (isset($_POST['equipo-7'])) { $equipo_7 =$_POST['equipo-7'];$num_equipos=7;$vec_equipos['equipo'][6]=$equipo_7;}else{ $equipo_7 = null; }
	if (isset($_POST['equipo-8'])) { $equipo_8 =$_POST['equipo-8'];$num_equipos=8;$vec_equipos['equipo'][7]=$equipo_8;}else{ $equipo_8 = null; }
	if (isset($_POST['equipo-9'])) { $equipo_9 =$_POST['equipo-9'];$num_equipos=9;$vec_equipos['equipo'][8]=$equipo_9;}else{ $equipo_9 = null; }
	if (isset($_POST['equipo-10'])) { $equipo_10 =$_POST['equipo-10'];$num_equipos=10;$vec_equipos['equipo'][9]=$equipo_10;}else{ $equipo_10 = null; }
	if (isset($_POST['equipo-11'])) { $equipo_11 =$_POST['equipo-11'];$num_equipos=11;$vec_equipos['equipo'][10]=$equipo_11;}else{ $equipo_11 = null; }
	if (isset($_POST['equipo-12'])) { $equipo_12 =$_POST['equipo-12'];$num_equipos=12;$vec_equipos['equipo'][11]=$equipo_12;}else{ $equipo_12 = null; }

	$ya_posee_jugadores=0;

	$roww = 0;
	$turno =0;
	$vec_jugadores['cantidad'][0]=$num_jugadores;
	$vec_equipos['cantidad'][0]=$num_equipos;

	$obj_jugador_equipo = new cls_jugador_equipo(0,0,$fk_torneo);
	$resul_valida_torneo = $obj_jugador_equipo->valida_torneo();
	if ($resul_valida_torneo->num_rows > 0 ) {
		$ya_posee_jugadores = 1;
	}else{
		$valores_equipos_duplicados = 0;
		$valores_jugadores_duplicados = 0;
		$res = array_diff($vec_equipos['equipo'], array_diff(array_unique($vec_equipos['equipo']), array_diff_assoc($vec_equipos['equipo'], array_unique($vec_equipos['equipo']))));
		$res2 = array_diff($vec_jugadores['jugador'], array_diff(array_unique($vec_jugadores['jugador']), array_diff_assoc($vec_jugadores['jugador'], array_unique($vec_jugadores['jugador']))));
		foreach(array_unique($res) as $v) {
			$valores_equipos_duplicados = 1;
			break;
		}
		foreach(array_unique($res2) as $v2) {
			//echo "Duplicado $v en la posicion: " .  implode(', ', array_keys($res, $v)) . '<br />';
			$valores_jugadores_duplicados = 1;
			break;
		}
		if ($valores_equipos_duplicados == 1) {
			//echo "hay equipos duplicados ";echo "<br>";
			$_SESSION['success_op'] = "2";
		}
		if ($valores_jugadores_duplicados == 1) {
			//echo "hay jugadoes duplicados ";echo "<br>";
			$_SESSION['success_op'] = "2";
		}
		if ($valores_jugadores_duplicados ==0 && $valores_equipos_duplicados ==0) {
			while($roww <= $vec_jugadores['cantidad'][0]){
				$obj_jugador_equipo = new cls_jugador_equipo($vec_jugadores['jugador'][$roww],$vec_equipos['equipo'][$roww],$fk_torneo);
				$resul_jugador_equipo = $obj_jugador_equipo->insert();//consultar
				//echo "Jugador ".$vec_jugadores['jugador'][$roww];echo "<br>";
				//echo "Equipo ".$vec_equipos['equipo'][$roww];echo "<br>";
				//echo "Torneo ".$fk_torneo;echo "<br>";
				$roww++;
			}
			$_SESSION['success_op'] = "1";
			$ya_posee_jugadores=0;
		}
	}

	if ($ya_posee_jugadores == 1) {
		$_SESSION['success_op'] = "3";
		//echo "este torneo ya tiene jugadores asignados no se puede editar";
		$ya_posee_jugadores = 0;
	}
	header("location: ../form/partido_form.php");
}

if ($_POST['gestor'] == 55) {//Iniciar Torneo

	$fk_torneo_id = $_POST['edit_id'];

	cls_log::info('$fk_torneo_id = '.$fk_torneo_id);

	$obj_partido = new cls_partido(0,0,0,0,0,0);
	//$resul = $obj_partido->insert();
	$obj_torneo = new cls_torneo(1,1);
	$resul_equipo_jugador = $obj_torneo->show_equipo_jugador($fk_torneo_id);
	//var_dump($resul11);

	//echo print_r($resul_equipo_jugador);

	if ($resul_equipo_jugador->num_rows > 0 ) {

		$vec_equipos = array();

		while($row = $resul_equipo_jugador->fetch_assoc()) {
			$vec_equipos[] = $row; // id | fk_equipo | fk_jugador | fk_torneo
		}

		$resul_par_ini = $obj_partido->valida_partidos_sin_iniciar(); //valida si torneo ya esta creado y turno es = 0, para no iniciarlo nuevamente

		if (false& $resul_par_ini->num_rows > 0) {
			$_SESSION['success_op'] = "3";
			echo "ya se inició el torneo";

		}else{
			$esFinal = count($vec_equipos) == 2? true : false;
			$jugadores = $vec_equipos;
			$partidos = array();

			$vs = $esFinal? 1 : rand(1, 3); // si es la final obtiene el index del jugador 2, caso contrario un index random de jugador


			// se agregan partidos de jugador 1 con otro seleccionado aleatoriamente (o el otro finalista)
			$partido1 = array();
			$partido1[]= $jugadores[0];
			$partido1[]= $jugadores[$vs];
			$partidos[] = $partido1;


			if(!$esFinal){
				print var_export(count($jugadores));

			    // se agregan jugadores de los restantes de la cuadrangular
			    array_splice($jugadores, $vs, 1);
			    array_splice($jugadores, 0, 1);

				print var_export(count($jugadores));

			    $partido2 = array();
				$partido2[]= $jugadores[0];
				$partido2[]= $jugadores[1];
				$partidos[] = $partido2;
			}

			if($esFinal){
			    // se agrega partido de vuelta de la final
				$partido2 = array();
				$partido2[]= $partidos[0][1];
				$partido2[]= $partidos[0][0];
				$partidos[] = $partido2;

			}else{

			    // Se agregan los partidos (cruzados) restantes de la cuadrangular

				$partido3 = array();
				$partido3[]= $partidos[0][0];
				$partido3[]= $partidos[1][1];
				$partidos[] = $partido3;

				$partido4 = array();
				$partido4[]= $partidos[0][1];
				$partido4[]= $partidos[1][0];
				$partidos[] = $partido4;

			}

			for($i = 0; $i< count($partidos); $i++){
			    $obj_partido = new cls_partido($partidos[$i][0/*#jugador*/]['id'],$partidos[$i][1/*#jugador*/]['id'],$fk_torneo_id,0,0,$i+1/*turno*/);
			    $obj_partido->insert();
			}

			$obj_torneo = new cls_torneo(0,0);
			$resul = $obj_torneo->update_turno($fk_torneo_id,2);
			echo print_r($resul);
			if ($resul->num_rows > 0) {
			    $_SESSION['success_op'] = "1";
			}

		}

		//}
	}
	//echo $resul;
	//$resul = $obj_partido->insert();

	header("location: ../form/torneo_form.php");
}

if ($_POST['gestor'] == 555) {//detalle Torneo

	$fk_torneo_id = $_POST['edit_id'];
	///echo "<br>";
	//echo "Detalle torneo..";
	//echo "<br>";
	//echo $torneo_id;
	//echo "<br>";
	$_SESSION['fk_torneo_id'] = $fk_torneo_id;
	header("location: ../form/juego_form.php");
	//$obj_partido = new cls_partido(0,0,0,0,0,0);
	//$resul = $obj_partido->consultar_personas_torneo($fk_torneo_id);

	//echo $resul;
}

if ($_POST['gestor'] == 55555) {//Crear partido

	$_SESSION['num_jugadores'] = $_POST['num_jugadores'];

	header("location: ../form/partido_form.php");
}

if ($_POST['gestor'] == 555555) {//concluir partido

	$partido_id = $_POST['partido_id'];
	$puntos1  = $_POST['puntos1'];
	$puntos2 = $_POST['puntos2'];
	$torneo_id =$_POST['torneo_id'];
	$turno = $_POST['turno'];

	$obj_partido = new cls_partido(0,0,$torneo_id,$puntos1,$puntos2,$turno);
	$resulpun = $obj_partido->update_puntos_turno($partido_id);
	if ($resulpun->num_rows > 0) {
		$_SESSION['success_op'] = "1";
	}else{
		$_SESSION['success_op'] = "0";
	}
	header("location: ../form/juego_form.php");
	//echo "concluir partido";

}
if ($_POST['gestor'] == 5555555) {//concluir partido 5555555

	$torneo_id = $_POST['torneo_id'];






	$obj_juego = new cls_juego(0,0,0,0,0,0);
	$resulpun = $obj_juego->convierte_puntos($torneo_id);


	if ($resulpun->num_rows > 0) {
		$vec_equipos = array();

		while($row = $resulpun->fetch_assoc()) {
			$vec_equipos[] = $row; // id | fk_equipo | fk_jugador | fk_torneo
		}
		$vec_equipos = array_chunk($vec_equipos, count($vec_equipos)/2)[0]; // obtiene la mejor mitad de jugadores, el top


		$esFinal = count($vec_equipos) == 2? true : false;
		$jugadores = $vec_equipos;
		$partidos = array();

		$vs = $esFinal? 1 : rand(1, 3); // si es la final obtiene el index del jugador 2, caso contrario un index random de jugador


		// se agregan partidos de jugador 1 con otro seleccionado aleatoriamente (o el otro finalista)
		$partido1 = array();
		$partido1[]= $jugadores[0];
		$partido1[]= $jugadores[$vs];
		$partidos[] = $partido1;


		if(!$esFinal){
			print var_export(count($jugadores));

			// se agregan jugadores de los restantes de la cuadrangular
			array_splice($jugadores, $vs, 1);
			array_splice($jugadores, 0, 1);

			print var_export(count($jugadores));

			$partido2 = array();
			$partido2[]= $jugadores[0];
			$partido2[]= $jugadores[1];
			$partidos[] = $partido2;
		}

		if($esFinal){
			// se agrega partido de vuelta de la final
			$partido2 = array();
			$partido2[]= $partidos[0][1];
			$partido2[]= $partidos[0][0];
			$partidos[] = $partido2;

		}else{

			// Se agregan los partidos (cruzados) restantes de la cuadrangular

			$partido3 = array();
			$partido3[]= $partidos[0][0];
			$partido3[]= $partidos[1][1];
			$partidos[] = $partido3;

			$partido4 = array();
			$partido4[]= $partidos[0][1];
			$partido4[]= $partidos[1][0];
			$partidos[] = $partido4;

		}

		// CAMBIAR EL ESTADO A INACTIVO A LOS PARTIDOS YA JUGADOS
		$obj_partido = new cls_partido(0,0,0,0,0,0);
		$resul_equipo_jugador = $obj_partido->consultar_partidos_activos($torneo_id);

		if ($resul_equipo_jugador->num_rows > 0 ) {
			while($row = $resul_equipo_jugador->fetch_assoc()) {
				//$row; // id | fk_equipo | fk_jugador | fk_torneo

				$obj_partido = new cls_partido(0,0,0,0,0,0);
				$obj_partido->update_estado($row['id'], 0);
			}
		}

		// AGREGAR LOS NUEVOS PARTIDOS
		for($i = 0; $i< count($partidos); $i++){
			$obj_partido = new cls_partido($partidos[$i][0/*#jugador*/]['jugador'],$partidos[$i][1/*#jugador*/]['jugador'],$torneo_id,0,0,$i+1/*turno*/);
			$obj_partido->insert();
		}

		$obj_torneo = new cls_torneo(0,0);
		$resul = $obj_torneo->update_turno($torneo_id,2);
		//echo print_r($resul);
		if ($resul->num_rows > 0) {
			$_SESSION['success_op'] = "1";
		}


		$_SESSION['success_op'] = "1";
	}else{
		$_SESSION['success_op'] = "0";
	}
	//header("location: ../form/juego_form.php");
	//echo "concluir partido";
}

?>