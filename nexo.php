<?php

include 'clases/usuario.php';
include 'clases/mascota.php';


$queHago = $_POST['queHacer'];

switch ($queHago) {
	case 'registrarUsuario':

		$nombre=$_POST['nombre'];
		$correo=$_POST['correo'];
		$clave=$_POST['clave'];

		$usuarioNuevo = new Usuario($nombre, $correo, $clave);

		Usuario::escribirUsuario($usuarioNuevo->GetNombre(), $usuarioNuevo->GetCorreo(), $usuarioNuevo->GetClave());
		
		break;


	case 'validarUsuario':

		$nombre=$_POST['nombre'];
		$correo=$_POST['correo'];
		
		
		if(Usuario::validarLogin($nombre, $correo) == 'Exito')
			return "Exito";
		else
			return "NO";


		break;

		case 'subirFoto':
			$nameFoto=$_POST["nombre"];
			$res = Usuario::Subir($nameFoto);

			echo  json_encode($res);


		break;

		case 'insertarMascota':

			$nombre = $_POST['nombre'];
			$edad = $_POST['edad'];
			$fecha = $_POST['fecha'];
			$tipo = $_POST['tipo'];
			$sexo = $_POST['sexo'];

			$mascota = new Mascota($nombre, $edad, $fecha, $tipo, $sexo);

			Mascota::escribirArchivo($mascota);

		break;

		case 'sacarMascota':

			$obj = $_POST['mascota']; //json_decode(json_encode($_POST['mascota']));

			if(Mascota::borrarMascota($obj))
				return 's';
			else
				return 'n';


		break;

	 case 'subirFoto':
	 		$nameFoto=$_POST["nombre"];
			$res = Mascota::Subir($nameFoto);

			echo  json_encode($res);

	 break;

}









?>
