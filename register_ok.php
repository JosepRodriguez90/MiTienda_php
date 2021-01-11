<?php
	
header("Content-Type: text/html;charset=utf-8");

	$nick = $_POST["nick"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$passwordRepit = $_POST["passwordRepit"];

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
		//echo "Se ha conectado a la base de datos"."<br>";
	}
	//////////////////////////////////////

	
	if (!strcmp($passwordRepit , $password) == 0){
		echo "<script>alert('Contraseña incorrecta');</script>";
		include_once("register.html");

	}else{
			//Inserción de datos
			//Primero compruebo si el nick existe
		$instruccion = "select count(*) as cuantos from usuarios where nick = '$nick'";
		$res = mysqli_query($con, $instruccion);
		$datos = mysqli_fetch_assoc($res);
		

		if ($datos['cuantos'] == 0)
		{
			$instruccion = "insert into usuarios values ('$nick','$password','$email')";
			$res = mysqli_query($con, $instruccion);
			if (!$res) 
			{
				die("No se ha pordido crear el usuario");
			}
			else
			{
				echo "<script>alert('Usuario creado correctamente');</script>";
				include_once("login.html");
			}
		}
		else
		{
			if(strcmp($nick, "") == 0){
				echo "<script>alert('No se puede introducir un nick en blanco');</script>";
				include_once("register.html");
				
			}else 
			{
				echo "<script>alert('Lo sentimos, el nick $nick ya existe...');</script>";
				include_once("register.html");
			}

		}

	}


?>