<?php

class Sports{
    
    private $_id;
    private $_intitule;
    private $_type;

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
    
    public function setId($id) {
        $this->_id = $id;
    }
    
    public function setIntitule($intitule) {
        $this->_intitule = utf8_encode($intitule);
    }
    
    public function setTypeSport($type) {
        $this->_type = utf8_encode($type);
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