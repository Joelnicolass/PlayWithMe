<?PHP

//clase usuario
class Usuario {

	//variables de clase
	public $nombre;
	public $apellido;
	public $edad;

	//constructor
	function __construct($n, $a, $e) {
		//vinculando variables de clase con variables de constructor
		$this->nombre = $n;
		$this->apellido = $a;
		$this->edad = $e;
	}

	//metodos de clase
	public function ver_caracteristicas () {
		echo "<p>Nombre: ".$this->nombre."</p>";
		echo "<p>Apellido: ".$this->apellido."</p>";
		echo "<p>Edad: ".$this->edad."</p>";
	}

	//getters y setters
	
	//setters
	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	public function setApellido($apellido) {
		$this->apellido = $apellido;
	}

	public function setEdad($edad) {
		$this->edad = $edad;
	}

	//getters
	public function getNombre (){
		return $this->nombre;
	}
	
	public function getApellido (){
		return $this->apellido;
	}
	
	public function getEdad (){
		return $this->edad;
	}

} //cierre clase

//instanciar

$usuario1 = new Usuario('Nicolas', 'Sartori', '28');
$usuario1->ver_caracteristicas();

//seteando
$usuario1->setNombre('Nico');
$usuario1->ver_caracteristicas();

//obteniendo
echo $usuario1->getEdad();














?>