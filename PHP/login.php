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

            $login = "SELECT * FROM cliente
                      WHERE username = '{$_POST['user']}' AND
                            password = '{$_POST['pass']}';
                     ";

            if ($result = $connection->query($login)) {

                if ($result->num_rows > 0) {
                    header('Location: menu.php');
                } else{
                    // echo "Invalid Login";
                }
            }else
                echo "Wrong Query";
        }
    ?>

    <center><img id="logo" src="/php/proyecto/img/logo.png"></center>
        <form class='login' method="post">
        <div><center>
            <label>Username</label>
            <input name="user" type="text" required>
        </div></center>
        <div><center>
            <label>Password</label>
            <input name="pass" type="password" required>
        </div></center>
        <div><center>
            <input type="submit" value="Log In">
        </div></center>
        <div><center>No tienes cuenta? <a href="sign_up.php">Sign Up</a></div></center>
    </form>

</body>
</html>

