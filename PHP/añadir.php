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

        if (isset($_POST["nombre"])) {
            $nom   = $_POST['nombre'];
            $ape   = $_POST['ape'];
            $tele  = $_POST['tfono'];
            $email = $_POST['email'];
            $user   = $_POST['user'];
            $tipo  = 'User';
            $pass   = ($_POST['pass']);

    $inser = "INSERT INTO cliente VALUES (NULL, '$nom', '$ape', '$tele', '$email', '$user', '$tipo', '$pass');";

      if (mysqli_query($connection, $inser)) {


        if ($result = $connection->query("SELECT * FROM cliente;")) {
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
              <th>Idcliente</th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Telefono</th>
              <th>Email</th>
              <th>Usuario</th>
              <th>Tipo</th>
              <th>Password</th>
          </thead>

      <?php

          //Añadir contenido a la tabla.

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
              echo "</tr>";
          }

          $result->close();
          unset($obj);
          //Cerrar la conexion con la base de datos.
          unset($connection);

      } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

    ?>

 <div id="caja">
        <img id="logo" src="/php/proyecto/img/logo.png">
        <form method="post">
            <div>
                <label>Nombre</label>
                <input name="nombre" type="text" maxlength="25" required>
            </div>
            <div>
                <label>Apellidos</label>
                <input name="ape" type="text" maxlength="50" required>
            </div>
            <div>
                <label>Telefono</label>
                <input name="tfono" type="tel" pattern="[0-9]{9}" required>
            </div>
            <div>
                <label>Email</label>
                <input name="email" type="email" maxlength="100" required>
            </div>
            <div>
                <label>Usuario</label>
                <input name="user" type="text" maxlength="15" required>
            </div>
            <div>
                <label>Password</label>
                <input name="pass" type="password" maxlength="16" required>
            </div>
            <input type="submit" value="Registrarse">
        </form>
    </div>
    </body>
</html>