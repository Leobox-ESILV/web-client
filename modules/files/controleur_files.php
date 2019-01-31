<?php

require_once (dirname(__FILE__,3)."./modules/files/modele_files.php");
require_once (dirname(__FILE__,3)."./modules/files/vue_files.php");
require_once (dirname(__FILE__,3)."./include/controleur_generique.php");

class ControleurFiles extends ControleurGenerique {

   function affiche_files($list_dir) {
      $this->vue = new VueFiles();
      $this->modele = new ModeleFiles();
      $this->vue->vue_files($list_dir);
    }

    function create_folder($name_folder){
      $this->modele = new ModeleFiles();
      return $this->modele->get_create_file($name_folder);
    }

    function getVue() {
      return $this->vue;
    }

}

?>