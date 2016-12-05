<?php

include 'clases/usuario.php';
include 'clases/mascota.php';


$queHago = $_POST['queHacer'];

switch ($queHago) {
	case 'registrarUsuario':

		$nombre=$_POST['nombre'];
		$correo=$_POST['correo'];

		$usuarioNuevo = new Usuario($nombre, $correo);

		Usuario::escribirUsuario($usuarioNuevo->GetNombre(), $usuarioNuevo->GetCorreo());
		
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

			//$obj = isset($_POST['mascota']) ? json_decode(json_encode($_POST['mascota'])) : NULL;


				//$obj = isset($_POST['mascota']) ? json_decode(json_encode($_POST['mascota'])) : NULL;

				if (isset($_POST['mascota']))
				 {
					$obj = json_encode($_POST['mascota']);
				}
				else
					$obj = NULL;
		
				Mascota::borrarMascota($obj->nombre);

				$valor = $obj->nombre;

				echo "$valor";

		break;

}









?>