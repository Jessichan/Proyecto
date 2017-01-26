<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sigin</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <?php
        include_once "conec.php";

        if (isset($_POST["nombre"])) {

            $sigin = "INSERT INTO cliente (nombre, apellidos, telefono, email, usuario, tipo, password)
                        values (nombre = '{$_POST['nombre']}', apellidos = '{$_POST['ape']}', telefono = '{$_POST['tfono']}',
                        email = '{$_POST['email']}', usuario = '{$_POST['user']}', tipo = '{$_POST['tipo']}', password = '{$_POST['pass']}';)";

            if ($result = $connection->query($sigin)) {

                if ($result->num_rows > 0) {
                    header('Location: menu.php');
                } else{
                    // echo "Invalid Login";
                }
            }else
                echo "Wrong Query";
        }
    ?>

    <div id="caja">
        <img id="logo" src="/php/proyecto/img/logo.png">
        <form method="post">
            <div>
                <label>Nombre</label>
                <input name="nombre" type="text" required>
            </div>
            <div>
                <label>Apellidos</label>
                <input name="ape" type="text" required>
            </div>
            <div>
                <label>Telefono</label>
                <input name="tfono" type="text" required>
            </div>
            <div>
                <label>Email</label>
                <input name="email" type="text" required>
            </div>
            <div>
                <label>Usuario</label>
                <input name="user" type="text" required>
            </div>
            <div>
                <label>Password</label>
                <input name="pass" type="password" required>
            </div>
            <input type="submit" value="Sig In"><a href="menu.php"></a>
        </form>
    </div>

</body>
</html>