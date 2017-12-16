<?php

/**
*
*/
//echo "cls_user";
//echo "<br>";
class cls_partido
{

  private $id = null;
  private $fk_jugador_1 = null;
  private $fk_jugador_2 = null;
  private $fk_torneo = null;
  private $puntos_jugador_1 = null;
  private $puntos_jugador_2 = null;
  private $turno = null;
  private $estado = null;

  private function set_id($param) {
    $this->id = $param;
  }
  private function get_id() {
    return $this->id;
  }
  private function set_fk_jugador_1($param) {
    $this->fk_jugador_1 = $param;
  }
  private function get_fk_jugador_1() {
    return $this->fk_jugador_1;
  }
  private function set_fk_jugador_2($param) {
    $this->fk_jugador_2 = $param;
  }
  private function get_fk_jugador_2() {
    return $this->fk_jugador_2;
  }
  private function set_fk_torneo($param) {
    $this->fk_torneo = $param;
  }
  private function get_fk_torneo() {
    return $this->fk_torneo;
  }
  private function set_puntos_jugador_1($param) {
    $this->puntos_jugador_1 = $param;
  }
  private function get_puntos_jugador_1() {
    return $this->puntos_jugador_1;
  }
  private function set_puntos_jugador_2($param) {
    $this->puntos_jugador_2 = $param;
  }
  private function get_puntos_jugador_2() {
    return $this->puntos_jugador_2;
  }
  private function set_turno($param) {
    $this->turno = $param;
  }
  private function get_turno() {
    return $this->turno;
  }
  private function set_estado($param) {
    $this->estado = $param;
  }
  private function get_estado() {
    return $this->estado;
  }

  function __construct($p_fk_j_1,$p_fk_j_2,$p_fk_torneo,$p_p_1,$p_p_2,$p_turno){
    $this->set_fk_jugador_1($p_fk_j_1);
    $this->set_fk_jugador_2($p_fk_j_2);
    $this->set_fk_torneo($p_fk_torneo);
    $this->set_puntos_jugador_1($p_p_1);
    $this->set_puntos_jugador_2($p_p_2);
    $this->set_turno($p_turno);
  }

  function insert(){
    $obj_cnx = new cls_cnx();
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);
    $fk_jugador_1 = $obj_cnx->conn->real_escape_string($this->get_fk_jugador_1());
    $puntos_jugador_1 = $obj_cnx->conn->real_escape_string($this->get_puntos_jugador_1());
    $fk_jugador_2 = $obj_cnx->conn->real_escape_string($this->get_fk_jugador_2());
    $puntos_jugador_2 = $obj_cnx->conn->real_escape_string($this->get_puntos_jugador_2());
    $turno = $obj_cnx->conn->real_escape_string($this->get_turno());
    $fk_torneo = $obj_cnx->conn->real_escape_string($this->get_fk_torneo());
    $estado = 1;

