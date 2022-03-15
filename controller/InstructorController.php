<?php

require_once('model/InstructorModel.php');

class InstructorController {
    private $data;

    public function __construct() {
        $this->data = new InstructorModel();
    }

    public function main() {
        $action = isset($_GET['action']) ? $_GET['action'] : "listar";
        if ($action == "listar") {
            $this->listarInstructores();
        } elseif ($action == "agregar") {
            $this->agregarInstructor();
        } elseif ($action == "eliminar") {
            $this->eliminarInstructor();
        } elseif ($action == "editar") {
            $this->editarInstructor();
        }
    }

    public function editarInstructor() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header("Location: index.php?obj=instructor");
            return;
        }
        $instructor = $this->data->getInstructor($id);
        if (isset($_POST['documento'])) {
            $documento = $_POST['documento'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $area = $_POST['area'];
            $email = $_POST['email'];
            //$id = $_POST['id'];
            $instructor->documento=$documento;
            $instructor->nombres=$nombres;
            $instructor->apellidos=$apellidos;
            $instructor->area=$area;
            $instructor->email=$email;
            $this->data->updateInstructor($instructor);
            header('Location: index.php?obj=instructor');
            return;
        }
        include_once('view/instructor/edit.php');
        //Comentario
    }

    public function eliminarInstructor() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        //echo "$id<br>";
        if ($id) {
            //echo "Eliminar";
            $this->data->deleteInstructor($id);
        }
        header("Location: index.php?obj=instructor");
    }

    public function agregarInstructor() {
        if (isset($_POST['documento'])) {
            $documento = $_POST['documento'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $area = $_POST['area'];
            $email = $_POST['email'];
            $instructor = new Instructor();
            $instructor->documento=$documento;
            $instructor->nombres=$nombres;
            $instructor->apellidos=$apellidos;
            $instructor->area=$area;
            $instructor->email=$email;
            $this->data->addInstructor($instructor);
            header('Location: index.php?obj=instructor');
            return;
        }
        include_once('view/instructor/create.php');
    }

    public function listarInstructores() {
        $instructores = $this->data->getInstructores();
        include_once('view/instructor/index.php');
        return;
    }
}


?>