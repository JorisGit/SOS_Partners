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
        $req = $this->_db->prepare('INSERT INTO annonce(titre, description, codePostal, datePublication, dateEvenement, nbParticipant, id_profil, id_sport) VALUES (:titre, :description, :codePostal, NOW(), :dateEvenement, :nbParticipant, :id_profil, :id_sport)');

        $req->bindValue(':titre', $annonces->getTitre());
        $req->bindValue(':description', $annonces->getDescription());
        $req->bindValue(':codePostal', $annonces->getCodePostal());
        $req->bindValue(':dateEvenement', $annonces->getDateEvenement());
        $req->bindValue(':nbParticipant', $annonces->getNbParticipant());
        $req->bindValue(':id_profil', $annonces->getIdProfil());
        $req->bindValue(':id_sport', $annonces->getIdSport());

        $req->execute();
    }

    public function delete(Annonces $annonces){
        $req = $this->_db->prepare('DELETE FROM annonces WHERE id = ?');

        $req->execute(array($annonces->getId));
    }

    public function update(Annonces $annonces){
        $req = $this->_db->prepare('UPDATE annonces SET titre = :titre, description = :description, codePostal = :codePostal, datePublication = :datePublication, dateEvenement = :dateEvenement, nbParticipant = :nbParticipant, id_profil = :id_profil, id_sport = :id_sport  WHERE id = :id');

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