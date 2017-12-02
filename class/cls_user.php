<?php

/**
* 
*/
//echo "cls_user";
//echo "<br>";
class cls_user 
{

  private $user_id = null;
  private $user_name = null;
  private $user_last_name = null;
  private $user_pass_1 = null;
  private $user_pass_2 = null;
  private $user_email = null;
  private $user_status = null;
  private $user_session = null;
  private $user_roll = null;


  private function set_user_id($param) {
    $this->user_id = $param;
  }
  private function get_user_id() {
    return $this->user_id;
  }
  private function set_user_name($param) {
    $this->user_name = $param;
  }
  private function get_user_name() {
    return $this->user_name;
  }
  private function set_user_last_name($param) {
    $this->user_last_name = $param;
  }
  private function get_user_last_name() {
    return $this->user_last_name;
  }
   private function set_user_pass($param) {
    $this->user_pass = $param;
  }
  private function get_user_pass() {
    return $this->user_pass;
  }
  private function set_user_pass_1($param) {
    $this->user_pass_1 = $param;
  }
  private function get_user_pass_1() {
    return $this->user_pass_1;
  }
  private function set_user_pass_2($param) {
    $this->user_pass_2 = $param;
  }
  private function get_user_pass_2() {
    return $this->user_pass_2;
  }
  private function set_user_email($param) {
    $this->user_email = $param;
  }
  private function get_user_email() {
    return $this->user_email;
  }
  private function set_user_status($param) {
    $this->user_status = $param;
  }
  private function get_user_status() {
    return $this->user_status;
  }
  private function set_user_session($param) {
    $this->user_session = $param;
  }
  private function get_user_session() {
    return $this->user_session;
  }
  private function set_user_roll($param) {
    $this->user_roll = $param;
  }
  private function get_user_roll() {
    return $this->user_roll;
  }
  function __construct($p_user_id,$p_user_name,$p_user_last_name,$p_user_pass,$p_user_email){
    $this->set_user_id($p_user_id);
     $this->set_user_name($p_user_name);
     $this->set_user_last_name($p_user_last_name);
     //$this->set_user_pass_1($p_user_pass_1);  
     //$this->set_user_pass_2($p_user_pass_2);   
     $this->set_user_pass(base64_encode($p_user_pass));  
     $this->set_user_email($p_user_email);
     //$this->set_user_status($p_user_status);
     //$this->set_user_session($p_user_session);
     //$this->set_user_roll($p_user_roll);

  }//$p_user_id,$p_user_name,$p_user_last_name,$p_user_pass_1,$p_user_pass_2,$p_user_email,$p_user_status,$p_user_session,$p_user_roll
  

  function script_create_table(){
    $create_table ="
        CREATE TABLE IF NOT EXISTS `user_login` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `user_id` varchar(200) NOT NULL DEFAULT '0',
          `user_name` varchar(200) NOT NULL DEFAULT '',
          `user_last_name` varchar(200) NOT NULL DEFAULT '',
          `user_pass` varchar(200) NOT NULL DEFAULT '',
          `date` date NOT NULL ,
          `user_email` varchar(200) NOT NULL DEFAULT '',
          `user_status` int(11) NOT NULL DEFAULT '0',
          `user_session` int(11) NOT NULL DEFAULT '0',
          `user_roll` int(11) NOT NULL DEFAULT '0',
          PRIMARY KEY (`id`)
          );
    ";
    return $create_table;
  }
  function insert(){//`user_id`, `user_name`,`user_last_name`, `user_pass`, `date`, `user_email`, `user_status`, `user_session`,`user_roll`
    /*
'".get_user_id()."',
    '".get_user_name()."',
    '".get_user_last_name()."',
    '".get_user_pass()."',
    "'NOW()'",
    '".get_user_email()."',
    ".get_user_status().",
    ".get_user_session().",
    ".get_user_roll()."

     )";
    */
    $string ="INSERT INTO `user_login`( `user_id`, `user_name`,`user_last_name`, `user_pass`,`user_email`,`user_status`) VALUES (
    '".$this->get_user_id()."',
    '".$this->get_user_name()."',
    '".$this->get_user_last_name()."',
    '".$this->get_user_pass()."',
    '".$this->get_user_email()."',
    1

     )";

        $obj_cnx = new cls_cnx();
        $pid1 = $obj_cnx->conn->real_escape_string($this->get_user_id());
        $pname1 = $obj_cnx->conn->real_escape_string($this->get_user_name());
        $plasna1 = $obj_cnx->conn->real_escape_string($this->get_user_last_name());
        $pas1 = $obj_cnx->conn->real_escape_string($this->get_user_pass());
        $email1 = $obj_cnx->conn->real_escape_string($this->get_user_email());
        
        $string ="INSERT INTO `user_login`( `user_id`, `user_name`,`user_last_name`, `user_pass`,`user_email`,`user_status`) VALUES (
    '".$pid1."',
    '".$pname1."',
    '".$plasna1."',
    '".$pas1."',
    '".$email1."',
    1

     )";
     
     
      //$result = $obj_cnx->insertUser($this->get_user_id(),$this->get_user_name(),$this->get_user_last_name(),$this->get_user_pass(),$this->get_user_email());
     //return $result;
     
     $result = $obj_cnx->insert($string);
     return $result;
  }
    function consultar(){
$string ="INSERT INTO `user_login`( `user_id`, `user_name`,`user_last_name`, `user_pass`,`user_email`) VALUES (
    '".$this->get_user_id()."',
    '".$this->get_user_name()."',
    '".$this->get_user_last_name()."',
    '".$this->get_user_pass()."',
    '".$this->get_user_email()."'

     )";
     return $string;

    }
        function show(){
    $string ="SELECT * FROM `user_login` where id = ".$_SESSION['login']['id'];
      $obj_cnx = new cls_cnx();
      $result = $obj_cnx->data($string);
     return $result;
  }
  function delete(){
    $string ="UPDATE `user_login` SET `user_status` = 0 where id = ".$_SESSION['login']['id'];
      $obj_cnx = new cls_cnx();
      $result = $obj_cnx->delete($string);
     return $result;
  }
    function update(){
    $string ="UPDATE `user_login` SET `user_name` = '".$this->get_user_name()."',`user_last_name` = '".$this->get_user_last_name()."',`user_email` = '".$this->get_user_email()."' where id = ".$_SESSION['login']['id'];
      $obj_cnx = new cls_cnx();
      $result = $obj_cnx->update($string);
     return $result;
  }
function updateClave($encodepass){
    $string ="UPDATE `user_login` SET `user_pass` = '".$encodepass."' where id = ".$_SESSION['login']['id'];
      $obj_cnx = new cls_cnx();
      $result = $obj_cnx->update($string);
     return $result;
  }



}

?>