<?php 


/**
* Es este archivo irán diferentes funciones y clases para el manejo de la base de datos
*
* Este archivo tiene las funciones y clases de conexión, busqueda y logica respecto a la base
* de datos, y todo lo relacionado con el blog.
*
*
*/

include('mundiales.php');

/**
* codifica en base64 o al reves
*
* @param $dato es el dato a codificar o decodiciar
* @param $direccion es true si se va a codificar, y false si se va a decodificar
*
* @return dato cifrado o descifrado
*/
function base64($dato, $direccion)
{
	if($direccion)
		return base64_encode($dato);
	else
		return base64_decode($dato);
}


/**
* Clase del post
*
* Esta clase tiene los métodos y atributos para el manejo del post, titulo, contenido, fecha, etc.
*
*/
class Post
{
	/**
	* Titulo del post
	*/
	private $titulo = "";

	/**
	* Contenido del post, ya sea en HTML o en BBC
	*/
	private $contenido = "";

	/**
	* Esta es la fecha de modificación del post
	*/
	private $fecha = "";

	/**
	* Esta son la cantidad de visitas que ha recibido el post
	*/
	private $visita = 0;

	/**
	* Este parametro es el que se le pasa a index.php para que busque el post
	*/
	private $url = "";

	/**
	* Variable de conexion de la clase mysqli
	*/
	private $conexion;

	/**
	* Error al buscar la url, es true si hay error, de lo contrario es false
	*/
	public $error;

	/**
	* Contruye el objeto Post
	*
	* @param string url del post
	*/
	public function __construct($url)
	{
		// conectamos
		$this->conexion = new mysqli($DBhost, $DBuser, $DBkey, $DBname);
		if($this->conexion->connect_error)
		{
			echo 'Error (' . $this->conexion->connect_errno . '): ' . $this->conexion->connect_error . "\r\n";
			exit();
		}
		
		// ahora extraemos los datos
		$sql = 'SELECT * FROM contenido WHERE url=' . base64($url, true) . '';
		$resultado = $conexion->query($sql);

		// comprobamos que hemos cazado algo..
		if($resultado->num_rows == 0)
		{
			// no hay nada :'(
			$this->titulo = "";
			$this->contenido = "";
			$this->fecha = "";
			$this->visita = 0;
			$this->url = "";
			$this->error = true;
			return -1;
		}

		if($resultado->num_rows != 1)
		{
			echo 'Error para nada esperado' . "\r\n";
			exit();
		}

		// si todo va bn sacamos todo a un array para luego guardarlo en
		// las variables miembro de la clase
		$array = $resultado->fetch_assoc();
		$this->titulo = $array['titulo'];
		$this->contenido = $array['contenido'];
		$this->fecha = $array['fecha'];
		$this->visita = $array['visita'];
		$this->url = $array['url'];
		$this->error = false;

		$resultado->free();
	}

	/**
	* Retorna el titulo del post
	* @return string titulo del post
	*/
	public function getTitulo()
	{
		return $this->titulo;
	}

	/**
	* Retorna el contenido del post HTML o BBC
	* @return string contenido del post
	*/
	public function getContenido()
	{
		return $this->contenido;
	}

	/**
	* Retorna la fecha de la ultima modificación del post
	* @return Date fecha de la última modificación
	*/
	public function getFecha()
	{
		return $this->fecha;
	}


	/**
	* Retorna el número de visita del post
	* @return visita int
	*/
	public function getVisita()
	{
		return $this->visita;
	}

	/**
	* Retorna la url que identifica el post
	* @return string url del post
	*/
	public function getUrl()
	{
		return $this->url;
	}

	public function __destruct()
	{
		$this->conexion->close();
	}
}
