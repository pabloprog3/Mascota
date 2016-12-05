<?php


class Mascota
{
	
	private $_nombre;
	private $_edad;
	private $_fechaNac;
	private $_tipo;
	private $_sexo;
	
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

//*********************************************************************************************************

	function __construct($nombre, $edad, $fecha, $tipo, $sexo)
	{
		$this->_nombre = $nombre;
		$this->_edad = $edad;
		$this->_fechaNac = $fecha;
		$this->_tipo = $tipo;
		$this->_sexo= $sexo;
	}


	public function toString()
	{
		return $this->GetNombre()."|".$this->GetEdad()."|".$this->GetFecha()."|".$this->GetTipo()."|".$this->GetSexo()."\r\n";
	}



	public static function escribirArchivo($mascota)
	{
		//$archivo = fopen('../archivos/mascotas.txt', 'a');
		$archivo = fopen('archivos/mascotas.txt', 'a');

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
		
		for($i=0; $i<count($ListaDeMascotasLeidos); $i++){
			if($ListaDeMascotasLeidos[$i]->GetNombre() == $unNombre)
			{
				$resultado = true;
				continue;
			}
			else
				$ListaDeMascotas[$i] = $ListaDeMascotasLeidos[$i];
		}


		$ar = fopen("archivos/mascotas.txt", "w");
		
		foreach($ListaDeMascotas as $item){
			$cant = fwrite($ar, $item->toString());

			print($item);
			
			if($cant < 1)
			{
				$resultado = FALSE;
				break;
			}
		}

		fclose($ar);

		return $resultado;

	}


}//FIN DE LA CLASE




?>