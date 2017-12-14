<?php

/**
* 
*/
//echo "cls_user";
//echo "<br>";
class cls_juego
{

  private $fk_torneo = null;

  private function set_fk_torneo($param) {
    $this->fk_torneo = $param;
  }
  private function get_fk_torneo() {
    return $this->fk_torneo;
  }
  function __construct($p_torneo){
    $this->set_fk_torneo($p_torneo);
  }
  function show22(){
    $obj_cnx = new cls_cnx();
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);
    $p_torneo1 = $obj_cnx->conn->real_escape_string($this->get_fk_torneo($p_torneo));

    $string ="SELECT jugador.nombre as jname, jugador_x_equipo.id, jugador_x_equipo.fk_equipo as fk_equipo,equipo.nombre as ename, jugador_x_equipo.fk_jugador as fk_jugador FROM `jugador_x_equipo` inner join equipo on equipo.id = jugador_x_equipo.fk_equipo INNER join jugador on jugador_x_equipo.fk_jugador = jugador.id where jugador_x_equipo.fk_user = ".$login_id_1." and jugador_x_equipo.estado = 1 and jugador_x_equipo.fk_torneo =  ".$p_torneo1;
    $result = $obj_cnx->data($string);

    return $result;
  }
  function show_partido(){
    $obj_cnx = new cls_cnx();
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);
    $p_torneo1 = $obj_cnx->conn->real_escape_string($this->get_fk_torneo());

    $string ="SELECT * FROM `partido` where fk_torneo =  ".$p_torneo1." and estado = 1 and fk_user =".$login_id_1;
    $result = $obj_cnx->data($string);

    return $result;
  }
  function show_equipo($id){
    $obj_cnx = new cls_cnx();
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);
   

    $string ="SELECT * FROM `equipo` where  estado = 1 and id = ".$id." and fk_user =".$login_id_1;
    $result = $obj_cnx->data($string);

    return $result;
  }
  function show_jugador_x_equipo($id){
    $obj_cnx = new cls_cnx();
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);

    $string ="SELECT jugador.nombre as jname, equipo.nombre as ename  FROM `jugador_x_equipo` inner join jugador on jugador_x_equipo.fk_jugador = jugador.id  inner join equipo on equipo.id = jugador_x_equipo.fk_equipo where jugador_x_equipo.fk_user =".$login_id_1." and jugador_x_equipo.estado = 1 and jugador_x_equipo.id =".$id ;
    $result = $obj_cnx->data($string);

    return $result;
  }
  function show_jugador_equipo($id){
    $obj_cnx = new cls_cnx();
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);
  $p_torneo1 = $obj_cnx->conn->real_escape_string($this->get_fk_torneo());
    $string ="SELECT * FROM `jugador_x_equipo` where fk_torneo =  ".$p_torneo1." and  estado = 1 and id= ".$id." and fk_user =".$login_id_1;
    $result = $obj_cnx->data($string);

    return $result;
  }
  function convierte_puntos($id_torneo){
    $obj_cnx = new cls_cnx();
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);
    $id_torneo1 = $obj_cnx->conn->real_escape_string($id_torneo);
    $string ="SELECT * FROM `partido` where fk_user =".$login_id_1." and estado = 1 and fk_torneo = ".$id_torneo1;
    $result = $obj_cnx->data($string);

    return $result;

  }


}

?>