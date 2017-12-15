<?php
//include_once('cls_log.php');

/**
*
*/
//echo "cls_cnx";
//echo "<br>";
class cls_cnx
{
	//private $servername = "localhost";
	//private $username = "bandeco4_admin";
	//private $password = "M%sf.tnT#M+{";
	//private $dbname = "bandeco4_db_security";

	private $servername = "50.62.176.220";
	private $username = "bandeco4_user";
	private $password = "12345";
	private $dbname = "bandeco4_db_security";

	public $conn = null;
	function __construct()
	{
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($this->conn->connect_error) {
	    	die("Connection failed: " . $this->conn->connect_error);
		}else{
		}
	}

	function cnx(){
		$this->conn = new mysqli($servername, $username, $password, $dbname);
		if ($this->conn->connect_error) {
	    	die("Connection failed: " . $this->conn->connect_error);
		}
	}

	function insert($sql){
	    $num = $this->conn->query($sql);

		return $num;
	}

	function valida_session(){
	    //if(time() < $_SESSION['timein']){$num = 1;}else{$num = 0;}

	    return 1;
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
		//print_r($result);

		//$num = $result->num_rows > 0? $result->num_rows : 0;

		return $result;
	}
}


?>