    $string =
	"INSERT INTO `partido`(
    `fk_jugador_x_equipo_1`, `puntos_jugador_1`, `fk_jugador_x_equipo_2`, `puntos_jugador_2`, `turno`, `fk_torneo`, `estado`, `fk_user`)
	VALUES (
	".$fk_jugador_1.",".$puntos_jugador_1.",".$fk_jugador_2.",".$puntos_jugador_2.",".$turno.",".$fk_torneo.",".$estado.",".$login_id_1.")";

    $result = $obj_cnx->insert($string);

    return $result;
  }
  function valida_partidos_sin_iniciar(){
    $obj_cnx = new cls_cnx();
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);

    $string ="SELECT * FROM `partido` WHERE turno = 0 and fk_user =".$login_id_1." and estado = 1";
    $result = $obj_cnx->data($string);

    return $result;
  }
  function show(){
    $obj_cnx = new cls_cnx();
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);

    $string ="SELECT `id`, `nombre`, `fk_user` FROM `partido` where fk_user = ".$login_id_1." and `estado` = 1 ";
    $result = $obj_cnx->data($string);

    return $result;
  }
  function consultar_personas_torneo($p_torneo){
    $obj_cnx = new cls_cnx();
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);
    $$p_torneo1 = $obj_cnx->conn->real_escape_string($p_torneo);

    $string ="SELECT * FROM `jugador_x_equipo` where fk_user = ".$login_id_1." and `estado` = 1 and fk_torneo = ".$p_torneo1;
    $result = $obj_cnx->data($string);

    return $result;
  }

  function consultar_partidos_activos($p_torneo){
	  $obj_cnx = new cls_cnx();
	  $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);
	  $$p_torneo1 = $obj_cnx->conn->real_escape_string($p_torneo);

	  $string ="SELECT * FROM `partido` where `estado` = 1 and fk_torneo = ".$p_torneo1;
	  $result = $obj_cnx->data($string);

	  return $result;
  }

  function update($edit_id){
    $obj_cnx = new cls_cnx();
    $name1 = $obj_cnx->conn->real_escape_string($this->get_name());
    $edit_id1 = $obj_cnx->conn->real_escape_string($edit_id);

    $string ="UPDATE `partido` SET `nombre`='".$name1."' WHERE `id` = ".$edit_id1 ;
    $result = $obj_cnx->update($string);

   return $result;
  }
  function update_puntos_turno($idpartido){
    $obj_cnx = new cls_cnx();
    $puntos1 = $obj_cnx->conn->real_escape_string($this->get_puntos_jugador_1());
    $puntos2 = $obj_cnx->conn->real_escape_string($this->get_puntos_jugador_2());
    $turno1 = $obj_cnx->conn->real_escape_string($this->get_turno());
    $idpartido1 = $obj_cnx->conn->real_escape_string($idpartido);

    $string ="UPDATE `partido` SET `puntos_jugador_1`= ".$puntos1." , `puntos_jugador_2`= ".$puntos2.",  `turno`= ".$turno1.",  `estado`= 1   WHERE `id` = ".$idpartido1 ;
    $result = $obj_cnx->update($string);

    return $result;
  }

  function update_estado($idpartido, $estado){
	  $obj_cnx = new cls_cnx();
	  $idpartido1 = $obj_cnx->conn->real_escape_string($idpartido);

	  $string ="UPDATE `partido` SET `estado` = ".$estado." WHERE `id` = ".$idpartido1 ;
	  echo $string;

	  $result = $obj_cnx->update($string);

	  return $result;
  }


  function delete($edit_id){
    $obj_cnx = new cls_cnx();
    $edit_id1 = $obj_cnx->conn->real_escape_string($edit_id);

    $string ="UPDATE `partido` SET `estado`=0 WHERE `id` = ".$edit_id1 ;
    $result = $obj_cnx->delete($string);

    return $result;
  }

  function validar_cantidad_jugadores($num_jugadores){
    $obj_cnx = new cls_cnx();
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);

    $string ="SELECT * from  `jugador` WHERE `fk_user` = ".$login_id_1." and `estado` = 1";
    $result = $obj_cnx->data($string);

    return $result;
  }
  function cargar_equipos(){
    $string ="SELECT * from  `equipo` WHERE  `estado` = 1";
    $obj_cnx = new cls_cnx();
    $result = $obj_cnx->data($string);

    return $result;
  }
  function valida_torneo(){
    $obj_cnx = new cls_cnx();
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);

    $string ="SELECT * FROM `torneo` where fk_user = ".$login_id_1." and `estado` = 1 and turno = 0 ";
    $result = $obj_cnx->data($string);

    return $result;
  }
  function valida_torneo_utilizado(){
    $obj_cnx = new cls_cnx();
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);

    $string ="SELECT torneo.id,torneo.nombre FROM `torneo` inner join `jugador_x_equipo` where torneo.id = jugador_x_equipo.fk_torneo and torneo.fk_user = ".$login_id_1." and torneo.estado = 1 and torneo.turno = 0";
    $result = $obj_cnx->data($string);

    return $result;
  }




}

?>