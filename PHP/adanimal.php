<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GETTING DATA FROM A MYSQL DATABASE</title>
    <link rel="stylesheet" href="css/tablas.css">
  </head>
  <body>
    <?php

       include_once "conec.php";

      //MAKING A SELECT QUERY
      /* Consultas de selección que devuelven un conjunto de resultados */
      if ($result = $connection->query("SELECT * FROM animal;")) {

            if ($result){
         /* PRINT THE TABLE AND THE HEADER */
            echo "<table style='border:1px solid black;'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Idanimal</th>";
            echo "<th>Especie</th>";
            echo "<th>Nombre</th>";
            echo "<th>Raza</th>";
            echo "<th>Edad</th>";
            echo "<th>Descripcion</th>";
            echo "<th>Precio</th>";
            echo "<th>Imagen</th>";
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
              echo "<td>".$obj->especie."</td>";
              echo "<td>".$obj->nombre."</td>";
              echo "<td>".$obj->raza."</td>";
              echo "<td>".$obj->edad."</td>";
              echo "<td>".$obj->descripcion."</td>";
              echo "<td>".$obj->precio."</td>";
              echo "<td>".$obj->imagen."</td>";
              echo "<td><a href='añadirani.php?id=".$obj->idanimal."'><img src='img/añadir.png' width='15px' height='15px'/></a></td>";
              echo "<td><a href='editarani.php?id=".$obj->idanimal."'><img src='img/modificar.jpg' width='15px'height='15px'/></a></td>";
              echo "<td><a href='borrarani.php?id=".$obj->idanimal."'><img src='img/borrar.png' width='15px' height='15px'/></a></td>";
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