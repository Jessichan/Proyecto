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
      	$nombreusu = "";

      		// Consigue nombre de usuario
            $nombreusu = "SELECT nombre
                         FROM cliente
                         WHERE idcliente = {$_SESSION['iduser']}
                        ";

            if ($result = $connection->query($nombreusu)) {
                if ($result->num_rows > 0)
                    $nombreusu = $result->fetch_object()->nombre;
                else
                    echo "No se ha encontrado el nombre de usuario";
            }else
                echo "Wrong Query";
     }
 			?>



<div id="caja">
        <form method="post" id="Desconectar">
      <input type="submit" name="desloguear" value="Desconectar">
        </form>
        <?php echo "<p id=\"saludo\"> Hola, $nombreusu</p>" ?>
</div>
 	<div id="uno">
		<a href='adcliente.php'><img src='img/clientes.png' /></a>
	</div>
	<div id="dos">
		<a href='adanimal.php'><img src='img/animales.png' width="220"px height="230"px/></a>
	</div>
	<div id="tres">
		<a href='adaccesorio.php'><img src='img/accesorios.png' width="230"px height="230"px/></a>
	</div>
	<div id="cuatro">
		<a href='adalquiler.php'><img src='img/alquiler.png' width="230"px height="230"px/></a>
	</div>

	<p id="cliente">Clientes</p>
	<p id="animales">Animales</p>
	<p id="accesorios">Accesorios</p>
	<p id="alquiler">Alquiler</p>

</body>
</html>