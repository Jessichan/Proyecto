<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GETTING DATA FROM A MYSQL DATABASE</title>
  </head>
  <body>
    <?php

       include_once "conec.php";

      //MAKING A SELECT QUERY
      /* Consultas de selección que devuelven un conjunto de resultados */
      if ($result = $connection->query("SELECT * FROM cliente;")) {

         if ($result){
            /* PRINT THE TABLE AND THE HEADER */
            echo "<table style='border:1px solid black;'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>idcliente</th>";
            echo "<th>nombre</th>";
            echo "<th>apellidos</th>";
            echo "<th>telefono</th>";
            echo "<th>email</th>";
            echo "<th>usuario</th>";
            echo "<th>tipo</th>";
            echo "<th>password</th>";
            echo "<th>Añadir</th>";
            echo "<th>Modificar</th>";
            echo "<th>Borrar</th>";
            echo "</thead>";
          }
      ?>


      <?php

          //FETCHING OBJECTS FROM THE RESULT SET
          //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
          while($obj = $result->fetch_object()) {
              //PRINTING EACH ROW
              echo "<tr>";
              echo "<td>".$obj->idcliente."</td>";
              echo "<td>".$obj->nombre."</td>";
              echo "<td>".$obj->apellidos."</td>";
              echo "<td>".$obj->telefono."</td>";
              echo "<td>".$obj->email."</td>";
              echo "<td>".$obj->usuario."</td>";
              echo "<td>".$obj->tipo."</td>";
              echo "<td>".$obj->password."</td>";
              echo "<td><a href='/php/proyecto/añadir.php?id=".$obj->idcliente."'><img src='img/borrar.png' width='15px' height='15px'/></a></td>";
              echo "<td><a href='/php/proyecto/modificar.php?id=".$obj->idcliente."'><img src='img/editar.jpg' width='15px'height='15px'/></a></td>";
              echo "<td><a href='/php/proyecto/borrar.php?id=".$obj->idcliente."'><img src='img/mostrar.png' width='15px' height='15px'/></a></td>";
              echo "</tr>";
          }

          //Free the result. Avoid High Memory Usages
          $result->close();
          unset($obj);
          unset($connection);

      } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

    ?>
  </body>
</html>
