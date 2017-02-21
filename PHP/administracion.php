<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Administracion</title>
    <link rel="stylesheet" href="css/administracion.css">
</head>
<body>
	<?php

		include_once "conec.php";

     		 session_start();
    		if(isset($_POST["desloguear"])){
      			session_destroy();
      			header('Location: /php/proyecto/login.php');
   			 }

   		 if(isset($_SESSION["iduser"])){
     		 $username = "";
     	}

 			?>


 	<div id="uno">
		<a href='adcliente.php'><img src='img/clientes.png'/></a>
	</div>
	<div id="dos">
		<a href='adanimal.php'><img src='img/animales.png'/></a>
	</div>
	<div id="tres">
		<a href='adaccesorio.php'><img src='img/accesorios.png'/></a>
	</div>

	<p id="cliente">Clientes</p>
	<p id="animales">Animales</p>
	<p id="accesorios">Accesorios</p>

</body>
</html>