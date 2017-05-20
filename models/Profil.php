<?php

class Profil {

    private $_id;
    private $_pseudo;
    private $_mdp;
    private $_email;
    private $_newsletter;
    private $_prenom;
    private $_nom;
    private $_sexe;
    private $_dateNaissance;
    private $_departement;
    private $_ville;

    public function __construct($pseudo, $mdp, $email, $newsletter, $prenom, $nom, $sexe, $dateNaissance, $departement, $ville) {
        $this->setPseudo($pseudo);
        $this->setMdp($mdp);
        $this->setEmail($email);
        $this->setNewsletter($newsletter);
        $this->setPrenom($prenom);
        $this->setNom($nom);
        $this->setSexe($sexe);
        $this->setDateNaissance($dateNaissance);
        $this->setDepartement($departement);
        $this->setVille($ville);
    }

    public function hydrate(array $data) {
        foreach($data as $key => $value) {
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function setPseudo($pseudo) {
        $this->_pseudo = $pseudo;
    }

    public function setMdp($mdp) {
        $this->_mdp = $mdp;
    }

    public function setEmail($email) {
        $this->_email = $email;
    }

    public function setNewsletter($newsletter) {
        $this->_newsletter = $newsletter;
    }

    public function setPrenom($prenom) {
        $this->_prenom = $prenom;
    }

    public function setNom($nom) {
        $this->_nom = $nom;
    }

    public function setSexe($sexe) {
        $this->_sexe = $sexe;
    }

    public function setDateNaissance($dateNaissance) {
        $this->_dateNaissance = $dateNaissance;
    }

    public function setDepartement($departement) {
        $this->_departement = $departement;
    }

    public function setVille($ville) {
        $this->_ville = $ville;
    }

    public function getId() {
        return $this->_id;
    }

    public function getPseudo() {
        return $this->_pseudo;
    }

    public function getMdp() {
        return $this->_mdp;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function getNewsletter() {
        return $this->_newsletter;
    }

    public function getPrenom() {
        return $this->_prenom;
    }

    public function getNom() {
        return $this->_nom;
    }

    public function getSexe() {
        return $this->_sexe;
    }

    public function getDateNaissance() {
        return $this->_dateNaissance;
    }

    public function getDepartement() {
        return $this->_departement;
    }

    public function getVille() {
        return $this->_ville;
    }

    //Vérifie si le mdp est sécurisé
    public function mdpSecure() {
        //Doit avoir minimum 6 caractères
        if(strlen($this->_mdp) < 6) {
            return false;
        } else {
            //Doit contenir au moins 1 chiffre et une lettre
            if(preg_match('#(([a-zA-Z]+[0-9]+|[0-9]+[a-zA-Z]+).*|.*([a-zA-Z]+[0-9]+|[0-9]+[a-zA-Z]+).*|[a-zA-Z]+.*[0-9]+|[0-9]+.*[a-zA-Z])#', $this->_mdp)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function verifNomPrenom() {
        if(!preg_match('#[[:alpha:]-\sÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]#', $this->_prenom) || !preg_match('#[[:alpha:]-\sÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]#', $this->_nom)) {
            return false;
        } else {
            return true;
        }
    }
}

?>