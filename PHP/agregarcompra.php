<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar cliente</title>
    <link rel="stylesheet" type="text/css" href="css/agregarcompra.css ">
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
              <legend><h3>Compra</h3></legend>
            <span>Idcliente:</span><input type="integer" name="idcliente" maxlength="5" required><br>
            <span>Idaccesorio:</span><input type="integer" name="idaccesorio" maxlength="5" required><br>
            <span>Cantidad:</span><input type="integer" name="cantidad" maxlength="5" required><br>
            <span>Preciototal:</span><input type="decimal" name="preciototal" maxlength="4,2" required><br>
      <span><input id= "enviar" type="submit" value="Enviar"><br>
      <span><input id="volver" type="button" onclick=" location.href='/php/proyecto/adcompra.php' " value="Volver" style=cursor:pointer; name="boton" />
        </fieldset>
        </form>

      <?php
        include_once "conec.php";

        if (isset($_POST["idcliente"])){
           $consulta = "INSERT INTO compra VALUES('".$_POST['idcliente']."','".$_POST['idaccesorio']."','".$_POST['cantidad']."','".$_POST['preciototal']."')";

           $result = $connection->query($consulta);

           if (!$result)
              echo "Query Error";
           else
               echo "compra añadida";
        }
     ?>
  </body>
</html>