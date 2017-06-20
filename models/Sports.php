<?php

class Sports{
    
    private $_id;
    private $_intitule;
    private $_type;
    private $_nombreJoueurs;

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

    public function getType(){
        return $this->_type;
    }

    public function getNombreJoueurs(){
        return $this->_nombreJoueurs;
    }
    
    public function setId($id) {
        $this->_id = $id;
    }
    
    public function setIntitule($intitule) {
        $this->_intitule = $intitule;
    }
    
    public function setType($type) {
        $this->_type = $type;
    }
    
    public function setNombreJoueurs($nombreJoueurs) {
        $this->_nombreJoueurs = $nombreJoueurs;
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