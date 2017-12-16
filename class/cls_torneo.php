<?php

class cls_torneo
{

  private $id = null;
  private $name = null;
  private $turno = null;

  private function set_id($param) {
    $this->id = $param;
  }
  private function get_id() {
    return $this->id;
  }
  private function set_name($param) {
    $this->name = $param;
  }
  private function get_name() {
    return $this->name;
  }
  private function set_turno($param) {
    $this->turno = $param;
  }
  private function get_turno() {
    return $this->turno;
  }
  function __construct($p_name,$pturno){
    $this->set_name($p_name);
    $this->set_turno($pturno);
  }
  function valida_name(){
    $obj_cnx = new cls_cnx();
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);
    $name1 = $obj_cnx->conn->real_escape_string($this->get_name());

    $string ="SELECT * FROM `torneo` where nombre ='".$name1."' and fk_user = ".$login_id_1;
    $result = $obj_cnx->data($string);

    return $result;

  }
  function insert(){
    $obj_cnx = new cls_cnx();
    $name1 = $obj_cnx->conn->real_escape_string($this->get_name());
    $turno1 = $obj_cnx->conn->real_escape_string($this->get_turno());
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);

    $string ="INSERT INTO `torneo`(`nombre`,`fk_user`,`fecha`,`turno`,`estado`) VALUES (
    '".$name1."',
    ".$login_id_1.",
    NOW(),
    ".$turno1.",
    1
    )";
    $result = $obj_cnx->insert($string);

    return $result;
  }
  function show(){
    $obj_cnx = new cls_cnx();
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);

    $string ="SELECT `id`, `nombre`, `fk_user`,`turno` FROM `torneo` where fk_user = ".$login_id_1." and `estado` = 1 ";
    $result = $obj_cnx->data($string);

    return $result;
  }
  function consulta_torneo(){
    $obj_cnx = new cls_cnx();
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);

    $string ="SELECT `id`, `nombre`, `fk_user`,`turno` FROM `torneo` where fk_user = ".$login_id_1." and `estado` = 1 ";
    $result = $obj_cnx->data($string);

    return $result;
  }
  function update($edit_id){
    $obj_cnx = new cls_cnx();
    $name1 = $obj_cnx->conn->real_escape_string($this->get_name());
    $edit_id1 = $obj_cnx->conn->real_escape_string($edit_id);

    $string ="UPDATE `torneo` SET `nombre`='".$name1."' WHERE `id` = ".$edit_id1 ;
    $result = $obj_cnx->update($string);

    return $result;
  }
  function update_turno($ptorneo,$pturno){
    $obj_cnx = new cls_cnx();
    $ptorneo1 = $obj_cnx->conn->real_escape_string($ptorneo);
    $pturno1 = $obj_cnx->conn->real_escape_string($pturno);

    $string ="UPDATE `torneo` SET `turno`=".$pturno1." WHERE `id` = ".$ptorneo1 ;
    $result = $obj_cnx->update($string);

    return $result;
  }
  function delete($edit_id){
    $obj_cnx = new cls_cnx();
    $edit_id1 = $obj_cnx->conn->real_escape_string($edit_id);

    $string ="UPDATE `torneo` SET `estado`=0 WHERE `id` = ".$edit_id1 ;
    $result = $obj_cnx->delete($string);

    return $result;
  }

  function show_equipo_jugador($torneo_id){
    $obj_cnx = new cls_cnx();
    $torneo_id1 = $obj_cnx->conn->real_escape_string($torneo_id);
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);

    $string ="SELECT id as id_partido, jugador_x_equipo.id as id, jugador_x_equipo.fk_jugador as fk_jugador ,jugador_x_equipo.fk_equipo as fk_equipo,jugador_x_equipo.fk_torneo as fk_torneo , jugador.nombre as junom,jugador_x_equipo.fk_torneo, equipo.nombre as quinom FROM `jugador_x_equipo`  inner join jugador on jugador_x_equipo.fk_jugador = jugador.id inner join equipo on jugador_x_equipo.fk_equipo = equipo.id where jugador.id = jugador_x_equipo.fk_jugador and jugador.fk_user  = ".$login_id_1."  and jugador_x_equipo.fk_torneo = ".$torneo_id1;
    $result = $obj_cnx->data($string);

    return $result;    
  }


}

?>