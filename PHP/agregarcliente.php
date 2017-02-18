<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar cliente</title>
    <link rel="stylesheet" type="text/css" href="css/agregarcliente.css ">
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
            <span>Nombre:</span><input type="text" name="nombre" maxlength="25" required><br>
            <span>Apellidos:</span><input type="text" name="ape" maxlength="50" required><br>
            <span>Telefono:</span><input type="tel" name="tel" pattern="[0-9]{9}" required><br>
            <span>Email:</span><input type="email" name="email" maxlength="100" required><br>
            <span>Usuario:</span><input type="text" name="usu" maxlength="15" required><br>
            <span>Tipo:</span><input type="text" name="tipo" maxlength="20" required><br>
            <span>Pasword:</span><input type="text" name="pass" maxlength="50" required><br>
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