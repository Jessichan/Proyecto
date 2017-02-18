<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar cliente</title>
    <link rel="stylesheet" type="text/css" href="css/agregaraccesorio.css">
    <style>
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
  <body>
        <form method="post">
            <fieldset>
              <legend><h3>Accesorio</h3></legend>
            <span>Nombre:</span><input type="text" name="nombre" maxlength="25" required><br>
            <span>Descripcion:</span><input type="text" name="descrip" maxlength="500" required><br>
            <span>Cantidad:</span><input type="text" name="cantidad" maxlength="10" required><br>
            <span>Precio:</span><input type="decimal" name="precio" maxlength="4,2" required><br>
            <span>Imagen:</span><input type="file" name="img" maxlength="500" required><br>
      <span><input id= "enviar" type="submit" value="Enviar"><br>
      <span><input id="volver" type="button" onclick=" location.href='/php/proyecto/adaccesorio.php' " value="Volver" style=cursor:pointer; name="boton" />
        </fieldset>
        </form>

      <?php
        include_once "conec.php";

        if (isset($_POST["nombre"])){

           $consulta = "INSERT INTO animal VALUES(NULL,'".$_POST['nombre']."','".$_POST['descrip']."','".$_POST['cantidad']."','".$_POST['precio']."','".$_POST['img']."')";

           $result = $connection->query($consulta);

           if (!$result)
              echo "Query Error";
           else
               echo "Accesorio añadido";
        }
     ?>
  </body>
</html>