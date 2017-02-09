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

        $animalid;
        $animalespecie;
        $animalnombre;
        $animalraza;
        $animaledad;
        $animaldescripcion;
        $animalprecio;
        $animalimagen;

        if ($result = $connection->query("SELECT * FROM animal WHERE idanimal = $idanimal")){
        // if ($result = $connection->query("SELECT * FROM cliente WHERE idcliente = 1")){

            if($result->num_rows > 0){
                $valor = $result->fetch_object();

                $animalid = $valor->idanimal;
                $animalespecie = $valor->especie;
                $animalnombre = $valor->nombre;
                $animalraza = $valor->raza;
                $animaledad = $valor->edad;
                $animaldescripcion = $valor->descripcion;
                $animalprecio = $valor->precio;
                $animalimagen = $valor->imagen;
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
                <input name="id" type="text" value="<?php echo $animalid; ?>" maxlength="25" required>
            </div>
            <div>
                <label>Especie</label>
                <input name="nombre" type="text" value="<?php echo $animalespecie; ?>" maxlength="25" required>
            </div>
            <div>

                <label>Nombre</label>
                <input name="ape" type="text" value="<?php echo  $animalnombre; ?>" maxlength="50" required>
            </div>
            <div>
                <label>Raza</label>
                <input name="tfono" type="tel" value="<?php echo $animalraza; ?>" pattern="[0-9]{9}" required>
            </div>
            <div>
                <label>Edad</label>
                <input name="email" type="email" value="<?php echo $animaledad; ?>" maxlength="100" required>
            </div>
            <div>
                <label>Descripcion</label>
                <input name="user" type="text" value="<?php echo  $animaldescripcion; ?>" maxlength="15" required>
            </div>
            <div>
                <label>Precio</label>
                <input name="pass" type="password" value="<?php echo $animalprecio; ?>" maxlength="50" required>
            </div>
             <div>
                <label>Imagen</label>
                <input name="pass" type="password" value="<?php echo $animalimagen; ?>" maxlength="50" required>
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

