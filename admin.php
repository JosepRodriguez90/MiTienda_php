<?php

    error_reporting(0); 
 //no lanza mensaje de error, es para ocultar el error de que aparezce todo en la misma pagina (video php num. 9)

@session_start();
$nickLog=$_SESSION["nick_logueado"];

header("Content-Type: text/html;charset=utf-8");


	$servidor="localhost";
	$usuario="root";
	$contraseña="usbw";
	$bd="test";	

    $x=0;
    $z=0;
    $modificarProducto='';

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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="web.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <title>SuplementosJosep</title>
</head>


<!-- header -->
<header>


<div class="container-fluid bg-danger">
        <button class="btn btn-danger" onClick="deslogear()" name="cerrarses" value="cerrarses">Cerrar sesión</button>
    </div>

    <script language="javascript">      //utlitzem el llenguatge javascript
    function deslogear()    //funcio que li pots ficar el nom que vulguis, fa que apareixi els botos aceptar i cancelar.
    {
        if(confirm("¿Esta seguro que desea cerrar sesión?!")){  //si confirmma va al logout.php
            window.location.href='logout.php';
        }
    }
    </script>


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
                    <a class="nav-link active" href="admin.php"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M6.5 5.5a4 4 0 112.731 3.795.75.75 0 00-.768.18L7.44 10.5H6.25a.75.75 0 00-.75.75v1.19l-.06.06H4.25a.75.75 0 00-.75.75v1.19l-.06.06H1.75a.25.25 0 01-.25-.25v-1.69l5.024-5.023a.75.75 0 00.181-.768A3.995 3.995 0 016.5 5.5zm4-5.5a5.5 5.5 0 00-5.348 6.788L.22 11.72a.75.75 0 00-.22.53v2C0 15.216.784 16 1.75 16h2a.75.75 0 00.53-.22l.5-.5a.75.75 0 00.22-.53V14h.75a.75.75 0 00.53-.22l.5-.5a.75.75 0 00.22-.53V12h.75a.75.75 0 00.53-.22l.932-.932A5.5 5.5 0 1010.5 0zm.5 6a1 1 0 100-2 1 1 0 000 2z"></path></svg> Admin</a>
                </li>
            </ul>


        </div>
    </nav>  

</header>

<body>

<?php


