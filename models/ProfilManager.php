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

        $req->bindValue(':pseudo', strtolower($profil->getPseudo()));
        $req->bindValue(':mdp', $profil->getMdp());
        $req->bindValue(':email', strtolower($profil->getEmail()));
        $req->bindValue(':newsletter', $profil->getNewsletter());
        $req->bindValue(':prenom', strtolower($profil->getPrenom()));
        $req->bindValue(':nom', strtolower($profil->getNom()));
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

    //Sélectionne le profil dans la bdd
    public function get($info) {
        if(is_int($info)) {
            $req = $this->_db->query('SELECT * FROM profil WHERE id = '.$info);
            $data = $req->fetch(PDO::FETCH_ASSOC);

            return new Profil($data);
        } else {
            $req = $this->_db->prepare('SELECT * FROM profil WHERE pseudo = :pseudo');
            $req->bindValue(':pseudo', $info, PDO::PARAM_STR);

            $req->execute();

            return new Profil($req->fetch(PDO::FETCH_ASSOC));
        }
    }

    public function update(Profil $profil) {
        $req = $this->_db->prepare('UPDATE profil SET pseudo = :pseudo, password = :mdp, email = :email, newsletter = :newsletter, prenom = :prenom, nom = :nom, sexe = :sexe, dateNaissance = :dateNaissance, departement = :departement, ville = :ville WHERE pseudo = :pseudo');

        $req->bindValue(':pseudo', strtolower($profil->getPseudo()));
        $req->bindValue(':mdp', $profil->getMdp());
        $req->bindValue(':email', strtolower($profil->getEmail()));
        $req->bindValue(':newsletter', $profil->getNewsletter());
        $req->bindValue(':prenom', strtolower($profil->getPrenom()));
        $req->bindValue(':nom', strtolower($profil->getNom()));
        $req->bindValue(':sexe', $profil->getSexe());
        $req->bindValue(':dateNaissance', $profil->getDateNaissance());
        $req->bindValue(':departement', $profil->getDepartement());
        $req->bindValue(':ville', $profil->getVille());

        $req->execute();
    }

    public function pseudoExist($pseudo) {
        $req = $this->_db->prepare('SELECT pseudo FROM profil WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $count = $req->rowCount();

        if($count >= 1)
            return true;
        else
            return false;
    }

    public function emailExist($email) {
        $req = $this->_db->prepare('SELECT email FROM profil WHERE email = ?');
        $req->execute(array($email));
        $count = $req->rowCount();

        if($count >= 1)
            return true;
        else
            return false;
    }

    public function loginCompte($identifiant, $mdp, $souvenir) {
        if(filter_var($identifiant, FILTER_VALIDATE_EMAIL)) {
            $req = $this->_db->prepare('SELECT * FROM profil WHERE email = ? AND password = ?');
        } else {
            $req = $this->_db->prepare('SELECT * FROM profil WHERE pseudo = ? AND password = ?');
        }

        $req->execute(array(strtolower($identifiant), $mdp));
        $count = $req->rowCount();
        echo $count;
        $row = $req->fetch(PDO::FETCH_BOTH);

        if($count == 1) {
            $_SESSION['pseudo'] = $row['pseudo'];
            $_SESSION['avatar'] = $row['avatar'];
            $_SESSION['email'] = $row['email'];

            if($souvenir == true)
                include 'include/cookies.php';

            return true;
        } else {
            return false;
        }
    }
}

?>