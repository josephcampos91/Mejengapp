<?php

/**
* 
*/
//echo "cls_user";
//echo "<br>";
class cls_jugador 
{

  private $id = null;
  private $name = null;

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

  function __construct($p_name){
    $this->set_name($p_name);
  }
  function valida_name(){
      $obj_cnx = new cls_cnx();
      $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);
      $name1 = $obj_cnx->conn->real_escape_string($this->get_name());
      $string ="SELECT * FROM `jugador` where nombre ='".$name1."' and fk_user = ".$login_id_1;
      $result = $obj_cnx->data($string);

      return $result;

  }
  function insert(){
    $obj_cnx = new cls_cnx();
    $name1 = $obj_cnx->conn->real_escape_string($this->get_name());
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);

    $string ="INSERT INTO `jugador`(`nombre`,`fk_user`,`estado`) VALUES (
    '".$name1."',
    ".$login_id_1.",
    1
    )";
    $result = $obj_cnx->insert($string);
    return $result;
  }
  function show(){
    $obj_cnx = new cls_cnx();
    $login_id_1 = $obj_cnx->conn->real_escape_string($_SESSION['login']['id']);

    $string ="SELECT `id`, `nombre`, `fk_user` FROM `jugador` where fk_user = ".$login_id_1." and `estado` = 1 ";
    $result = $obj_cnx->data($string);
    return $result;
  }
  function update($edit_id){
    $obj_cnx = new cls_cnx();
    $edit_id1 = $obj_cnx->conn->real_escape_string($edit_id);
    $name1 = $obj_cnx->conn->real_escape_string($this->get_name());

    $string ="UPDATE `jugador` SET `nombre`='".$name1."' WHERE `id` = ".$edit_id1 ;
    $result = $obj_cnx->update($string);
    return $result;
  }
  function delete($edit_id){
    $obj_cnx = new cls_cnx();
    $edit_id1 = $obj_cnx->conn->real_escape_string($edit_id);

    $string ="UPDATE `jugador` SET `estado`=0 WHERE `id` = ".$edit_id1 ;
    $result = $obj_cnx->delete($string);
   return $result;
  }


}

?>