<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar</title>
    <link rel="stylesheet" type="text/css" href="css/borrar.css ">
</head>
<body>
    <?php

        include_once "conec.php";


        if (!empty($_GET)) {
                $id="";

        if (!empty($_GET['id']))
              $id=$_GET['id'];


       //MAKING A SELECT QUERY
      /* Consultas de selección que devuelven un conjunto de resultados */
        $result = $connection->query("DELETE FROM animal where Idanimal=$id");
        }
    ?>

    <echo><p>Animal Borrado</p></echo>

    <form method="post">
        <input id="volver" type="button" onclick=" location.href='/php/proyecto/adanimal.php' " value="Volver" style=cursor:pointer; name="boton" />
    </form>
</body>
</html>