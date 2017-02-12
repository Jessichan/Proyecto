<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
  </head>
  <body>
      <?php
          include_once "conec.php";

      session_start();
    if(isset($_POST["desloguear"])){
      session_destroy();
      header('Location: /php/proyecto/login.php');
    }

    if(isset($_SESSION["iduser"])){
        $nombreusu = "";

          // Consigue nombre de usuario
            $nombreusu = "SELECT nombre
                         FROM cliente
                         WHERE idcliente = {$_SESSION['iduser']}
                        ";

            if ($result = $connection->query($nombreusu)) {
                if ($result->num_rows > 0)
                    $nombreusu = $result->fetch_object()->nombre;
                else
                    echo "No se ha encontrado el nombre de usuario";
            }else
                echo "Wrong Query";


          $infoanimal="SELECT * FROM animal WHERE animalid = {$_GET['id']};";

          $result=$connection->query($infoanimal);

          if (!$result) {
            echo "Query Failed";
          } else {
            $obj=$result->fetch_object();


            echo "<p>".$obj->imagen. "'width='250px' height='250px'></p>";

            echo "<p><b>Nombre-> </b>".$obj->Nombre."</p>";
            echo "<p><b>Raza-> </b>".$obj->raza."</p>";
            echo "<p><b>Edad-> </b>".$obj->edad."</p>";
            echo "<p><b>Descripcion-> </b>".$obj->descripcion."</p>";
            echo "<p><b>Precio-> </b>".$obj->precio."</p>";

          }
        }

      ?>

  </body>
</html>