<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GETTING DATA FROM A MYSQL DATABASE</title>
    <link rel="stylesheet" href="css/taalquiler.css">
  </head>
  <body>
    <?php

       include_once "conec.php";

      //MAKING A SELECT QUERY
      /* Consultas de selección que devuelven un conjunto de resultados */
      if ($result = $connection->query("SELECT * FROM tiene;")) {

            if ($result){
         /* PRINT THE TABLE AND THE HEADER */
            echo "<table style='border:1px solid black;'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Idanimal</th>";
            echo "<th>Idalquiler</th>";
            echo "<th>Cantidad</th>";
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
              echo "<td>".$obj->idanimal."</td>";
              echo "<td>".$obj->idalquiler."</td>";
              echo "<td>".$obj->cantidad."</td>";
              echo "<td><a href='añadir.php?id=".$obj->idanimal."'><img src='img/añadir.png' width='15px' height='15px'/></a></td>";
              echo "<td><a href='modificar.php?id=".$obj->idanimal."'><img src='img/modificar.jpg' width='15px'height='15px'/></a></td>";
              echo "<td><a href='borrar.php?id=".$obj->idanimal."'><img src='img/borrar.png' width='15px' height='15px'/></a></td>";
              echo "</tr>";
          }

          //Free the result. Avoid High Memory Usages
          $result->close();
          unset($obj);
          unset($connection);

      }
      //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

    ?>
  </body>
</html>