<?php

/**
* 
*/
//echo "cls_login";
//echo "<br>";
//echo $_POST['user_id'] ;
class cls_login
{
  //echo "entra cls_login";
	private $user_id;
  private $user_pass;

	public function set_user_id($param) {
  	$this->user_id = $param;
	}
	public function get_user_id() {
  	return $this->user_id;
	}
	public function set_user_pass($param) {
  	$this->user_pass = $param;
	}
	public function get_user_pass() {
  	return $this->user_pass;
	}

  public function __construct($p_user_id,$p_user_pass){
    $this->set_user_id( $p_user_id );
    $this->set_user_pass(base64_encode($p_user_pass));
  }
    
	public function validar(){
    $obj_cnx = new cls_cnx();
    $pass1 = $obj_cnx->conn->real_escape_string($this->get_user_pass());
    $user_id_1 = $obj_cnx->conn->real_escape_string($this->get_user_id());

    $string ="select * from user_login where user_id ='".$user_id_1."' and user_pass = '".$pass1."' and user_status = 1;";
    $num = 0;
		$result = $obj_cnx->data($string);
    if ($result == 0) {
     $resul ="<h1>Invalido</h1>";
    }else{
      $resul ="<h1>Logueado</h1>";
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          session_start();          
          $_SESSION["login"] = null;
          $_SESSION["login"]["id"]=$row["id"];
          $_SESSION["login"]["user_id"]=$row["user_id"];
          $_SESSION["login"]["user_pass"]=$row["user_pass"];
          $_SESSION["login"]["user_roll"]=$row["user_roll"];
           
          $_SESSION['timeout'] = time();
          $_SESSION['timein'] = $_SESSION['timeout'] + 600; //session time is 1 minute 60
    
   
        }
      } 
    }
	}  
	public function show(){		 
		echo "su clave es ".$this->get_user_pass();
    echo "<br>";
    echo "su id es ".$this->get_user_id();
	}
}
?>