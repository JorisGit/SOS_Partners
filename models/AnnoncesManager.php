<?php


class AnnoncesManager{
    private $id;

    public function __construct($db){
        $this->setDb($db);
    }

    public function setDb(PDO $db){
        $this->_db = $db;
    }

    public function insert(Annonces $annonces){
        $req = $this->_db->prepare('INSERT INTO annonces(id_profil, sport, localisation, date_publication, commentaire) VALUES (:id_profil, :sport, :localisation, :date_publication, :commentaire)');

        $req->bindValue(':id_profil', $annonces->getId_profil());
        $req->bindValue(':sport', $annonces->getSport());
        $req->bindValue(':date_publication', $annonces->getDate_publication());
        $req->bindValue(':localisation', $annonces->getLocalisation());
        $req->bindValue(':commentaire', $annonces->getCommentaire());
        

        $req->execute();
    }

    public function delete(Annonces $annonces){
        $req = $this->_db->prepare('DELETE FROM annonces WHERE id = ?');

        $req->execute(array($annonces->getId));
    }

    public function update(Annonces $annonces){
        $req = $this->_db->prepare('UPDATE annonces SET sport = :sport, localisation = :localisation, date_publication = :date_publication, commentaire = :commentaire WHERE id = :id');

        $req->bindValue(':sport', strtolower($annonces->getSport()));
        $req->bindValue(':localisation', strtolower($annonces->getLocalisation()));
        $req->bindValue(':date_publication', $annonces->getDate_publication());
        $req->bindValue(':commentaire', strtolower($annonces->getCommentaire()));

        $req->execute();
    }

    public function get($info) {
        
        $req = $this->_db->query('SELECT * FROM annonces WHERE id = '.$info);   
        return new Annonces($req->fetch(PDO::FETCH_ASSOC));
    }
}
?>