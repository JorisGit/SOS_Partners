<?php


class Annonces {

    private $_id;
    private $_titre;
    private $_localisation;
    private $_datePublication;
    private $_commentaire;
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

    public function setLocalisation($localisation){
        $this->_localisation = $localisation;
    }

    public function setDatePublication($datePublication){
        $this->_datePublication = $datePublication;
    }

    public function setCommentaire($commentaire){
        $this->_commentaire = $commentaire;
    }

    public function setIdProfil($idProfil){
        $this->_idProfil = $idProfil;
    }

    public function setIdSport($sport){
        $this->_sport = $idSport;
    }

    public function getId(){
        return $this->_id;
    }

    public function getTitre($titre){
        $this->_titre = $titre;
    }

    public function getLocalisation(){
        return $this->_localisation;
    }

    public function getDatePublication(){
        return $this->_datePublication;
    }

    public function getCommentaire(){
        return $this->_commentaire;
    }

    public function getIdProfil(){
        return $this->_idProfil;
    }

    public function getIdSport(){
        return $this->_idSport;
    }

}
?>
