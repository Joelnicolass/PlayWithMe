<?php

class Animal {

    private $nombre;
    private $especie;
    private $edad;
    private $color;
    private $sonido;

    //constructor
    function __construct($nombre, $especie, $edad, $color, $sonido) {
        $this->nombre = $nombre;
        $this->especie = $especie;
        $this->edad = $edad;
        $this->color = $color;
        $this->sonido = $sonido;
    }

    //metodos
    public function mostrar_nombre() {
        echo "<p>Nombre: ".$this->nombre."</p>";
    }

    public function mostrar_sonido() {
        echo "<p>Edad: ".$this->edad."</p>";
    }

    public function mostrar_especie() {
        echo "<p>Especie: ".$this->especie."</p>";
    }
}




?>