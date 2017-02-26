<html>
<head>
    <meta charset="utf-8">
    <title>Modificar</title>
     <link rel="stylesheet" type="text/css" href="css/editarcliente.css ">
    <style>
        span {
            width: 100px;
            display: inline-block;
        }
    </style>
</head>
<body>

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


        if(!$_GET['id'])
            header("Location: adalquiler.php");

        $idalquiler = $_GET['id'];

        $alquilerid;
        $alquilercliid;
        $alquilerfecha;


        if ($result = $connection->query("SELECT * FROM alquiler WHERE idalquiler = $idalquiler")){


            if($result->num_rows > 0){
                $valor = $result->fetch_object();

                $alquilerid = $valor->idalquiler;
                $alquilercliid = $valor->idcliente;
                $alquilerfecha = $valor->fecha;
            }else
                echo "No alquileres encontrados.";
        }else
            echo "<br><br>Query wrong.";

    ?>


    <form method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><h3>Alquiler</h3></legend>
            <span>Idalquiler:</span><input name="idalquiler" type="text" value="<?php echo $alquilerid; ?>" maxlength="11" required><br>
            <span>Idcliente:</span><input name="idcliente" type="text" value="<?php echo $alquilercliid; ?>" maxlength="11" required><br>
            <span>Fecha:</span><input name="fecha" type="date" value="<?php echo  $alquilerfecha; ?>" required><br>
            <span><input id= "Modificar" type="submit" value="Modificar"></span><br>
            <span><input id="Volver" type="button" onclick=" location.href='/php/proyecto/adalquiler.php' " value="Volver" style=cursor:pointer; name="boton" />
            </span>
        </fieldset>
    </form>

     <?php

        // Editar Clientes cuando se haya enviado por POST el ID
        if (isset($_POST['id'])) {


        $idalquiler = $_POST['id'];
        $idcliente  = $_POST['idcliente'];
        $fecha      = $_POST['fecha'];

        // 1. Eliminar
         if ($result = $connection->query("DELETE FROM alquiler WHERE idalquiler = $id")){
                if ($result == false)
                    echo "error: imposible eliminar alquiler";
         }else
            echo "consulta invalida";

        // 2. Agregar
        $consulta = "INSERT INTO alquiler VALUES($idalquiler, '$idcliente', '$fecha');";

           $result = $connection->query($consulta);
           if (!$result)
                echo "Query Error";
        }
        ?>

</body>
</html>

