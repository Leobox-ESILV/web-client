<?php

require_once(dirname(__FILE__,3).'/include/modele_generique.php');

require_once(dirname(__FILE__,3)."/modules/mygraph/controleur_mygraph.php");
require_once(dirname(__FILE__,3)."/modules/mygraph/vue_mygraph.php");


class ModMygraph extends ModuleGenerique {

    function __construct() {
        $this->controleur = new ControleurMygraph();
        $this->vue = new VueMygraph();
        $this->modele = new ModeleMygraph();
        $this->controleur->affiche_mygraph();
    }

    function getControleur(){
        return $this->controleur;
    }



}
        
?>