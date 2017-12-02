<?php
/**
*
*/
//echo "cls_cnx";
//echo "<br>";
class cls_cnx
{
	private $servername = "50.62.176.220";
	private $username = "mejengapp_user";
	private $password = "12345678";
	private $dbname = "bd_mejengapp";
	public $conn = null;
	function __construct()
	{
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($this->conn->connect_error) {
	    	die("Connection failed: " . $this->conn->connect_error);
		}else{
			//echo "<br>";
			//echo "connected";
		}
	}

	function cnx(){
		$this->conn = new mysqli($servername, $username, $password, $dbname);
		if ($this->conn->connect_error) {
	    	die("Connection failed: " . $this->conn->connect_error);
		}
	}

	function close(){
		$this->conn->close();
	}

	function insert($sql){
		//$num = 0;
		//if ($this->conn->query($sql) === TRUE) {
	    	$num = $this->conn->query($sql);
		//} else {
	    //	$num = 0;
		//}
		return $num;
	}
	function insertUser($pid,$pname,$plasna,$pas,$email){
		$pid1 = $this->conn->real_escape_string($pid);
        $pname1 = $this->conn->real_escape_string($pname);
        $plasna1 = $this->conn->real_escape_string($plasna);
        $pas1 = $this->conn->real_escape_string($pas);
        $email1 = $this->conn->real_escape_string($email);

$string ="INSERT INTO `user_login`( `user_id`, `user_name`,`user_last_name`, `user_pass`,`user_email`,`user_status`) VALUES (
    '".$pid1."',
    '".$pname1."',
    '".$plasna1."',
    '".$pas1."',
    '".$email1."',
    1

     )";
	    	$num = $this->conn->query($string);
		//} else {
	    //	$num = 0;
		//}
		return $num;
	}
	function update($sql){
	    $num = $this->conn->query($sql);
		return $num;
	}
	function delete($sql){
	    $num = $this->conn->query($sql);
		return $num;
	}
	function data($sql){
		$num = 0;
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			$num = $result;
		}else{
			$num = 0;
		}
		return $num;
	}
}


?>