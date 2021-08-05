<?php

class Pato extends Animal {

    //variables de la clase hija
    private $raza;

    //constructor
    function __construct($nombre, $especie, $edad, $color, $sonido, $raza) {
        //emparentando variables del padre
        parent::__construct($nombre, $especie, $edad, $color, $sonido);
        //variables propias del hijo
        $this->raza = $raza;
    }

    //metodos del padre
    public function mostrar_nombre() {
        parent::mostrar_nombre();
    }

    public function mostrar_sonido() {
        parent::mostrar_sonido();
    }

    public function mostrar_especie() {
        parent::mostrar_especie();
    }

    //metodo propio

    public function mostrar_raza() {
        echo "<p>Raza: ".$this->raza."</p>";
    }


}


$pato = new Pato('Donald', 'Pato', 15, 'Negro', 'Cuak');

$pato->mostrar_nombre();
$pato->mostrar_especie();
$pato->mostrar_sonido();

?>