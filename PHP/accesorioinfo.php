<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Info de Animal</title>
    <link rel="stylesheet" href="css/accesorioinfo.css">
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
        }

        // Consigue el ID del animal y recoge su info
        $infoacces = "SELECT * FROM accesorio WHERE idaccesorio = {$_GET['id']};";

        if ($result = $connection->query($infoacces)) {
            if ($result){
                $obj = $result->fetch_object();
        echo "<div id='caja'>";
                echo "<input type='submit' name='desloguear' value='Desconectar'>";

                echo "<p id=saludo> Hola, $nombreusu</p>";

            echo "<div id='foto'>";
                echo "<p><img src='".$obj->imagen."' width='250px' height='250px'></p>";
            echo "</div>";
                echo "<div id='info'>";
                echo "<p><b> </b>".$obj->nombre."</p>";
                echo "<p><b> </b>".$obj->descripcion."</p>";
                echo "<p><b> </b>".$obj->cantidad."</p>";
                echo "<p><b> </b>".$obj->precio." €</p>";
            echo "</div>";
        echo "</div>";
            }else
                echo "Imposible conseguir los datos";
        }else
            echo "Query Failed";


    ?>

</body>
</html>