<?php

require_once('model/AprendizModel.php');

class AprendizController {
    private $data;

    public function __construct() {
        $this->data = new AprendizModel();
    }

    public function main() {
        $action = isset($_GET['action']) ? $_GET['action'] : "listar";
        if ($action == "listar") {
            $this->listarAprendices();
        } elseif ($action == "agregar") {
            $this->agregarAprendiz();
        }
    }

    public function agregarAprendiz() {
        if (isset($_POST['documento'])) {
            $documento = $_POST['documento'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $email = $_POST['email'];
            $aprendiz = new Aprendiz();
            $aprendiz->documento=$documento;
            $aprendiz->nombres=$nombres;
            $aprendiz->apellidos=$apellidos;
            $aprendiz->email=$email;
            $this->data->addAprendiz($aprendiz);
            header('Location: index.php?obj=aprendiz');
            return;
        }
        include_once('view/aprendiz/create.php');
    }

    public function listarAprendices() {
        $aprendices = $this->data->getAprendices();
        include_once('view/aprendiz/index.php');
        return;
    }
}


?>