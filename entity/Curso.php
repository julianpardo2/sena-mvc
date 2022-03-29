<?php

class Curso {
    private $id;
    private $codigo;
    private $nombre;
    private $horas;
    //
    private $instructor;
    private $instructorObj;
    //
    private $aprendices;



    public function __construct() {
        $this->aprendices = array();
    }

    public function __set($name, $value) {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }

    public function addAprendiz($aprendiz) {
        $this->aprendices[]=$aprendiz;
    }


}


?>