<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar cliente</title>
    <link rel="stylesheet" type="text/css" href="css/agregaralquiler.css ">
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
              <legend><h3>Alquiler</h3></legend>
            <span>idcliente:</span><input type="text" name="id" maxlength="50" required><br>
            <span>Fecha:</span><input type="date" name="fecha" maxlength="50" required><br>
      <span><input id= "enviar" type="submit" value="Enviar"><br>
      <span><input id="volver" type="button" onclick=" location.href='/php/proyecto/adalquiler.php' " value="Volver" style=cursor:pointer; name="boton" />
        </fieldset>
        </form>

      <?php
        include_once "conec.php";

        session_start();

        //si no estas logueado redirecciona a login
        $nombreusu = "";
        if(!isset($_SESSION['iduser'])){
            header('Location: /php/proyecto/login.php');
        }

        //evitar que administrador acceda a paginas de usuario
        if(isset($_SESSION["iduser"])){
            if($_SESSION["tipouser"] != "Admin"){
              session_destroy();
            header('Location: login.php');
            }
        }else
        header('Location: login.php');


        if (isset($_POST["fecha"])){

          $idcliente = $_POST['id'];
          $fecha  = $_POST['fecha'];


           $consulta = "INSERT INTO alquiler VALUES(NULL , '$idcliente', '$fecha');";

           $result = $connection->query($consulta);

           if (!$result)
              echo "Query Error";
           else
               echo "Alquiler añadido";
        }
     ?>
  </body>
</html>