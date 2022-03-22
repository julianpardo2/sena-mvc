<?php

require_once('model/CursoModel.php');
require_once('model/InstructorModel.php');

class CursoController {
    private $data;
    private $dataInstructor;

    public function __construct() {
        $this->data = new CursoModel();
    }

    public function main() {
        $action = isset($_GET['action']) ? $_GET['action'] : "listar";
        if ($action == "listar") {
            $this->listarCursos();
        } elseif ($action == "agregar") {
            $this->agregarCurso();
        } elseif ($action == "eliminar") {
            $this->eliminarCurso();
        } elseif ($action == "editar") {
            $this->editarCurso();
        } elseif ($action == "ver") {
            $this->verCurso();
        }
    }

    public function verCurso() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header("Location: index.php?obj=curso");
            return;
        }
        $curso = $this->data->getCurso($id);
        include_once('view/curso/show.php');
        //Comentario
    }

    public function editarCurso() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header("Location: index.php?obj=curso");
            return;
        }
        $curso = $this->data->getCurso($id);
        if (isset($_POST['codigo'])) {
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $instructor = $_POST['instructor'];
            $numHoras = $_POST['numHoras'];
            //$id = $_POST['id'];
            $curso->codigo=$codigo;
            $curso->nombre=$nombre;
            $curso->instructor=$instructor;
            $curso->numHoras=$numHoras;
            $this->data->updateCurso($curso);
            header('Location: index.php?obj=curso');
            return;
        }
        if (!$this->dataInstructor) {
            $this->dataInstructor=new InstructorModel();
        }
        $instructores = $this->dataInstructor->getInstructores();
        include_once('view/curso/edit.php');
        //Comentario
    }

    public function eliminarCurso() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        //echo "$id<br>";
        if ($id) {
            //echo "Eliminar";
            $this->data->deleteCurso($id);
        }
        header("Location: index.php?obj=curso");
    }

    public function agregarCurso() {
        if (isset($_POST['codigo'])) {
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $instructor = $_POST['instructor'];
            $numHoras = $_POST['numHoras'];
            $curso = new Curso();
            $curso->codigo = $codigo;
            $curso->nombre = $nombre;
            $curso->instructor = $instructor;
            $curso->numHoras=$numHoras;
            $this->data->addCurso($curso);
            header('Location: index.php?obj=curso');
            return;
        }
        if (!$this->dataInstructor) {
            $this->dataInstructor=new InstructorModel();
        }
        $instructores = $this->dataInstructor->getInstructores();
        include_once('view/curso/create.php');
    }

    public function listarCursos() {
        $cursos = $this->data->getCursos();
        include_once('view/curso/index.php');
        return;
    }
}


?>