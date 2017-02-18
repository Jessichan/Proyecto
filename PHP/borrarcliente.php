<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar</title>
    <link rel="stylesheet" type="text/css" href="css/borrarcliente.css ">
  </head>
  <body>
    <?php

        include_once "conec.php";


      if (!empty($_GET)) {
        $id="";

        if (!empty($_GET['id']))
              $id=$_GET['id'];



      /* Consultas de selección que devuelven un conjunto de resultados */
      $result = $connection->query("DELETE FROM cliente where Idcliente=$id");
      }
    ?>

      <echo><p>cliente borrado</p></echo>

      <form method="post">
      <input id="volver" type="button" onclick=" location.href='/php/proyecto/adcliente.php' " value="Volver" style=cursor:pointer; name="boton" />
      </form>



  </body>
</html>