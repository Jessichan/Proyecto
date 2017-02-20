<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar cliente</title>
    <link rel="stylesheet" type="text/css" href="css/agregartiene.css">
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
            <legend><h3>Tiene</h3></legend>
            <span>Idanimal:</span><input type="integer" name="idanimal" maxlength="5" required><br>
            <span>Idalquiler:</span><input type="integer" name="idalquiler" maxlength="5" required><br>
            <span>Cantidad:</span><input type="integer" name="cantidad" maxlength="10" required><br>
            <span><input id= "enviar" type="submit" value="Enviar"></span><br>
            <span><input id="volver" type="button" onclick=" location.href='/php/proyecto/adtiene.php' " value="Volver" style=cursor:pointer; name="boton" />
            </span>
        </fieldset>
    </form>

    <?php
        include_once "conec.php";

        if (isset($_POST["idanimal"])){

            $idanimal   = $_POST['idanimal'];
            $idalquiler = $_POST['idalquiler'];
            $cantidad   = $_POST['cantidad'];

           $consulta = "INSERT INTO tiene VALUES('$idanimal', '$idalquiler', '$cantidad');";

           $result = $connection->query($consulta);

           if (!$result)
              echo "Query Error";
           else
               echo "Tiene añadido";
        }
    ?>
</body>
</html>