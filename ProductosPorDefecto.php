<!-- Mostrar productos para comprar -->

<?php

header("Content-Type: text/html;charset=utf-8");

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


<?php
  

    function productosPorDefecto(){

    @session_start();
    $nickLog=$_SESSION["nick_logueado"];
    
    
        $servidor="localhost";
        $usuario="root";
        $contraseña="usbw";
        $bd="test";	
    
    
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
        
        
        
        


    $ordenar="SELECT * FROM productos WHERE id=1";

    $resultados=mysqli_query($conexion, $ordenar);
    
    $fila=mysqli_fetch_row($resultados);



    $nombre=$fila[1];
    $precio=$fila[2];
    $imagen=$fila[3];


        echo 
        "<div class='producto col-xs-12 col-sm-6 col-md-3'>
            <form class='form-inline' action='ProductosPorDefecto1.php'>
                <div class='producto col-12'>" . "<img src='data:image/jpg; base64," . base64_encode($imagen) . "'>" . " 
                        <h6>$nombre</h6>
                        <h5 class='text-secondary'><strong>" . $precio . "€</strong></h5>
                    <button type='submit' class='btn btn-success'>Añadir a la cesta</button> 
                </div>

            </form>
        </div>";

    }

?>


    </div>
</div>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
