<?php

/**
* 
*/
//echo "cls_user";
//echo "<br>";
class cls_torneo
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
    $string ="INSERT INTO `torneo`(`nombre`,`fk_user`,`fecha`) VALUES (
    '".$this->get_name()."',
    ".$_SESSION['login']['id'].",
    NOW()
     )";
      $obj_cnx = new cls_cnx();
      $result = $obj_cnx->insert($string);
     return $result;
  }
    function show(){
    $string ="SELECT `id`, `nombre`, `fk_user` FROM `torneo` where fk_user = ".$_SESSION['login']['id'];
      $obj_cnx = new cls_cnx();
      $result = $obj_cnx->data($string);
     return $result;
  }
  function consulta_torneo(){
    $string ="SELECT `id`, `nombre`, `fk_user` FROM `torneo` where fk_user = ".$_SESSION['login']['id'];
      $obj_cnx = new cls_cnx();
      $result = $obj_cnx->data($string);
     return $result;
  }


}

?>