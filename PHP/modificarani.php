<html>
<head>
    <meta charset="utf-8">
    <title>Show Vehicles</title>
</head>
<body>

    <?php
       include_once "conec.php";

        if(!$_GET['id'])
            header("Location: adanimal.php");

        $idanimal = $_GET['id'];

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



        <form method="post">
            <div>
                <label>Id</label>
                <input name="id" type="text" value="<?php echo $animalid; ?>" maxlength="11" required>
            </div>
            <div>
                <label>Especie</label>
                <input name="esp" type="text" value="<?php echo $animalespecie; ?>" maxlength="20" required>
            </div>
            <div>

                <label>Nombre</label>
                <input name="nom" type="text" value="<?php echo  $animalnombre; ?>" maxlength="25" required>
            </div>
            <div>
                <label>Raza</label>
                <input name="raza" type="text" value="<?php echo $animalraza; ?>" maxlength="50" required>
            </div>
            <div>
                <label>Edad</label>
                <input name="edad" type="text" value="<?php echo $animaledad; ?>" maxlength="10" required>
            </div>
            <div>
                <label>Descripcion</label>
                <input name="des" type="text" value="<?php echo  $animaldescripcion; ?>" maxlength="500" required>
            </div>
            <div>
                <label>Precio</label>
                <input name="precio" type="text" value="<?php echo $animalprecio; ?>" maxlength="6" required>
            </div>
             <div>
                <label>Imagen</label>
                <input name="text" type="text" value="<?php echo $animalimagen; ?>" maxlength="50" required>
            </div>
            <input type="submit" value="Modificar">
        </form>

</body>
</html>

