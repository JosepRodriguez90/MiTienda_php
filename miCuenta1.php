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



$nuevoContraseña=$_GET['contraseña'];
$nuevoEmail=$_GET['email'];




$instruccion = "UPDATE usuarios
            SET password = '$nuevoContraseña', email = '$nuevoEmail'
            WHERE nick='$nickLog'";

$res = mysqli_query($conexion, $instruccion);

include_once("miCuenta.php");

?>
