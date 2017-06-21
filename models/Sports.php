<?php

class Sports{
    
    private $_id;
    private $_intitule;
    private $_nombreJoueurs;
    private $_id_typeSport;

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
    
    public function getId(){
        return $this->_id;
    }
    
    public function getIntitule(){
        return $this->_intitule;
    }

    public function getNombreJoueurs(){
        return $this->_nombreJoueurs;
    }

    public function getId_typeSport(){
        return $this->_id_typeSport;
    }
    
    public function setId($id) {
        $this->_id = $id;
    }
    
    public function setIntitule($intitule) {
        $this->_intitule = $intitule;
    }
    
    public function setNombreJoueurs($nombreJoueurs) {
        $this->_nombreJoueurs = $nombreJoueurs;
    }

    public function setId_typeSport($id_typeSport) {
        $this->_id_typeSport = $id_typeSport;
    }
    
}

class Collectif extends Sports{

    private $_nbJoueurs;
    
    public function getNbJoueurs(){
        return $this->_nbJoueurs;
    }
    
    public function setNbJoueurs($nbJoueurs) {
        $this->_nbJoueurs = $nbJoueurs;
    }
}

?>