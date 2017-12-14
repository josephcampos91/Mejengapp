<?php

/**
* 
*/
//echo "cls_user";
//echo "<br>";
class cls_admin
{

  private $id = null;
  private $status = null;
  private $roll = null;

  private function set_id($param) {
    $this->id = $param;
  }
  private function get_id() {
    return $this->id;
  }
  private function set_status($param) {
    $this->status = $param;
  }
  private function get_status() {
    return $this->status;
  }
  private function set_roll($param) {
    $this->roll = $param;
  }
  private function get_roll() {
    return $this->roll;
  }
  

  function __construct($p_id,$p_status,$p_roll){
    $this->set_id($p_id);
    $this->set_status($p_status);
    $this->set_roll($p_roll);
  }


  function update(){
    $obj_cnx = new cls_cnx();
    $id1 = $obj_cnx->conn->real_escape_string($this->get_id());
    $status1 = $obj_cnx->conn->real_escape_string($this->get_status());
    $roll1 = $obj_cnx->conn->real_escape_string($this->get_roll());

    $string ="UPDATE `user_login` SET `user_status`=".$status1.",`user_roll`=".$roll1." WHERE `id` = ".$id1 ;
    $result = $obj_cnx->update($string);
    return $result;

  }
  function show(){
    $obj_cnx = new cls_cnx();

    $string ="SELECT * FROM `user_login` ";
    $result = $obj_cnx->data($string);
    return $result;
  }
  


}

?>