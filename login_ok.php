<?php
	
session_start();

$logueado=0;
	
header("Content-Type: text/html;charset=utf-8");


	$nick = $_POST["nick"];
	$password = $_POST["password"];

	$servidor="localhost";
	$usuario="root";
	$contraseña="usbw";
	$bd="test";	

	$con = mysqli_connect($servidor, $usuario, $contraseña, $bd) or die(mysql_error());
	
	if (!$con)
	{
		die("No se ha podido realizar la corrección ERROR:" . mysqli_connect_error() . "<br>");
	}
	else
	{
		mysqli_set_charset ($con, "utf8");
		//echo "Se ha conectado a la base de datos" . "<br>";
	}
	
	$instruccion = "select count(*) as cuantos from profesores where nick = '$nick'";
	$resultado = mysqli_query($con, $instruccion);

	while ($fila = $resultado->fetch_array()) {
		$numero=$fila["cuantos"];
	}
	if($numero==0){
		echo "El usuario no existe";
	}
	else{
		$instruccion = "select password as cuantos from usuarios where nick = '$nick'";
		$resultado = mysqli_query($con, $instruccion);
		
	while ($fila = $resultado->fetch_array()) {
		$password2=$fila["cuantos"];
	}

	/////////////////

	if (!strcmp($password2 , $password) == 0){
			echo "Contraseña incorrecta";
	}
	
	else{
		echo "Login OK";
		$_SESSION["nick_logueado"]=$nick;
		?> 
		
		<a href="web.html"></a>
		
		<?php
		
		
		$logueado=1;
	}
	}
	
	





?>