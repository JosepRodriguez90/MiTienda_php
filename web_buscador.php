<?php

@session_start();

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="web.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>practica7</title>
</head>

<!-- header -->
<header>
    
    <div>
        <img src="imagenes/Productos.jpg" alt="" class="header-img">
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="web.php">Tienda</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M6.122.392a1.75 1.75 0 011.756 0l5.25 3.045c.54.313.872.89.872 1.514V7.25a.75.75 0 01-1.5 0V5.677L7.75 8.432v6.384a1 1 0 01-1.502.865L.872 12.563A1.75 1.75 0 010 11.049V4.951c0-.624.332-1.2.872-1.514L6.122.392zM7.125 1.69l4.63 2.685L7 7.133 2.245 4.375l4.63-2.685a.25.25 0 01.25 0zM1.5 11.049V5.677l4.75 2.755v5.516l-4.625-2.683a.25.25 0 01-.125-.216zm10.828 3.684a.75.75 0 101.087 1.034l2.378-2.5a.75.75 0 000-1.034l-2.378-2.5a.75.75 0 00-1.087 1.034L13.501 12H10.25a.75.75 0 000 1.5h3.251l-1.173 1.233z"></path></svg> Cesta</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M10.5 5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zm.061 3.073a4 4 0 10-5.123 0 6.004 6.004 0 00-3.431 5.142.75.75 0 001.498.07 4.5 4.5 0 018.99 0 .75.75 0 101.498-.07 6.005 6.005 0 00-3.432-5.142z"></path></svg> Mi cuenta</a>
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

    <div class="container-fluid">
        <div class="ordenar col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <select class="form-control">
                <option>Ordenar por defecto</option>
                <option>Ordenar por precio</option>
                <option>Ordenar por categoria</option>
            </select>
        </div>
    </div>
</header>

<body>

    <div class="container all p-3 my-3">
        <div class="row">
            <?php


                while($fila=mysqli_fetch_array($resultados, MYSQL_ASSOC)){


                                echo "<div class='producto col-xs-12 col-sm-6 col-md-3'>" . "<img src='data:image/jpg; base64," . base64_encode($fila['imagen']) . "'>" . " 
                                    <h6>" . $fila['nombre'] ."</h6>
                                    <h5 class='text-secondary'><strong>" . $fila['precio'] . "€</strong></h5>
                                    <button type='button' class='btn btn-danger'>Añadir a la cesta</button> 
                                </div>";


                    $c++;
                }


                if($c==0){
                    echo "No se encuentra el producto.<br><br>";
                }

            ?>
        </div>
	</div>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
