<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
    <?php
        include_once "conec.php";

        session_start();

        //Si no estas logueado ve a login
        if(!isset($_SESSION['iduser'])){
            header('Location: /php/proyecto/login.php');
        }

        //si presionas desconectar, te lleva al login
        if(isset($_POST["desloguear"])){
            session_destroy();
            header('Location: /php/proyecto/login.php');
        }

        //evita que usuario acceda a paginas de admin
        if(isset($_SESSION["iduser"])){
                if($_SESSION["tipouser"] != "User"){
                    session_destroy();
                    header('Location: login.php');
                }
        }else
            header('Location: login.php');

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
                        echo "No se ha encontrado nombre de usuario";
            }else
                echo "Query fallida";
        }else
            header('Location: /php/proyecto/login.php');
    ?>

    <img id="enca" src="/php/proyecto/img/porta.jpg">
    <div id="caja">
        <form method="post" id="Desconectar">
            <input type="submit" name="desloguear" value="Desconectar" style=cursor:pointer;>
        </form>
        <?php echo "<p id=\"saludo\"> Hola, $nombreusuario</p>" ?>
        <br>
        <input id="ani" type="button" onclick=" location.href='/php/proyecto/animales.php' " value="Animales" style=cursor:pointer; name="boton2" />
        <input  id="ac" type="button" onclick=" location.href='/php/proyecto/accesorios.php' " value="Accesorios" style=cursor:pointer; name="boton1" />
    </div>
</body>
</html>