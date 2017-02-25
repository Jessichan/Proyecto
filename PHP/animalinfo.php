<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Info de Animal</title>
    <link rel="stylesheet" href="css/animalinfo.css">
</head>
<body>
    <?php
        include_once "conec.php";

        session_start();

         if(!isset($_SESSION['iduser'])){
            header('Location: /php/proyecto/login.php');
        }


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
        }

        // Consigue el ID del animal y recoge su info
        $infoanimal = "SELECT * FROM animal WHERE idanimal = {$_GET['id']};";

        if ($result = $connection->query($infoanimal)) {
            if ($result){
                $obj = $result->fetch_object();
        echo "<div id='caja'>";
                echo "<input type='submit' name='desloguear' value='Desconectar'>";

                echo "<p id=saludo> Hola, $nombreusu</p>";

                    echo "<div id='foto'>";
                        echo "<p><img src='".$obj->imagen."' width='250px' height='250px'></p>";
                    echo "</div>";
                        echo "<div id='nombre'>";
                            echo "<h2><b> </b>".$obj->nombre."</h2>";
                        echo "</div>";
                        echo "<div id='raza'>";
                            echo "<p><b> </b>".$obj->raza."</p>";
                        echo "</div>";
                        echo "<div id='edad'>";
                            echo "<p><b> </b>".$obj->edad."</p>";
                        echo "</div>";
                        echo "<div id='descripcion'>";
                            echo "<p>".$obj->descripcion."</p>";
                        echo "</div>";
                        echo "<div id='precio'>";
                            echo "<p><h1>".$obj->precio." €</h1>";
                        echo "</div>";

        echo "</div>";
            }else
                echo "Imposible conseguir los datos";
        }else
            echo "Query Failed";


    ?>
    <input  id="alquiler" type="button" onclick=" location.href='/php/proyecto/alquiler.php' " value="Alquilar" style=cursor:pointer; name="alquila" />
</body>
</html>