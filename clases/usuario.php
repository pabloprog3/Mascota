<?php

class Usuario
{

	public $_nombre;
	public $_correo;


	public function GetNombre()
	{
		return $this->_nombre;
	}

	public function GetCorreo()
	{
		return $this->_correo;
	}

	public function SetNombre($valor)
	{
		$this->_nombre=$valor;
	}

	public function SetCorreo($valor)
	{
		$this->_correo=$valor;
	}


	public function toString()
	{
		$this->GetNombre()."-".$this->GetCorreo();
	}

	
	function __construct($nombre, $correo)
	{
		if ($nombre != null && $correo != null) 
		{
			$this->SetNombre($nombre);
			$this->SetCorreo($correo);
		}
	}



	public static function escribirUsuario($unNombre, $unCorreo)
	{
		//$usuarioNuevo = new Usuario($unNombre, $unCorreo);
		$string = $unNombre."-".$unCorreo."\r\n";

		$archivo=fopen('archivos/usuarios.txt', 'a');
		fwrite($archivo, $string);

		fclose($archivo); 
	}

	public static function cargarUsuarios()
	{
		$arrayDeUsuarios = array();

		$archivo=fopen('archivos/usuarios.txt', 'r');

		while (!feof($archivo)) 
		{
			$losUsuarios = fgets($archivo);
			$usuario = explode('-', $losUsuarios);

			$losUsuarios[0] = trim($losUsuarios[0]);
			if($losUsuarios[0] != ""){
				$arrayDeUsuarios[] = new Usuario($usuario[0], $usuario[1]);
			}
		}

		fclose($archivo);

		return $arrayDeUsuarios;
	}


	public static function validarLogin($nombre, $correo)
	{
		$listaDeUsuarios = Usuario::cargarUsuarios();
		$usuarioFind=null;

		//var_dump($listaDeUsuarios);

		$usuario = array();
		foreach ($listaDeUsuarios as $user) 
		{
			$usuario["nombre"] = $user->GetNombre();
			$usuario["correo"] = $user->GetCorreo();

			if($usuario["nombre"] == $nombre && $usuario["correo"] == $correo)
			{
				$usuarioFind = 1;
				break;
			}

		}

		if($usuarioFind == 1)
			return "Exito";
		else
			return "NO";
	}


	public static function subirFoto($nombre)
	{
		$retorno["Exito"] = TRUE;

		$destino = "fotos/".$name.".jpg";
		
		$tipoArchivo = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);

		//VERIFICO EL TAMAÑO MAXIMO QUE PERMITO SUBIR
		if ($_FILES["foto"]["size"] > 5000000) {
			$retorno["Exito"] = FALSE;
			$retorno["Mensaje"] = "El fotoarchivo es demasiado grande. Verifique!!!";
			return $retorno;
		}

		$esImagen = getimagesize($_FILES["foto"]["tmp_name"]);

		if($esImagen === FALSE) {
			$retorno["Exito"] = FALSE;
			$retorno["Mensaje"] = "Solo se permiten imagenes.";
			return $retorno;
		}
		else {

			if($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif"
				&& $tipoArchivo != "png") {
				$retorno["Exito"] = FALSE;
				$retorno["Mensaje"] = "Solamente son permitidas imagenes con extensi&oacute;n JPG, JPEG, PNG o GIF.";
				return $retorno;
			}
		}
		
		if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $destino)) {

			$retorno["Exito"] = FALSE;
			$retorno["Mensaje"] = "Ocurrio un error al subir el archivo. No pudo guardarse.";
			return $retorno;
		}
		else{
			$retorno["Mensaje"] = "Archivo subido exitosamente!!!"; 

			return $retorno;
		}
	}





}//FIN DE LA CLASE USUARIO











?>