<?php

class Annonces {

    private $_id;
    private $_titre;
    private $_codePostal;
    private $_nbParticipant;
    private $_datePublication;
    private $_dateEvenement;
    private $_description;
    private $_idProfil;
    private $_idSport;

    public function __construct(array $data){
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

    public function setId($id){
        $this->_id = $id;
    }

    public function setTitre($titre){
        $this->_titre = $titre;
    }

    public function setCodePostal($codePostal){
        $this->_codePostal = $codePostal;
    }

    public function setNbParticipant($nbParticipant) {
        $this->_nbParticipant = $nbParticipant;
    }

    public function setDatePublication($datePublication){
        $this->_datePublication = $datePublication;
    }

    public function setDateEvenement($dateEvenement) {
        $this->_dateEvenement = $dateEvenement;
    }

    public function setDescription($description){
        $this->_description = $description;
    }

    public function setIdProfil($idProfil){
        $this->_idProfil = $idProfil;
    }

    public function setIdSport($idSport){
        $this->_idSport = $idSport;
    }

    public function getId(){
        return $this->_id;
    }

    public function getTitre(){
        return $this->_titre;
    }

    public function getCodePostal(){
        return $this->_codePostal;
    }

    public function getNbParticipant() {
        return $this->_nbParticipant;
    }

    public function getDatePublication(){
        return $this->_datePublication;
    }

    public function getDateEvenement() {
        return $this->_dateEvenement;
    }

    public function getDescription(){
        return $this->_description;
    }

    public function getIdProfil(){
        return $this->_idProfil;
    }

    public function getIdSport(){
        return $this->_idSport;
    }

}
?>
