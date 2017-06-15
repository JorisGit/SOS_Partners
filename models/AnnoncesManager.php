<?php


class AnnoncesManager{
    private $_db;

    public function __construct($db){
        $this->setDb($db);
    }

    public function setDb(PDO $db){
        $this->_db = $db;
    }

    public function insert(Annonces $annonces){
        $req = $this->_db->prepare('INSERT INTO annonces(titre, sport, localisation, date_publication, commentaire, id_profil) VALUES (:titre, :sport, :localisation, :date_publication, :commentaire, :id_profil)');

        $req->bindValue(':titre', $annonces->getTitre());
        $req->bindValue(':sport', $annonces->getSport());
        $req->bindValue(':date_publication', $annonces->getDate_publication());
        $req->bindValue(':localisation', $annonces->getLocalisation());
        $req->bindValue(':commentaire', $annonces->getCommentaire());
        $req->bindValue(':id_profil', $annonces->getId_profil());

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
        if(is_string($info)) {
            $req = $this->_db->query('SELECT * FROM annonces WHERE titre = '.$info);   
        } else {
            $req = $this->_db->query('SELECT * FROM annonces WHERE id = '.$info);   
        }
        return new Annonces($req->fetch(PDO::FETCH_ASSOC));
    }
}
?>