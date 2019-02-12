<?php

require_once (dirname(__FILE__,3)."/modules/files/modele_files.php");
require_once (dirname(__FILE__,3)."/modules/files/vue_files.php");
require_once (dirname(__FILE__,3)."/include/controleur_generique.php");

class ControleurFiles extends ControleurGenerique {

   function affiche_files($list_dir) {
      $this->vue = new VueFiles();
      $this->modele = new ModeleFiles();
      $this->vue->vue_files($list_dir);
    }

    function create_folder($name_folder){
      $this->modele = new ModeleFiles();
      return $this->modele->get_create_folder($name_folder);
    }

    function upload_file($file){
      $this->modele = new ModeleFiles();
      return $this->modele->get_upload_file($file);
    }

    function upload_folder($file,$folder_source){
      $this->modele = new ModeleFiles();
      return $this->modele->get_upload_folder($file,$folder_source);
    }

    function open_file($id_file){
      $this->modele = new ModeleFiles();
      return $this->modele->get_open_file($id_file);
    }

    function getVue() {
      return $this->vue;
    }

}

?>