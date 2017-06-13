<?php


class Annonces {

    private $_id;
    private $_id_profil;
    private $_sport;
    private $_localisation;
    private $_date_publication;
    private $_commentaire;

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

    public function setId_profil($id_profil){
        $this->_id_profil = $id_profil;
    }

    public function setSport($sport){
        $this->_sport = $sport;
    }

    public function setLocalisation($localisation){
        $this->_localisation = $localisation;
    }

    public function setDate_publication($date_publication){
        $this->_date_publication = $date_publication;
    }

    public function setCommentaire($commentaire){
        $this->_commentaire = $commentaire;
    }

    public function getId(){
        return $this->_id;
    }

    public function getId_profil(){
        return $this->_id_profil;
    }

    public function getSport(){
        return $this->_sport;
    }

    public function getLocalisation(){
        return $this->_localisation;
    }

    public function getDate_publication(){
        return $this->_date_publication;
    }

    public function getCommentaire(){
        return $this->_commentaire;
    }

}
?>
