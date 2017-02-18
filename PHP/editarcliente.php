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

        $idcliente = $_GET['id'];

        $clienteid;
        $clientenombre;
        $clienteapellido;
        $clientelefono;
        $clienteemail;
        $clienteusuario;
        $clientetipo;
        $clientepassword;

        if ($result = $connection->query("SELECT * FROM cliente WHERE idcliente = $idcliente")){
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
                <label>Tipo</label>
                <input name="tipo" type="text" value="<?php echo  $clientetipo; ?>" maxlength="15" required>
            </div>
            <div>
                <label>Password</label>
                <input name="pass" type="password" value="<?php echo $clientepassword; ?>" maxlength="50" required>
            </div>
            <input type="submit" value="Modificar">
        </form>


 <?php

        if (isset($_POST['id'])) {

        //variables
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $apellidos=$_POST['ape'];
        $telefono=$_POST['tfono'];
        $email=$_POST['email'];
        $usuario=$_POST['user'];
        $tipo=$_POST['tipo'];
        $password=$_POST['pass'];

        //consulta
        $consulta="UPDATE  cliente SET
        'id' =  '$id',
        'nombre' =  '$nombre',
        'ape' =  '$apellidos',
        'tfono' =  '$telefono',
        'email' =  '$email',
        'user' =  '$usuario',
        'tipo' = '$tipo',
        'pass' = md5('$password'),
        WHERE  `id` =$idcliente;";


        if ($result = $connection->query($consulta))

           {
          header ("Location: editarcliente.php");
        } else {

              echo "Error: " . $result . "<br>" . mysqli_error($connection);
        }
      }



        ?>

</body>
</html>