<?php

class ProfilManager {
    private $db;

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }

    //Ajoute le profil dans la bdd
    public function insert(Profil $profil) {
        $req = $this->_db->prepare('INSERT INTO profil(pseudo, password, email, newsletter, prenom, nom, sexe, dateNaissance, departement, ville) VALUES(:pseudo, :mdp, :email, :newsletter, :prenom, :nom, :sexe, :dateNaissance, :departement, :ville)');

        $req->bindValue(':pseudo', $profil->getPseudo());
        $req->bindValue(':mdp', $profil->getMdp());
        $req->bindValue(':email', $profil->getEmail());
        $req->bindValue(':newsletter', $profil->getNewsletter());
        $req->bindValue(':prenom', $profil->getPrenom());
        $req->bindValue(':nom', $profil->getNom());
        $req->bindValue(':sexe', $profil->getSexe());
        $req->bindValue(':dateNaissance', $profil->getDateNaissance());
        $req->bindValue(':departement', $profil->getDepartement());
        $req->bindValue(':ville', $profil->getVille());

        $req->execute();
    }

    //Supprime le profil dans la bdd
    public function delete(Profil $profil) {
        $this->_db->prepare('
        DELETE FROM profil WHERE pseudo = ?
        ');

        $req->execute(array($profil->getPseudo));
    }

    //Sélection le profil dans la bdd
    public function get($pseudo) {
        $req = $this->_db->prepare('SELECT * FROM profil WHERE pseudo = ?');
        $req->execute(array($pseudo));

        return new Profil($data);
    }

    public function update(Profil $profil) {
        $req = $this->_db->prepare('UPDATE profil SET pseudo = :pseudo, password = :mdp, email = :email, newsletter = :newsletter, prenom = :prenom, nom = :nom, sexe = :sexe, dateNaissance = :dateNaissance, departement = :departement, ville = :ville WHERE pseudo = :pseudo');

        $req->bindValue(':pseudo', $profil->getPseudo());
        $req->bindValue(':mdp', $profil->getMdp());
        $req->bindValue(':email', $profil->getEmail());
        $req->bindValue(':newsletter', $profil->getNewsletter());
        $req->bindValue(':prenom', $profil->getPrenom());
        $req->bindValue(':nom', $profil->getNom());
        $req->bindValue(':sexe', $profil->getSexe());
        $req->bindValue(':dateNaissance', $profil->getDateNaissance());
        $req->bindValue(':departement', $profil->getDepartement());
        $req->bindValue(':ville', $profil->getVille());

        $req->execute();
    }

}

?>