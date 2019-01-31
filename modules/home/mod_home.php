<?php

require_once './modules/home/controleur_home.php';

class Modhome extends ModuleGenerique {

    function __construct() {
        $this->controleur = new ControleurHome();
        $this->controleur->afficheHome();
    }

    function getControleur(){
        return $this->controleur;
    }

}
