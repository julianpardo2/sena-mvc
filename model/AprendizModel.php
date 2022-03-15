<?php

require_once('Db.php');
require_once('entity/Aprendiz.php');

class AprendizModel {

    private $table = 'aprendices';

    public function __construct() {       
    }

    public function getAprendices() {
        $db = new Db();
        $sql = "SELECT * FROM ".$this->table;
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, 'Aprendiz');
    }

    public function addAprendiz($aprendiz) {
        $db = new Db();
        $sql = "INSERT INTO ".$this->table." (documento, nombres, apellidos, email) VALUES (:doc,:nom,:ape,:email)";
        $query = $db->prepare($sql);
        //$query->bindParam(':id',NULL);
        $doc=$aprendiz->documento;
        $nom=$aprendiz->nombres;
        $ape=$aprendiz->apellidos;
        $email=$aprendiz->email;
        $query->bindParam(':doc', $doc);
        $query->bindParam(':nom', $nom);
        $query->bindParam(':ape', $ape);
        $query->bindParam(':email', $email);
        $query->execute();
    }

    public function getAprendiz($id) {
        $db = new Db();
        $sql = "SELECT * FROM ".$this->table. " WHERE id=$id";
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchObject('Aprendiz');
    }

    public function deleteAprendiz($id) {
        $db = new Db();
        $sql = "DELETE FROM ".$this->table. " WHERE id=$id";
        $query = $db->prepare($sql);
        $query->execute();
    }

    public function updateAprendiz($aprendiz) {
        $db = new Db();
        $sql = "UPDATE ".$this->table." SET documento=:doc, nombres=:nom,".
            " apellidos=:ape, email=:email WHERE id=:id";
        $query = $db->prepare($sql);
        $doc=$aprendiz->documento;
        $nom=$aprendiz->nombres;
        $ape=$aprendiz->apellidos;
        $email=$aprendiz->email;
        $id=$aprendiz->id;
        $query->bindParam(':doc', $doc);
        $query->bindParam(':nom', $nom);
        $query->bindParam(':ape', $ape);
        $query->bindParam(':email', $email);
        $query->bindParam(':id', $id);
        $query->execute();
    }


}



?>