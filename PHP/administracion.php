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



<a href='adcliente.php'><img src='img/clientes.png' width='200px' height='200px'/></a>
<a href='adanimal.php'><img src='img/animales.jpg' width='200px' height='200px'/></a>
<a href='adaccesorio.php'><img src='img/accesorios.png' width='200px' height='200px'/></a>

	<p>Clientes</p>
	<p>Animales</p>
	<p>Accesorios</p>

</body>
</html>