<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>registrar</title>
    <link rel="stylesheet" href="css/sigin.css">
</head>
<body>

    <?php
        include_once "conec.php";

        if (isset($_POST["especie"])) {
            $esp   = $_POST['especie'];
            $nom   = $_POST['nombre'];
            $raza  = $_POST['raza'];
            $edad = $_POST['edad'];
            $desc   = $_POST['descripcion'];
            $precio  = $_POST['precio'];
            $imag   = ($_POST['imagen']);

    $inser = "INSERT INTO animal VALUES (NULL, '$esp', '$nom', '$raza', '$edad', '$desc', '$precio', '$imag');";

      //if (mysqli_query($connection, $inser)) {


        if ($result = $connection->query("SELECT * FROM animal;")) {
            printf("<p>The select query returned %d rows.</p>", $result->num_rows);
      } else {
          //en caso de que el insert falle, imprimimos Error: + la consulta y el error que produce
          echo "Error: " . $inser . "<br>" . mysqli_error($connection);
      }


    ?>

<!-- PRINT THE TABLE AND THE HEADER -->
          <table style="border:1px solid black">
          <thead>
            <tr>
              <th>Idanimal</th>
              <th>Especie</th>
              <th>Nombre</th>
              <th>Raza</th>
              <th>Edad</th>
              <th>Descripcion</th>
              <th>Precio</th>
              <th>Imagen</th>
          </thead>

      <?php

          //Añadir contenido a la tabla.

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
              echo "</tr>";
          }

          //$result->close();
          //unset($obj);
          //Cerrar la conexion con la base de datos.
          //unset($connection);

      //} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

    ?>

 <div id="caja">
       <form method="post">
            <div>
                <label>Id</label>
                <input name="id" type="text" value="<?php echo $animalid; ?>" maxlength="11" required>
            </div>
            <div>
                <label>Especie</label>
                <input name="esp" type="text" value="<?php echo $animalespecie; ?>" maxlength="20" required>
            </div>
            <div>

                <label>Nombre</label>
                <input name="nom" type="text" value="<?php echo  $animalnombre; ?>" maxlength="25" required>
            </div>
            <div>
                <label>Raza</label>
                <input name="raza" type="text" value="<?php echo $animalraza; ?>" maxlength="50" required>
            </div>
            <div>
                <label>Edad</label>
                <input name="edad" type="text" value="<?php echo $animaledad; ?>" maxlength="10" required>
            </div>
            <div>
                <label>Descripcion</label>
                <input name="des" type="text" value="<?php echo  $animaldescripcion; ?>" maxlength="500" required>
            </div>
            <div>
                <label>Precio</label>
                <input name="precio" type="text" value="<?php echo $animalprecio; ?>" maxlength="6" required>
            </div>
             <div>
                <label>Imagen</label>
                <input name="text" type="text" value="<?php echo $animalimagen; ?>" maxlength="50" required>
            </div>
            <input type="submit" value="Modificar">
        </form>
    </body>
</html>