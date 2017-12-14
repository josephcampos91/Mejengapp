<?php

/**
* 
*/
//echo "cls_user";
//echo "<br>";
class cls_jugador_equipo 
{

  private $id = null;
  private $fk_jugador = null;
  private $fk_equipo = null;
  private $fk_torneo = null;
  private $estado = null;

  private function set_id($param) {
    $this->id = $param;
  }
  private function get_id() {
    return $this->id;
  }
  private function set_fk_jugador($param) {
    $this->fk_jugador = $param;
  }
  private function get_fk_jugador() {
    return $this->fk_jugador;
  }
  private function set_fk_equipo($param) {
    $this->fk_equipo = $param;
  }
  private function get_fk_equipo() {
    return $this->fk_equipo;
  }
  private function set_fk_torneo($param) {
    $this->fk_torneo = $param;
  }
  private function get_fk_torneo() {
    return $this->fk_torneo;
  }
  private function set_estado($param) {
    $this->estado = $param;
  }
  private function get_estado() {
    return $this->estado;
  }

  function __construct($p_fk_jugador,$p_fk_equipo,$p_fk_torneo){
    $this->set_fk_jugador($p_fk_jugador);
    $this->set_fk_equipo($p_fk_equipo);
    $this->set_fk_torneo($p_fk_torneo);
  }

  function insert(){
    $obj_cnx = new cls_cnx();
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);
    $equipo1 = $obj_cnx->conn->real_escape_string($this->get_fk_equipo());
    $jugador1 = $obj_cnx->conn->real_escape_string($this->get_fk_jugador());
    $torneo1 = $obj_cnx->conn->real_escape_string($this->get_fk_torneo());

    $string ="INSERT INTO `jugador_x_equipo`(`fk_equipo`,`fk_jugador`,`fk_torneo`,`fk_user`,`estado`) VALUES (
    ".$equipo1.",
    ".$jugador1.",
    ".$torneo1.",
    ".$login_id_1.",
    1
    )";
    $result = $obj_cnx->insert($string);

    return $result;
  }
  function valida_torneo(){
    $obj_cnx = new cls_cnx();
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);
    $torneo1 = $obj_cnx->conn->real_escape_string($this->get_fk_torneo());

    $string ="SELECT * from  `jugador_x_equipo` WHERE  `estado` = 1 and `fk_user` = ".$login_id_1." and `fk_torneo` = ".$torneo1;
    $result = $obj_cnx->data($string);

    return $result;
  }
  


}

?>