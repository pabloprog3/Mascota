<?php


include 'clases/usuario.php';

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];

$encontrado=0;

$consulta = Usuario::cargarUsuarios();


foreach ($consulta as $i)
  {
  	$usuario = array();
  	$usuario["nombre"] = trim($i->GetNombre());
  	$usuario["correo"] = trim($i->GetCorreo());


 	if ($usuario["nombre"] == $nombre  && $usuario["correo"] == $correo) 
 	{
 		$encontrado = 1;
 		break;
 	}
 	else
 		$encontrado = 0;
 }



 if ($encontrado == 1) 
 	echo  "Usuario Encontrado";

 else
 	echo "Usuario no encontrado";


?>