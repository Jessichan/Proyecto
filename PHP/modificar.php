<html>
<head>
    <meta charset="utf-8">
    <title>Show Vehicles</title>
</head>
<body>

    <?php
        $idcliente = "";

       include_once "conec.php";


        if ($result = $connection->query("SELECT idcliente FROM cliente")){

            if($result->num_rows > 0){
                var_dump($result);
                $r = $result->fetch_object();
                    $id = $r->idcliente;
            }else
                echo "No clients found.";
        }else
            echo "<br><br>Query wrong.";

    ?>

            <form method="post">
            <div>
                <label>Nombre</label>
                <input name="nombre" type="text" value="$idcliente" maxlength="25" required>
            </div>
            <div>

                <label>Apellidos</label>
                <input name="ape" type="text" maxlength="50" required>
            </div>
            <div>
                <label>Telefono</label>
                <input name="tfono" type="tel" pattern="[0-9]{9}" required>
            </div>
            <div>
                <label>Email</label>
                <input name="email" type="email" maxlength="100" required>
            </div>
            <div>
                <label>Usuario</label>
                <input name="user" type="text" maxlength="15" required>
            </div>
            <div>
                <label>Password</label>
                <input name="pass" type="password" maxlength="16" required>
            </div>
            <input type="submit" value="Modificar">
        </form>
</body>
</html>

<input type="text" name="" value="$idcliente" placeholder="">