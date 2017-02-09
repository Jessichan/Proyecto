<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar</title>
  </head>
  <body>
    <?php

        include_once "conec.php";


      if (!empty($_GET)) {
        $id="";

        if (!empty($_GET['id']))
              $id=$_GET['id'];


       //MAKING A SELECT QUERY
      /* Consultas de selección que devuelven un conjunto de resultados */
      $result = $connection->query("DELETE FROM animal where Idcanimal=$id");
        if ($result) {
          echo "<br>Borrado correctamente el animal con id ".$id;
          echo "<br><br><a href='adanimal.php'><input type='submit' value='Refresh'></a>";
          }else{
            echo "<br>ID incorrecto.";
          }




      }

    ?>
  </body>
</html>