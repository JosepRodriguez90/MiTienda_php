<!-- INSERTAR PRODUCTO -->
<?php

@session_start();
$nickLog=$_SESSION["nick_logueado"];

header("Content-Type: text/html;charset=utf-8");

$servidor="localhost";
$usuario="root";
$contraseña="usbw";
$bd="test";	

$id=0;

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

//////////////////////////////////////////////////////////



    $image = $_FILES['imagen']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));

    
    $image = $_FILES['imagen']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));

    $nuevoNombre=$_POST['nombre'];
    $nuevoPrecio=$_POST['precio'];
    $nuevoCategoria=$_POST['categoria'];



    $instruccion = "INSERT INTO productos(id, nombre, precio, imagen, categoria) VALUES ('$id','$nuevoNombre','$nuevoPrecio','$imgContent','$nuevoCategoria')";

    $resultado = mysqli_query($conexion, $instruccion);

    

    echo "<script>alert('Nuevo producto añadido con éxito!');</script>";

    include_once("web.php");


?>
