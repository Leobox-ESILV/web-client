<?php

require_once(dirname(__FILE__,3).'/include/modele_generique.php');

require_once(dirname(__FILE__,3)."/modules/sharedme/controleur_sharedme.php");
require_once(dirname(__FILE__,3)."/modules/sharedme/vue_sharedme.php");


class ModSharedme extends ModuleGenerique {

    function __construct() {
        $this->controleur = new ControleurSharedme();
        $this->vue = new VueSharedme();
        $this->modele = new ModeleSharedme();

        $list_dir_sharedme = $this->modele->get_list_sharedme();
        
        if(isset($_GET['open'])){
            $list_dir_sharedme = $this->modele->get_list_sharedme_open_file($_GET['open']);
            $this->controleur->affiche_sharedme($list_dir_sharedme,false);
        }elseif(isset($_GET['user'])){
            $list_dir_sharedme = $this->modele->get_list_sharedme_by_user($_GET['user']);
            $this->controleur->affiche_sharedme($list_dir_sharedme,false);
        }else{
            $this->controleur->affiche_sharedme($list_dir_sharedme,true);
        }
    }

    function getControleur(){
        return $this->controleur;
    }



}
        
?>