<?php

class SportsManager {
    private $_db;

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }

    public function insert(Sports $sport)  {
        $req = $this->_db->prepare('INSERT INTO sport(intitule, nombreJoueurs) VALUES (:intitule, :nombreJoueurs)');

        $req->bindValue(':titre', $sport->getIntitule());
        $req->bindValue(':nombreJoueurs', $sport->getNombreJoueurs());

        $req->execute();
    }

    public function delete(Sports $sport) {
        $req = $this->_db->prepare('DELETE FROM sport WHERE id = ?');

        $req->execute(array($sport->getId));
    }

    public function update(Sports $sport){
        $req = $this->_db->prepare('UPDATE sport SET intitule = :intitule, nombreJoueurs = :nombreJoueurs WHERE intitule = :intitule');

        $req->bindValue(':titre', $sport->getIntitule());
        $req->bindValue(':nombreJoueurs', $sport->getNombreJoueurs());

        $req->execute();
    }

    public function get($info) {
        if(is_string($info)) {
            $req = $this->_db->prepare('SELECT * FROM sport WHERE intitule = :sport');   
        } else {
            $req = $this->_db->prepare('SELECT * FROM sport WHERE id = :sport');   
        }

        $req->bindValue(':sport', $info);
        $req->execute();
        $donnee = $req->fetch(PDO::FETCH_ASSOC);

        echo gettype($donnee);

        return new Sports($donnee);
    }
    
    public function getList() {
        $sportsList = [];

        $req = $this->_db->query('SELECT * FROM sport');

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $sportsList[] = new Sports($data);
        }
        
        return $sportsList;
    }

    public function getType() {
        $typeSportList = [];

        $req = $this->_db->query('SELECT type FROM type_sport');

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $typeSportList[] = new Sports($data);
        }
        

        return $typeSportList;
    }
}

?>