<?php

require_once('entity/Curso.php');
require_once('entity/Instructor.php');
require_once('entity/Aprendiz.php');
require_once('model/InstructorModel.php');
require_once('model/AprendizModel.php');

class CursoModel {
    private $table = 'cursos';

    public function __construct() {       
    }

    public function getCursos() {
        $db = new Db();
        $sql = "SELECT * FROM ".$this->table;
        //$sql="SELECT c.*, concat(i.nombres,\" \", i.apellidos) as instructorObj FROM `cursos` as c, `instructores` as i WHERE c.instructor=i.id";
        $query = $db->prepare($sql);
        $query->execute();
        $cursos= $query->fetchAll(PDO::FETCH_CLASS, 'Curso');
        foreach($cursos as $curso) {
            $sql = "SELECT * FROM ".InstructorModel::$tableStatic." WHERE id=$curso->instructor";
            $query = $db->prepare($sql);
            $query->execute();
            $curso->instructorObj = $query->fetchObject('Instructor');
        }
        return $cursos;
    }

    public function addCurso($curso) {
        $db = new Db();
        $sql = "INSERT INTO ".$this->table." (codigo, nombre, instructor, numHoras) VALUES ".
        "(:cod,:nom,:inst,:numH)";
        $query = $db->prepare($sql);
        //$query->bindParam(':id',NULL);
        $cod=$curso->codigo;
        $nom=$curso->nombre;
        $inst=$curso->instructor;
        $numH=$curso->numHoras;
        $query->bindParam(':cod', $cod);
        $query->bindParam(':nom', $nom);
        $query->bindParam(':inst', $inst);
        $query->bindParam(':numH', $numH);
        $query->execute();
        //echo var_dump($query);
    }

    public function getCurso($id) {
        $db = new Db();
        $sql = "SELECT * FROM ".$this->table. " WHERE id=$id";
        $query = $db->prepare($sql);
        $query->execute();
        $curso = $query->fetchObject('Curso');
        $sql = "SELECT * FROM ".InstructorModel::$tableStatic." WHERE id=$curso->instructor";
        $query = $db->prepare($sql);
        $query->execute();
        $curso->instructorObj = $query->fetchObject('Instructor');
        $sql = "SELECT * FROM ".AprendizModel::$tableStatic." WHERE id IN ".
        " (SELECT id_aprendiz FROM curso_tiene_aprendiz WHERE id_curso=$curso->id)";
        $query = $db->prepare($sql);
        $query->execute();
        $curso->aprendices = $query->fetchAll(PDO::FETCH_CLASS, 'Aprendiz');
        return $curso;
    }

    public function deleteCurso($id) {
        $db = new Db();
        $sql = "DELETE FROM ".$this->table. " WHERE id=$id";
        $query = $db->prepare($sql);
        $query->execute();
    }

    public function updateCurso($curso) {
        $db = new Db();
        $sql = "UPDATE ".$this->table." SET codigo=:cod, nombre=:nom,".
            " instructor=:inst, numHoras=:numH WHERE id=:id";
        $query = $db->prepare($sql);
        $cod=$curso->codigo;
        $nom=$curso->nombre;
        $inst=$curso->instructor;
        $numH=$curso->numHoras;
        $id=$curso->id;
        $query->bindParam(':cod', $cod);
        $query->bindParam(':nom', $nom);
        $query->bindParam(':inst', $inst);
        $query->bindParam(':numH', $numH);
        $query->bindParam(':id', $id);
        $query->execute();
    }
}


?>