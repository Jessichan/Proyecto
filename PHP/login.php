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

                echo $alguien;
                if(!empty($alguien)){
                    echo "Entra";
                    session_start();
                    $_SESSION["iduser"] = $alguien;
                    header("Location: /php/proyecto/menu.php");
                } else
                     echo "Login no valido";

                $query->close();
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
            <input type="submit" value="Entrar"></center>
        </div><center>
        <div>¿No tienes cuenta? <a href="/php/proyecto/sigin.php">Registrarse</a></div></center>
    </form>
    </div>
</body>
</html>

