<?php

require_once(dirname(__FILE__,3).'/include/modele_generique.php');

require_once(dirname(__FILE__,3)."/modules/files/controleur_files.php");
require_once(dirname(__FILE__,3)."/modules/files/vue_files.php");


class ModFiles extends ModuleGenerique {

    function __construct() {
        $this->controleur = new ControleurFiles();
        $this->vue = new VueFiles();
        $this->modele = new ModeleFiles();

        $list_dir_array = $this->modele->get_list_files();
        
        if(isset($_GET['open'])){
            $_SESSION['current_path_file'] = $_GET['open'];
            $new_list_dir = $this->modele->find_path_tree($_GET['open'],$list_dir_array);
            $this->controleur->affiche_files($new_list_dir);
        }else{
            $_SESSION['current_path_file'] = "/";
            $this->controleur->affiche_files($list_dir_array);
        }
    }

    function getControleur(){
        return $this->controleur;
    }



}
        
?>