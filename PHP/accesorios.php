<!DOCTYPE html>
<html>
<head>
	<title>Animales</title>
	<link rel="stylesheet" href="css/animales.css">
</head>
<body>

 	<?php
		include_once "conec.php";

	    session_start();
    if(isset($_POST["desloguear"])){
      session_destroy();
      header('Location: /php/proyecto/login.php');
    }

    if(isset($_SESSION["iduser"])){
      	$nombreusu = "";

      		// Consigue nombre de usuario
            $nombreusu = "SELECT nombre
                         FROM cliente
                         WHERE idcliente = {$_SESSION['iduser']}
                        ";

            if ($result = $connection->query($nombreusu)) {
                if ($result->num_rows > 0)
                    $nombreusu = $result->fetch_object()->nombre;
                else
                    echo "No se ha encontrado el nombre de usuario";
            }else
                echo "Wrong Query";


  			// coger datos de los animales
			$nombreacces = [];
			$precioacces = [];
			$imagenacces = [];

            $cogeracce = "SELECT * FROM accesorio;";


            if ($result = $connection->query($cogeracce)) {
                if ($result->num_rows > 0){
                	while($accesorio = $result->fetch_object()){
                		array_push($nombreacces, $accesorio->nombre);
                		array_push($precioacces, $accesorio->precio);
                		array_push($imagenacces, $accesorio->imagen);
                	}
                }else
                    echo "No se ha encontrado accesorio";
            }else
                echo "Query fallida";
		}else
			header('Location: /php/proyecyo/login.php');
	?>

	<img id="enca" src="/php/proyecto/img/porta.jpg">
  <div id="caja">
        <form method="post" id="Desconectar">
      <input type="submit" name="desloguear" value="Desconectar">
        </form>
        <?php echo "<p id=\"saludo\"> Hola, $nombreusu</p>" ?>
        <br>

		<div id="contenido">
			<?php
				for($i=0;$i<count($nombreacces);$i++){
	    			echo "<div class='animal'>";
	    			echo "<img src='".$imagenacces[$i]."'>";
	    			echo "<h3>".$nombreacces[$i]."</h3>";
	    			echo "<p>".$precioacces[$i]."€</p>";
	    			echo "</div>";
				}
			?>
		</div>
    </div>
</body>
</html>