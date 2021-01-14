<?php

include 'ProductosPorDefecto.php';

@session_start();
$nickLog=$_SESSION["nick_logueado"];

header("Content-Type: text/html;charset=utf-8");

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


?>

<?php

    $nombre1 = $_POST["nombre1"];
    $nombre2 = $_POST["nombre2"];
    $nombre3 = $_POST["nombre3"];


    if(strcmp($nombre1 , 'Proteina 1kg amix')){

        $ordenar="SELECT * FROM productos WHERE id=1";
        $resultados=mysqli_query($conexion, $ordenar);
        $fila=mysqli_fetch_row($resultados);
                    
        $nombre=$fila[1];
        $precio=$fila[2];
    
    
    
        $instruccion = "SELECT count(*) as cuantos from cesta where nombre_producto = '$nombre'";
        $resultado = mysqli_query($conexion, $instruccion);
    
        while ($fila = $resultado->fetch_assoc()) {
            $numero=$fila["cuantos"];
        }
        if($numero==0){
            $instruccion = "INSERT INTO cesta (nombre_producto, precio, cantidad, cliente)
            VALUES ('$nombre','$precio',1,'$nickLog')";
            $resultado = mysqli_query($conexion, $instruccion);
    
            echo "<script>alert('El producto añadido a la cesta!');</script>";
            
        }
        else{
            $instruccion = "UPDATE cesta
            SET cantidad = cantidad+1
            WHERE nombre_producto='$nombre' AND cliente='$nickLog'";
            $resultado = mysqli_query($conexion, $instruccion);
    
        }

    }elseif(!strcmp($nombre2 , 'Proteina 1kg olymp (DBZ limited)')){

        $ordenar="SELECT * FROM productos WHERE id=2";
        $resultados=mysqli_query($conexion, $ordenar);
        $fila=mysqli_fetch_row($resultados);
                    
        $nombre=$fila[1];
        $precio=$fila[2];
    
    
    
        $instruccion = "SELECT count(*) as cuantos from cesta where nombre_producto = '$nombre'";
        $resultado = mysqli_query($conexion, $instruccion);
    
        while ($fila = $resultado->fetch_assoc()) {
            $numero=$fila["cuantos"];
        }
        if($numero==0){
            $instruccion = "INSERT INTO cesta (nombre_producto, precio, cantidad, cliente)
            VALUES ('$nombre','$precio',1,'$nickLog')";
            $resultado = mysqli_query($conexion, $instruccion);
    
            echo "<script>alert('El producto añadido a la cesta!');</script>";
            
        }
        else{
            $instruccion = "UPDATE cesta
            SET cantidad = cantidad+1
            WHERE nombre_producto='$nombre' AND cliente='$nickLog'";
            $resultado = mysqli_query($conexion, $instruccion);
    
        }

    }elseif(!strcmp($nombre3 , 'Glutamine 1kg met-rx')){

        $ordenar="SELECT * FROM productos WHERE id=3";
        $resultados=mysqli_query($conexion, $ordenar);
        $fila=mysqli_fetch_row($resultados);
                    
        $nombre=$fila[1];
        $precio=$fila[2];
    
    
    
        $instruccion = "SELECT count(*) as cuantos from cesta where nombre_producto = '$nombre'";
        $resultado = mysqli_query($conexion, $instruccion);
    
        while ($fila = $resultado->fetch_assoc()) {
            $numero=$fila["cuantos"];
        }
        if($numero==0){
            $instruccion = "INSERT INTO cesta (nombre_producto, precio, cantidad, cliente)
            VALUES ('$nombre','$precio',1,'$nickLog')";
            $resultado = mysqli_query($conexion, $instruccion);
    
            echo "<script>alert('El producto añadido a la cesta!');</script>";
            
        }
        else{
            $instruccion = "UPDATE cesta
            SET cantidad = cantidad+1
            WHERE nombre_producto='$nombre' AND cliente='$nickLog'";
            $resultado = mysqli_query($conexion, $instruccion);
    
        }
    }


	include_once("cesta.php");


?>
