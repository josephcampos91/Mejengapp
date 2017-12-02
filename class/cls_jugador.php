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

  function insert(){
    $string ="INSERT INTO `jugador`(`nombre`,`fk_user`,`estado`) VALUES (
    '".$this->get_name()."',
    ".$_SESSION['login']['id'].",
    1
     )";
      $obj_cnx = new cls_cnx();
      $result = $obj_cnx->insert($string);
     return $result;
  }
    function show(){
    $string ="SELECT `id`, `nombre`, `fk_user` FROM `jugador` where fk_user = ".$_SESSION['login']['id']." and `estado` = 1 ";
      $obj_cnx = new cls_cnx();
      $result = $obj_cnx->data($string);
     return $result;
  }
  function update($edit_id){
    $string ="UPDATE `jugador` SET `nombre`='".$this->get_name()."' WHERE `id` = ".$edit_id ;
          $obj_cnx = new cls_cnx();
          $result = $obj_cnx->update($string);
         return $result;
  }
  function delete($edit_id){
    $string ="UPDATE `jugador` SET `estado`=0 WHERE `id` = ".$edit_id ;
          $obj_cnx = new cls_cnx();
          $result = $obj_cnx->delete($string);
         return $result;
  }


}

?>