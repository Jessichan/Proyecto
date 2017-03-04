<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar cliente</title>
    <link rel="stylesheet" type="text/css" href="css/agregartienealquiler.css ">
    <style>
        span {
        width: 100px;
        display: inline-block;
        }
    </style>
</head>
<body>
    <form method="post">
        <fieldset>
            <legend><h3>Tiene Alquiler</h3></legend>
            <span>idcliente:</span><input type="text" name="id" maxlength="50" required><br>
            <span>Fecha:</span><input type="date" name="fecha" maxlength="50" required><br>
            <span>Idanimal:</span><input type="integer" name="idanimal" maxlength="5" required><br>
            <span>Cantidad:</span><input type="integer" name="cantidad" maxlength="10" required><br>
            <span><input id= "enviar" type="submit" value="Enviar"></span><br>
            <span><input id="volver" type="button" onclick=" location.href='/php/proyecto/adtienealquiler.php' " value="Volver" style=cursor:pointer; name="boton" />
            </span>
        </fieldset>
    </form>

    <?php
        include_once "conec.php";

        session_start();

        //si no estas logueado redirecciona a login
        $nombreusu = "";
        if(!isset($_SESSION['iduser'])){
            header('Location: /php/proyecto/login.php');
        }

        //evitar que administrador acceda a paginas de usuario
        if(isset($_SESSION["iduser"])){
            if($_SESSION["tipouser"] != "Admin"){
              session_destroy();
            header('Location: login.php');
            }
        }else
        header('Location: login.php');


        if (isset($_POST["fecha"])){

          $idcliente = $_POST['id'];
          $fecha  = $_POST['fecha'];

            //Agregar datos en alquiler
            $consulta = "INSERT INTO alquiler VALUES(NULL , '$idcliente', '$fecha');";

            $result = $connection->query($consulta);

                if (!$result)
                echo "Query Error";
        }

        //Conseguir id de tabla alquiler que se autoincrementa
        $alquilerID;
        $conseguirIDAlquiler = "SELECT AUTO_INCREMENT
                                FROM information_schema.tables
                                WHERE table_name = 'alquiler' AND
                                table_schema = 'animalshop';
                                ";

        if ($result = $connection->query($conseguirIDAlquiler)){
            if ($result)
                $alquilerID = $result->fetch_object()->AUTO_INCREMENT - 1;
                else{
                    echo "Error al obtener el ID de alquiler.";
                    $alquilerCorrecto = false;
                }
        }else
            echo "Wrong Query";

        if (isset($_POST["idanimal"])){

            $idanimal   = $_POST['idanimal'];
            $cantidad   = $_POST['cantidad'];

            //Agregar en la tanla tiene
            $consulta = "INSERT INTO tiene VALUES('$idanimal', '$alquilerID', '$cantidad');";

           $result = $connection->query($consulta);

           if (!$result)
              echo "Query Error";
        }
    ?>
</body>
</html>