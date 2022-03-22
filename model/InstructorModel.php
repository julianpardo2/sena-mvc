<?php

require_once('Db.php');
require_once('entity/Instructor.php');

class InstructorModel {

    private $table = 'instructores';
    static $tableStatic = 'instructores';

    public function __construct() {       
    }

    public function getInstructores() {
        $db = new Db();
        $sql = "SELECT * FROM ".$this->table;
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, 'Instructor');
    }

    public function addInstructor($instructor) {
        $db = new Db();
        $sql = "INSERT INTO ".$this->table." (documento, nombres, apellidos, area, email) VALUES (:doc,:nom,:ape,:area,:email)";
        $query = $db->prepare($sql);
        //$query->bindParam(':id',NULL);
        $doc=$instructor->documento;
        $nom=$instructor->nombres;
        $ape=$instructor->apellidos;
        $area=$instructor->area;
        $email=$instructor->email;
        $query->bindParam(':doc', $doc);
        $query->bindParam(':nom', $nom);
        $query->bindParam(':ape', $ape);
        $query->bindParam(':area', $area);
        $query->bindParam(':email', $email);
        $query->execute();
        echo var_dump($query);
    }

    public function getInstructor($id) {
        $db = new Db();
        $sql = "SELECT * FROM ".$this->table. " WHERE id=$id";
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchObject('Instructor');
    }

    public function deleteInstructor($id) {
        $db = new Db();
        $sql = "DELETE FROM ".$this->table. " WHERE id=$id";
        $query = $db->prepare($sql);
        $query->execute();
    }

    public function updateInstructor($instructor) {
        $db = new Db();
        $sql = "UPDATE ".$this->table." SET documento=:doc, nombres=:nom,".
            " apellidos=:ape, area=:area, email=:email WHERE id=:id";
        $query = $db->prepare($sql);
        $doc=$instructor->documento;
        $nom=$instructor->nombres;
        $ape=$instructor->apellidos;
        $area=$instructor->area;
        $email=$instructor->email;
        $id=$instructor->id;
        $query->bindParam(':doc', $doc);
        $query->bindParam(':nom', $nom);
        $query->bindParam(':ape', $ape);
        $query->bindParam(':area', $area);
        $query->bindParam(':email', $email);
        $query->bindParam(':id', $id);
        $query->execute();
    }


}



?>