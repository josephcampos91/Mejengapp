
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title></title>
</head>
<body>
	<h1 class="display-3">Mejengapp</h1>
	<hr />
	<h3>Prueba de conexi&oacute;n a la base de datos:</h3>
	<p>
		<?php
		$webserver = $_SERVER['SERVER_ADDR'];
		$servername = "50.62.176.220";
		$port = "3306";
		$username = "mejengapp_user";
		$password = "12345678";
		$bd = "bd_mejengapp";

		echo "Servidor WEB: ".$webserver;
		echo html_entity_decode("<br/>");
		echo "Servidor BD: ".$servername.":".$port;
		echo html_entity_decode("<br/>");
		echo "Usuario: ".$username;
		echo html_entity_decode("<br/>");
		echo "Base de datos: ".$bd;

		?>

	</p>
	<p style="color:red; font-weight:bolder">
		<?php

		// Create connection
		$conn = new mysqli($servername, $username, $password, $bd, $port);

		// Check connection
		if ($conn->connect_error) {
		    die("Fallo la conexi&oacute;n: " . $conn->connect_error);
		}
		echo "Conexi&oacute;n exitosa";

        ?>
	</p>
</body>
</html>





