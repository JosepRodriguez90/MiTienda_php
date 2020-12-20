<?php

@session_start();

function BD(){

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
}


?>