<!-- MODIFICAR PRODUCTO -->

<?php


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



$buscar = "SELECT * FROM buscar WHERE nombre != 1 AND nombre != ''";

$resultados = mysqli_query($conexion, $buscar);

$fila=mysqli_fetch_row($resultados);
$buscar=$fila[0];


$nuevoNombre=$_GET['nuevoNombre'];
$nuevoPrecio=$_GET['precio'];


$instruccion = "UPDATE productos
            SET nombre = '$nuevoNombre', precio = '$nuevoPrecio'
            WHERE nombre = '$buscar'";



$res = mysqli_query($conexion, $instruccion);



$delete = "DELETE FROM buscar";

$resdelete = mysqli_query($conexion, $delete);


echo "<script>alert('Producto modificado con éxito!');</script>";

include_once("admin.php");

?>
