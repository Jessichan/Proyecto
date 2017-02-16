<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href=" ">
    <style>
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
  </head>
  <body>

      <!-- PHP STRUCTURE FOR CONDITIONAL HTML -->
      <!-- FIRST TIME. NO DATA IN THE POST (checking a required form field) -->
      <!-- So we must show the form -->

      <?php
		if (!isset($_POST["nombre"])) : ?>
        <form method="post">
          <fieldset>
            <legend>CLIENTE</legend>
            <span>Nombre:</span><input type="text" name="nombre"><br>
            <span>Apellidos:</span><input type="text" name="ape"><br>
            <span>Telefono:</span><input type="text" name="tel"><br>
            <span>Email:</span><input type="text" name="email"><br>
            <span>Usuario:</span><input type="text" name="usu"><br>
            <span>Tipo:</span><input type="text" name="tipo"><br>
            <span>Pasword:</span><input type="text" name="pass"><br>
	    <span><input type="submit" value="Enviar"><br>
	  </fieldset>
        </form>

      <?php else: ?>

      <?php

            include_once "conec.php";

  	   $consulta = "INSERT INTO cliente VALUES(NULL,'".$_POST['nombre']."','".$_POST['ape']."','".$_POST['tel']."','".$_POST['email']."','".$_POST['usu']."','".$_POST['tipo']."','".$_POST['pass']."')";


  	   $result = $connection->query($consulta);

  	   if (!$result) {
   		    echo "Query Error";
       } else {
  		     echo "cliente añadido";
  	   }

     ?>

      <?php endif ?>
      <span><input type="button" onclick=" location.href='/php/proyecto/adcliente.php' " value="Volver" style=cursor:pointer; name="boton" />
  </body>
</html>