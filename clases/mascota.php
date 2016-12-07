<?php


class Mascota
{
	
	private $_nombre;
	private $_edad;
	private $_fechaNac;
	private $_tipo;
	private $_sexo;
	private $_foto;
	
 //++++++++++++++++++++++++++++++++   GETTERS   +++++++++++++++++++++++++++++++++++++++++++++++

	public function GetNombre()
	{
		return $this->_nombre;
	}


	public function GetEdad()
	{
		return $this->_edad;
	}


	public function GetFecha()
	{
		return $this->_fechaNac;
	}

	public function GetTipo()
	{
		return $this->_tipo;
	}


	public function GetSexo()
	{
		return $this->_sexo;
	}

	public function GetPathFoto()
	{
		return $this->_foto;
	}

 //++++++++++++++++++++++++++++++++   SETTERS   +++++++++++++++++++++++++++++++++++++++++++++++

	public function SetNombre($valor)
	{
		$this->_nombre=$valor;
	}


	public function SetEdad($valor)
	{
		$this->_edad=$valor;
	}


	public function SetFecha($valor)
	{
		$this->_fechaNac=$valor;
	}

	public function SetTipo($valor)
	{
		$this->_tipo=$valor;
	}


	public function SetSexo($valor)
	{
		$this->_sexo=$valor;
	}

	public function SetPathFoto($valor)
	{
		$this->_foto = $valor;
	}

//*********************************************************************************************************

	function __construct($nombre, $edad, $fecha, $tipo, $sexo)
	{
		$this->_nombre = $nombre;
		$this->_edad = $edad;
		$this->_fechaNac = $fecha;
		$this->_tipo = $tipo;
		$this->_sexo= $sexo;
		//$this->_foto=$foto;
	}


	public function toString()
	{
		return $this->GetNombre()."|".$this->GetEdad()."|".$this->GetFecha()."|".$this->GetTipo()."|".$this->GetSexo()."\r\n";
	}



	public static function escribirArchivo($mascota)
	{
		//$archivo = fopen('../archivos/mascotas.txt', 'a');
		$archivo = fopen('../archivos/mascotas.txt', 'a');

		$str = $mascota->toString();

		fwrite($archivo, $str);

		fclose($archivo);



	}

	public static function traerMascotas()
	{
		$arrayDeMascotas = array();
		$archivo = fopen('../archivos/mascotas.txt', 'r');

		$cont=-1;

		while (!feof($archivo)) 

		{
			++$cont;
			$lasMascotas = fgets($archivo);
			$mascota = explode('|', $lasMascotas);

			$mascota[0] = trim($mascota[0]);

			$arrayDeMascotas[] = new Mascota($mascota[0], $mascota[1], $mascota[2], $mascota[3], $mascota[4]);
		}

		fclose($archivo);

		//var_dump($arrayDeMascotas);

		if($cont >= 0)

			return $arrayDeMascotas;
		else
			return -1;

	}

	public static function borrarMascota($unNombre)
	{
	 

		$ListaDeMascotasLeidos = Mascota::traerMascotas();
		$ListaDeMascotas = array();
		$resultado = false;
		
		foreach ($ListaDeMascotasLeidos as $i) {
			if($ListaDeMascotasLeidos[$i]->edad == $unNombre)
				continue;

			$ListaDeMascotas[$i] = $ListaDeMascotasLeidos[$i];
		}


		$ar = fopen("../archivos/mascotas.txt", "w");
		
		foreach($ListaDeMascotas as $item){
			fwrite($ar, $item->toString());
			
		}

		fclose($ar);

		return $resultado;

	}


public static function Subir($name)
{
	$retorno["Exito"] = TRUE;

		$destino = "fotos/".$name.".jpg";
		
		$tipoArchivo = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);

		if ($_FILES["foto"]["size"] > 5000000) {
			$retorno["Exito"] = FALSE;
			$retorno["Mensaje"] = "El fotoarchivo es demasiado grande. Verifique!!!";
			return $retorno;
		}

		$esImagen = getimagesize($_FILES["foto"]["tmp_name"]);

		if($esImagen === FALSE) {//NO ES UNA IMAGEN
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



public static function Eliminar($codBarra)
	{
		if($codBarra == NULL)
			return FALSE;
			
		$resultado = TRUE;
		
		$ListaDeProductosLeidos = Mascota::TraerMascotas();
		$ListaDeProductos = array();
		$imagenParaBorrar = NULL;
		
		for($i=0; $i<count($ListaDeProductosLeidos); $i++){
			if($ListaDeProductosLeidos[$i]->edad == $codBarra){//encontre el borrado, lo excluyo
				$imagenParaBorrar = trim($ListaDeProductosLeidos[$i]->foto);
				continue;
			}else
				$ListaDeProductos[$i] = $ListaDeProductosLeidos[$i];
		}

		
		$ar = fopen("../archivos/mascotas.txt", "w");
		
		//ESCRIBO EN EL ARCHIVO
		foreach($ListaDeProductos as $item){
			fwrite($ar, $item->toString());
			
			if($cant < 1)
			{
				$resultado = FALSE;
				break;
			}
		}
		
		//CIERRO EL ARCHIVO
		fclose($ar);
		
		return $resultado;
	}


}//FIN DE LA CLASE




?>