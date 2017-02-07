<html>
<head>
    <meta charset="utf-8">
    <title>Show Vehicles</title>
</head>
<body>

    <?php
        $marca = "";

       include_once "conec.php";


        if ($result = $connection->query("SELECT Matricula, Marca FROM vehiculos")){

            if($result->num_rows > 0){
                var_dump($result);
                $r = $result->fetch_object();
                    $marca = $r->Marca;
            }else
                echo "No clients found.";
        }else
            echo "<br><br>Query wrong.";

    ?>

</body>
</html>

<input type="text" name="" value="$marca" placeholder="">