echo 
("

<div class='container-fluid pt-3 row'>
  <div class='col-lg-4 col-xs-12'>
    <div class='list-group' id='list-tab' role='tablist'>
      <a class='list-group-item list-group-item-action active' id='list-insertar-list' data-toggle='list' href='#list-insertar' role='tab' aria-controls='Añadir'>Añadir</a>
      <a class='list-group-item list-group-item-action' id='list-modificar-list' data-toggle='list' href='#list-modificar' role='tab' aria-controls='Modificar'>Modificar</a>
      <a class='list-group-item list-group-item-action' id='list-eliminar-list' data-toggle='list' href='#list-eliminar' role='tab' aria-controls='Eliminar'>Eliminar</a>
    </div>
  </div>
  <div class='col-lg-8 col-xs-12'>
    <div class='tab-content pt-3' id='nav-tabContent'>
      <div class='tab-pane fade show active' id='list-insertar' role='tabpanel' aria-labelledby='list-home-list'>

            <form class='form-inline' action='admin1.php' method = 'GET'>
            <div class='container'>
            
                <div class='input-group mb-3'>
                    <h5>Añadir producto
                </div>
            
                <div class='input-group mb-3'>
                    <div class='input-group-prepend'>
                        <span class='input-group-text' id='inputGroup-sizing-default'>Nombre</span>
                    </div>
                    <input type='text' class='form-control' placeholder='nombre del producto' aria-label='Recipient's username' aria-describedby='basic-addon2' name='nombre'>
                </div>
            
                <div class='input-group mb-3'>
                    <div class='input-group-prepend'>
                        <span class='input-group-text' id='inputGroup-sizing-default'>Precio</span>
                    </div>
                    <input type='text' class='form-control' placeholder='precio del producto' aria-label='Recipient's username' aria-describedby='basic-addon2' name='precio'>
                </div>
            
                <div class='input-group mb-3'>
                <div class='input-group-prepend'>
                    <span class='input-group-text' id='inputGroup-sizing-default'>Categoria</span>
                </div>
                <input type='text' class='form-control' placeholder='categoria del producto' aria-label='Recipient's username' aria-describedby='basic-addon2' name='categoria'>
                </div>
            
                <div class='input-group'>
                    <div class='form-group'>
                    <input type='file' class='textfield' name='imagen' id='exampleFormControlFile1' onchange='return verificationsAfterFieldChange('8c373fd1a64c1a3083fff348caf4b4ab', '1','blob')'>
                    </div>
                </div>
                <small id='emailHelp' class='form-text text-muted mb-3'>La imagen del producto tiene que ser inferior a 60KB</small>

                <div class='input-group-append'>
                    <input class='btn btn-dark' type='submit' value='Enviar'>
                </div>
            </div>
            </form>

      </div>");
?>

<?php

        $mipag=$_SERVER['PHP_SELF'];
                        
        $modificarProducto=$_GET['buscar'];
       

      echo ("<div class='tab-pane fade' id='list-modificar' role='tabpanel' aria-labelledby='list-profile-list'>
            <form class='form-inline' action='" . $mipag . "' method = 'GET'>
            <div class='container'>

                <div class='input-group mb-3'>
                    <h5>Modificar producto
                </div>

                <div class='input-group'>
                <form class='form-inline'>
                    <input class='form-control mr-sm-2 col-lg-4 col-xs-12' type='search' placeholder='Nombre producto' aria-label='Search' name='buscar'>
                    <button class='btn btn-outline-primary my-2 my-sm-0' type='submit'>Buscar</button>
                </form>
                </div>
                <small id='emailHelp' class='form-text text-muted'>Introduzca el nombre completo del producto</small>");

                $consultaBuscar="SELECT * FROM productos WHERE NOMBRE = '$modificarProducto'";

                $resultados=mysqli_query($conexion, $consultaBuscar);

                if($x==0){
                    $insertarBuscar="INSERT INTO buscar (nombre)
                    VALUES ('$modificarProducto')";
                    $resultadosBuscar=mysqli_query($conexion, $insertarBuscar);

                    $x=$x+1;
                }
                


                while($fila=mysqli_fetch_array($resultados, MYSQL_ASSOC)){
      
                    echo ("<form class='form-inline' action='admin2.php' method = 'GET'>
                            <div class='pt-4'>

                                <div class='input-group mb-3'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text' id='inputGroup-sizing-default'>Nuevo nombre</span>
                                    </div>
                                    <input type='text' class='form-control' placeholder='Recipient's username' value='" . $fila['nombre'] ."' aria-label='Recipient's username' aria-describedby='basic-addon2' name='nuevoNombre'>
                                </div>

                                <div class='input-group mb-3'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text' id='inputGroup-sizing-default'>Precio</span>
                                    </div>
                                    <input type='text' class='form-control' placeholder='Recipient's username' value='" . $fila['precio'] ."' aria-label='Recipient's username' aria-describedby='basic-addon2' name='precio'>
                                </div>

                                <div class='input-group-append'>
                                    <input class='btn btn-dark' type='submit' value='Enviar'>
                                </div>
                            </div>
                            </form>");
                    }


?>


            </div>
            </form>         
      
      </div>
      
      
      <?php

        $mipag=$_SERVER['PHP_SELF'];

        $borrarProducto=$_GET['buscarborrar'];
       

      echo ("<div class='tab-pane fade' id='list-eliminar' role='tabpanel' aria-labelledby='list-messages-list'>
            <form class='form-inline' action='" . $mipag . "' method = 'GET'>
            <div class='container'>

                <div class='input-group mb-3'>
                    <h5>Borrar producto
                </div>

                <div class='input-group'>
                <form class='form-inline'>
                    <input class='form-control mr-sm-2 col-lg-4 col-xs-12' type='search' placeholder='Nombre producto' aria-label='Search' name='buscarborrar'>
                    <button class='btn btn-outline-primary my-2 my-sm-0' type='submit'>Buscar</button>
                </form>
                </div>
                <small id='emailHelp' class='form-text text-muted'>Introduzca el nombre completo del producto</small>");


                $consultaBuscar="SELECT * FROM productos WHERE NOMBRE = '$borrarProducto'";

                $resultados=mysqli_query($conexion, $consultaBuscar);


                if($z==0){
                    $borrarBuscar="INSERT INTO buscar (nombre)
                    VALUES ('$borrarProducto')";
                    $resultadosBuscar1=mysqli_query($conexion, $borrarBuscar);

                    $z=$z+1;
                }


                while($fila=mysqli_fetch_array($resultados, MYSQL_ASSOC)){
      
                    echo ("<div class='producto col-xs-12 col-sm-6 col-md-3'>" . "<img src='data:image/jpg; base64," . base64_encode($fila['imagen']) . "'>" . " 
                            <h6>" . $fila['nombre'] ."</h6>
                             <h5 class='text-secondary'><strong>" . $fila['precio'] . "€</strong></h5>

                             <form class='form-inline' action='admin3.php' method = 'GET'>
                             <button type='submit' class='btn btn-danger'>Borrar</button> 
                             </form>
                            </div>");
                    }

                    
?>
      
      
      </div>
    </div>
  </div>
</div>





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>