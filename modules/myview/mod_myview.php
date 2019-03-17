<?php

require_once(dirname(__FILE__,3).'/include/modele_generique.php');

require_once(dirname(__FILE__,3)."/modules/myview/controleur_myview.php");
require_once(dirname(__FILE__,3)."/modules/myview/vue_myview.php");


class ModMyview extends ModuleGenerique {

    function __construct() {
        $this->controleur = new ControleurMyview();
        $this->vue = new VueMyview();
        $this->modele = new ModeleMyview();
        $this->controleur->affiche_myview();
    }

    function getControleur(){
        return $this->controleur;
    }



}
        
?>