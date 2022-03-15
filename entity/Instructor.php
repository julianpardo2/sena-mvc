<?php

class Instructor {
    private $id;
    private $documento;
    private $nombres;
    private $apellidos;
    private $area;
    private $email;

    public function __construct() {
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
}


?>