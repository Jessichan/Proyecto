<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <?php
        include_once "conec.php";



        //Si el usuario esta logueado

         session_start();

        if (isset($_POST["user"])) {

            $user  = $_POST['user'];
            $pass = $_POST['pass'];


            $login = "SELECT idcliente FROM cliente
                      WHERE usuario = ? AND
                            password = ?;
                     ";
            if ($query = $connection->prepare($login)) {

                $query->bind_param("ss", $user, $pass);
                $query->execute();
                $query->bind_result($alguien);
                $query->fetch();


                   if (isset($_SESSION['user']) && $_SESSION['tipo']=="Admin") {
                            header('Location: administracion.php');
                            } else {
                            header('Location: menu.php');
                            $query->close();
                }
            }
        }


    ?>

    <div id="caja">
        <img id="logo" src="/php/proyecto/img/logo.png">
        <form class='login' method="post">
        <div>
            <label>Username</label>
            <input name="user" type="text" required>
        </div>
        <div>
            <label>Password</label>
            <input name="pass" type="password" required>
        </div>
        <div><center>
            <input type="submit" value="Entrar" style=cursor:pointer;></center>
        </div><center>
        <div>¿No tienes cuenta? <a href="/php/proyecto/sigin.php">Registrarse</a></div></center>
    </form>
    </div>
</body>
</html>

