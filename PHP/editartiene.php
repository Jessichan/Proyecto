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
            header("Location: adtiene.php");

        $idanimal = $_GET['id'];

        $tieneidanimal;
        $tieneidalquiler;
        $tienecantidad;


        if ($result = $connection->query("SELECT * FROM tiene WHERE idanimal = $idanimal")){


            if($result->num_rows > 0){
                $valor = $result->fetch_object();

                $tieneidanimal   = $valor->idanimal;
                $tieneidalquiler = $valor->idalquiler;
                $tienecantidad    = $valor->cantidad;
            }else
                echo "No encontrado.";
        }else
            echo "<br><br>Query wrong.";

    ?>


    <form method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><h3>Alquiler</h3></legend>
            <span>Idanimal:</span><input name="idanimal" type="text" value="<?php echo $tieneidanimal; ?>" maxlength="11" required><br>
            <span>Idalquiler:</span><input name="idalquiler" type="text" value="<?php echo $tieneidalquiler; ?>" maxlength="11" required><br>
            <span>Cantidad:</span><input name="cantidad" type="text" value="<?php echo  $tienecantidad; ?>" required><br>
            <span><input id= "Modificar" type="submit" value="Modificar"></span><br>
            <span><input id="Volver" type="button" onclick=" location.href='/php/proyecto/adtiene.php' " value="Volver" style=cursor:pointer; name="boton" />
            </span>
        </fieldset>
    </form>

     <?php

        // Editar Clientes cuando se haya enviado por POST el ID
        if (isset($_POST['id'])) {


        $idanimal = $_POST['id'];
        $idalquiler  = $_POST['idalquiler'];
        $cantidad      = $_POST['cantidad'];

        // 1. Eliminar
         if ($result = $connection->query("DELETE FROM tiene WHERE idanimal = $id")){
                if ($result == false)
                    echo "error: imposible eliminar";
         }else
            echo "consulta invalida";

        // 2. Agregar
        $consulta = "INSERT INTO compra VALUES($idanimal, '$idalquiler', '$cantidad');";

           $result = $connection->query($consulta);
           if (!$result)
                echo "Query Error";
        }
        ?>

</body>
</html>