<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href="css/agregarclien.css ">
    <style>
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
  </head>
  <body>
        <form method="post">
            <fieldset>
              <legend><h3>Cliente</h3></legend>
            <span>Nombre:</span><input type="text" name="nombre" required><br>
            <span>Apellidos:</span><input type="text" name="ape" required><br>
            <span>Telefono:</span><input type="text" name="tel" required><br>
            <span>Email:</span><input type="text" name="email" required><br>
            <span>Usuario:</span><input type="text" name="usu" required><br>
            <span>Tipo:</span><input type="text" name="tipo" required><br>
            <span>Pasword:</span><input type="text" name="pass" required><br>
      <span><input id= "enviar" type="submit" value="Enviar"><br>
      <span><input id="volver" type="button" onclick=" location.href='/php/proyecto/adcliente.php' " value="Volver" style=cursor:pointer; name="boton" />
        </fieldset>
        </form>

      <?php
        include_once "conec.php";

        if (isset($_POST["nombre"])){
      	   $consulta = "INSERT INTO cliente VALUES(NULL,'".$_POST['nombre']."','".$_POST['ape']."','".$_POST['tel']."','".$_POST['email']."','".$_POST['usu']."','".$_POST['tipo']."','".$_POST['pass']."')";

      	   $result = $connection->query($consulta);

      	   if (!$result)
       		    echo "Query Error";
           else
               echo "cliente añadido";
        }
     ?>
  </body>
</html>