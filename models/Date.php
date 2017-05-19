<?php
class Date {
    private $_joursDuMois = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    private $_jour;
    private $_mois;
    private $_annee;

    public function __construct($jour, $mois, $annee) {
        $this->setJour($jour);
        $this->setMois($mois);
        $this->setAnnee($annee);
    }

    public function setJour($jour) {
        $this->_jour = intval($jour);
    }

    public function setMois($mois) {
        $this->_mois = intval($mois);
    }

    public function setAnnee($annee) {
        $this->_annee = intval($annee);
    }

    public function getJour() {
        return $this->_jour;
    }

    public function getMois() {
        return $this->_mois;
    }

    public function getAnnee() {
        return $this->_annee;
    }

    public function getJourDuMois() {
        return $this->_joursDuMois;
    }

    //Vérifie si la date entrée est valide
    public function verifDate() {

        if($this->_annee % 4 == 0) {
            $this->_joursDuMois[1] = 29;
        }

        if($this->_jour <= $this->_joursDuMois[$this->_mois-1])
            return true;
        else
            return false;
    }

    //Retourne false si la date entrée se situe après la date d'aujourd'hui
    public function afterToday() {

        if(date('Y') == $this->_annee) {
            if(date('m') == $this->_mois) {
                if(date('d') >= $this->_jour)
                    return true;
                else if(date('d') < $this->_jour) {
                    return false;
                }
            } else if(date('m') < $this->_mois) {
                return false;
            }
        } else if(date('Y') > $this->_annee) {
            return true;
        } else
            return false;
    }
}

?>