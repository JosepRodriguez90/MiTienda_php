<?php
	
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
	
	$instruccion = "select count(*) as cuantos from usuarios where nick = '$nick'";
	$resultado = mysqli_query($con, $instruccion);

	while ($fila = $resultado->fetch_assoc()) {
		$numero=$fila["cuantos"];
	}
	if($numero==0){
		echo "<script>alert('El usuario no existe');</script>";
		include_once("login.html");
	}
	else{
		$instruccion = "select password as cuantos from usuarios where nick = '$nick'";
		$resultado = mysqli_query($con, $instruccion);
		
	while ($fila = $resultado->fetch_assoc()) {
		$password2=$fila["cuantos"];
	}

	/////////////////

	if(strcmp($nick, "") == 0){
		echo "<script>alert('No se puede introducir un nick en blanco');</script>";
		include_once("login.html");
		
	}else{

		if (!strcmp($password2 , $password) == 0){
			echo "<script>alert('Contraseña incorrecta');</script>";
			include_once("login.html");

		}else{

			//echo "Login OK";
			@session_start();
			$_SESSION["nick_logueado"]=$nick;

			?> 
			
			<script language="javascript">    
			window.location.href='web.php';
    		</script>
			
			<?php
			
			
			$logueado=1;
			
		}
		}

	}
	


?>

