<!DOCTYPE html>
<html>
<head>
  <title>Menu</title>
  <link rel="stylesheet" href="css/menu1.css">
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
      $username = "";

      // Consigue nombre de usuario
            $nombreusu = "SELECT nombre
                         FROM cliente
                         WHERE idcliente = {$_SESSION['iduser']}
                        ";

            if ($result = $connection->query($nombreusu)) {
                if ($result->num_rows > 0)
                    $nombreusuario = $result->fetch_object()->nombre;
                else
                    echo "Imposible conseguir nombre de usuario";
            }else
                echo "Wrong Query";
    }else
      header('Location: /php/proyecto/login.php');
  ?>

<img id="enca" src="/php/proyecto/img/porta.jpg">
  <div id="caja">
        <form method="post" id="Desconectar">
      <input type="submit" name="desloguear" value="Desconectar">
        </form>
        <?php echo "<p id=\"saludo\"> Hola, $nombreusuario</p>" ?>
        <br>
        <input id="ani" type="button" onclick=" location.href='/php/proyecto/animales.php' " value="Animales" name="boton2" />
        <input  id="ac" type="button" onclick=" location.href='/php/proyecto/accesorios.php' " value="Accesorios" name="boton1" />
    <div id="contenido">

    </div>
  </div>
</body>
</html>