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
    private $_avatar;

    public function __construct(array $data) {
        $this->hydrate($data);
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

    public function setPassword($mdp) {
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

    public function setAvatar($avatar) {
        $this->_avatar = $avatar;
    }

    public function getId() {
        return $this->_id;
    }

    public function getPseudo() {
        return ucfirst(strtolower($this->_pseudo));
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

    public function getAvatar() {
        return $this->_avatar;
    }
}

?>