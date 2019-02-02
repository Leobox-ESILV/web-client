<?php

require_once(dirname(__FILE__,3).'/include/modele_generique.php');

require_once(dirname(__FILE__,3)."/modules/files/controleur_files.php");
require_once(dirname(__FILE__,3)."/modules/files/vue_files.php");


class ModFiles extends ModuleGenerique {

    function __construct() {
        $this->controleur = new ControleurFiles();
        $this->vue = new VueFiles();
        $this->modele = new ModeleFiles();

        $list_dir = $this->modele->get_list_files();

        /* echo "<pre>";
        print_r($list_dir);
        echo "</pre>"; */
   
        if(isset($_GET['dir'])){
            $_SESSION['current_path_file'] = $_GET['dir'];
            $new_list_dir = $this->modele->find_path_tree($_GET['dir'],$list_dir);
            $this->controleur->affiche_files($new_list_dir);
        }else{
            $_SESSION['current_path_file'] = "/";
            $this->controleur->affiche_files($list_dir['sub_dir']);
        }
    }

    function getControleur(){
        return $this->controleur;
    }



}
        
?>