<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar animal</title>
    <link rel="stylesheet" type="text/css" href="css/agregaranimal.css ">
    <style>
        span {
            width: 100px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><h3>Animal</h3></legend>
            <span>Especie:</span><input type="text" name="especie" maxlength="20" required><br>
            <span>Nombre:</span><input type="text" name="nombre" maxlength="25" required><br>
            <span>Raza:</span><input type="text" name="raza" maxlength="50" required><br>
            <span>Edad:</span><input type="text" name="edad" maxlength="10" required><br>
            <span>Descripcion:</span><input type="text" name="descrip" maxlength="500" required><br>
            <span>Precio:</span><input type="decimal" name="precio" maxlength="5,2" required><br>
            <span>Imagen:</span><input type="file" name="image"><br>
            <span>
                <input id= "enviar" type="submit" value="Enviar">
            </span><br>
            <span>
                <input id="volver" type="button" onclick=" location.href='/php/proyecto/adanimal.php' " value="Volver" style=cursor:pointer; name="boton" />
            </span>
        </fieldset>
    </form>

    <?php
        include_once "conec.php";

        if (isset($_POST["nombre"])){
            $tmp_file = $_FILES['image']['tmp_name'];
            $target_dir = "img/";
            $target_file = strtolower($target_dir . basename($_FILES['image']['name']));

            $valid = true;

            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $valid = false;
            }

            if($_FILES['image']['size'] > (2048000)) {
                $valid = false;
                echo 'Oops!  Your file\'s size is to large.';
            }

            $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
            if ($file_extension != "jpg" &&
                $file_extension != "jpeg" &&
                $file_extension != "png" &&
                $file_extension != "gif") {
                $valid = false;
                echo "Only JPG, JPEG, PNG & GIF files are allowed";
            }

            if ($valid) {
                move_uploaded_file($tmp_file, $target_file);

                $especie = $_POST['especie'];
                $nombre  = $_POST['nombre'];
                $raza    = $_POST['raza'];
                $edad    = $_POST['edad'];
                $descrip = $_POST['descrip'];
                $precio  = $_POST['precio'];

                $consulta = "INSERT INTO animal
                             VALUES(NULL, '$especie', '$nombre', '$raza', '$edad', '$descrip', $precio, '$target_file');
                            ";

                $result = $connection->query($consulta);

                if (!$result)
                   echo "Query Error";
                else
                   echo "animal añadido";
            }
        }
    ?>
</body>
</html>













