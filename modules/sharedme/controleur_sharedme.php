<?php

require_once (dirname(__FILE__,3)."/modules/sharedme/modele_sharedme.php");
require_once (dirname(__FILE__,3)."/modules/sharedme/vue_sharedme.php");
require_once (dirname(__FILE__,3)."/include/controleur_generique.php");

class ControleurSharedme extends ControleurGenerique {

	 function affiche_sharedme($list_dir,$home_user) {
		$this->vue = new VueSharedme();
		$this->modele = new ModeleSharedme();
		$this->vue->vue_sharedme($list_dir,$home_user);
	}

	function create_folder($name_folder,$id_parent){
		$this->modele = new ModeleSharedme();
		$result = $this->modele->get_create_folder($name_folder,$id_parent);
		return $result;
	}

	function upload_file($file,$id_parent){
		$this->modele = new ModeleSharedme();
		$result = $this->modele->get_upload_file($file,$id_parent);
		return $result;
	}

	function upload_folder($file,$folder_source){
		$this->modele = new ModeleSharedme();
		$result = $this->modele->get_upload_folder($file,$folder_source);
		return $result;
	}

	function openDownload_file($id_file){
		$this->modele = new ModeleSharedme();
		return $this->modele->get_openDownload_file($id_file);
	}

	function rename($id_file,$new_name){
		$this->modele = new ModeleSharedme();
		$result = $this->modele->get_rename($id_file,$new_name);
		return $result;
	}

	function delete($id_file){
		$this->modele = new ModeleSharedme();
		$result = $this->modele->get_delete($id_file);
		return $result;
	}

	function getVue() {
		return $this->vue;
	}

}

?>