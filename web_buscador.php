<?php
	
header("Content-Type: text/html;charset=utf-8");


	$buscar = $_GET["buscar"];

	$servidor="localhost";
	$usuario="root";
	$contraseña="usbw";
	$bd="test";	

	$c=0;

	$conexion = mysqli_connect($servidor, $usuario, $contraseña, $bd) or die(mysql_error());
	
	if (!$conexion)
	{
		die("No se ha podido realizar la corrección ERROR:" . mysqli_connect_error() . "<br>");
	}
	else
	{
		mysqli_set_charset ($conexion, "utf8");
		//echo "Se ha conectado a la base de datos" . "<br>";
    }


    $consultaBuscar="SELECT * FROM productos WHERE NOMBRE LIKE '%$buscar%'";

    $resultados=mysqli_query($conexion, $consultaBuscar);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="web.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>practica7</title>
</head>

<!-- header -->
<header>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="web.html">Tienda</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ordenar
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Ordenar por categoria</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Ordenar por precio</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Cesta</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Perfil</a>
                </li>

            </ul>


                <form class="form-inline" action="web_buscador.php" method = "GET">
                    <input class="form-control mr-sm-2" type="text" placeholder="Nombre producto" aria-label="Search" name="buscar">
                    <button class="btn btn-primary" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"></path>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"></path>
                        </svg>
                        <span class="visually-hidden">Buscar</span>
                    </button>
                </form>
        </div>
    </nav>

    <div>
        <img src="imagenes/Productos.jpg" alt="" class="header-img">
    </div>
    

</header>

<body>

    <div class="container all">
	  
		<?php

			echo "<br><br>";

			while($fila=mysqli_fetch_array($resultados, MYSQL_ASSOC)){

				echo $fila['nombre'];
				echo "  -  ";
				echo $fila['precio'] . "€";
				echo "<br>" . "<br>";


				$c++;
			}

			if($c==0){
				echo "No se encuentra el producto.<br><br>";
			}

		?>

	</div>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
