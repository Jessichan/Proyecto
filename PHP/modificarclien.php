<html>
<head>
    <meta charset="utf-8">
    <title>Show Vehicles</title>
</head>
<body>

    <?php
       include_once "conec.php";

        if(!$_GET['id'])
            header("Location: adcliente.php");

        $idCliente = $_GET['id'];

        $clienteid;
        $clientenombre;
        $clienteapellido;
        $clientelefono;
        $clienteemail;
        $clienteusuario;
        $clientetipo;
        $clientepassword;

        if ($result = $connection->query("SELECT * FROM cliente WHERE idcliente = $idCliente")){
        // if ($result = $connection->query("SELECT * FROM cliente WHERE idcliente = 1")){

            if($result->num_rows > 0){
                $valor = $result->fetch_object();

                $clienteid = $valor->idcliente;
                $clientenombre = $valor->nombre;
                $clienteapellido = $valor->apellidos;
                $clientetelefono = $valor->telefono;
                $clienteemail = $valor->email;
                $clienteusuario = $valor->usuario;
                $clientetipo = $valor->tipo;
                $clientepassword = $valor->password;
            }else
                echo "No clients found.";
        }else
            echo "<br><br>Query wrong.";

    ?>

        <?php
        if (isset($_POST["id"])) : ?>
        <form method="post">
            <div>
                <label>Id</label>
                <input name="id" type="text" value="<?php echo $clienteid; ?>" maxlength="25" required>
            </div>
            <div>
                <label>Nombre</label>
                <input name="nombre" type="text" value="<?php echo $clientenombre; ?>" maxlength="25" required>
            </div>
            <div>

                <label>Apellidos</label>
                <input name="ape" type="text" value="<?php echo  $clienteapellido; ?>" maxlength="50" required>
            </div>
            <div>
                <label>Telefono</label>
                <input name="tfono" type="tel" value="<?php echo $clientetelefono; ?>" pattern="[0-9]{9}" required>
            </div>
            <div>
                <label>Email</label>
                <input name="email" type="email" value="<?php echo $clienteemail; ?>" maxlength="100" required>
            </div>
            <div>
                <label>Usuario</label>
                <input name="user" type="text" value="<?php echo  $clienteusuario; ?>" maxlength="15" required>
            </div>
            <div>
                <label>Password</label>
                <input name="pass" type="password" value="<?php echo $clientepassword; ?>" maxlength="50" required>
            </div>
            <input type="submit" value="Modificar">
        </form>


<?php

include_once "conec.php";

    $cod=$_POST['id'];
        $consulta1= "DELETE FROM cliente VALUES('$cod','".$_POST['id']."','".$_POST['nombre']."','".$_POST['ape']."','".$_POST['tfono']."','".$_POST['email']."', '".$_POST['user']."', '".$_POST['pass']."')";

       $consulta2= "INSERT INTO cliente VALUES('$cod','".$_POST['id']."','".$_POST['nombre']."','".$_POST['ape']."','".$_POST['tfono']."','".$_POST['email']."', '".$_POST['user']."', '".$_POST['pass']."')";


       var_dump($consulta);

       $result = $connection->query($consulta);

       if (!$result) {
            echo "Query Error";
       } else {
             echo "New client added";
       }

     ?>



 ?>





</body>
</html>

