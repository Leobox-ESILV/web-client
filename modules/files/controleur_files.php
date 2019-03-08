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
		$result = $this->modele->get_create_folder($name_folder);
		if($result->is_status==200){
			unset($_SESSION['list_dir']);
			$_SESSION['quota'] = $this->modele->formatBytes($result->quota,'MB');
			$_SESSION['used_space'] = $this->modele->formatBytes($result->used_space);
			$_SESSION['percent_used'] = ($result->used_space/$result->quota)*100;
			$_SESSION['dir_count'] = $result->dir_count;
		}
		return $result;
	}

	function upload_file($file){
		$this->modele = new ModeleFiles();
		$result = $this->modele->get_upload_file($file);
		if($result->is_status==200){
			unset($_SESSION['list_dir']);
			$_SESSION['quota'] = $this->modele->formatBytes($result->quota,'MB');
			$_SESSION['used_space'] = $this->modele->formatBytes($result->used_space);
			$_SESSION['percent_used'] = ($result->used_space/$result->quota)*100;
			$_SESSION['file_count'] = $result->file_count;
		}
		return $result;
	}

	function upload_folder($file,$folder_source){
		$this->modele = new ModeleFiles();
		$result = $this->modele->get_upload_folder($file,$folder_source);
		if($result->is_status==200){
			unset($_SESSION['list_dir']);
			$_SESSION['quota'] = $this->modele->formatBytes($result->quota,'MB');
			$_SESSION['used_space'] = $this->modele->formatBytes($result->used_space);
			$_SESSION['percent_used'] = ($result->used_space/$result->quota)*100;
			$_SESSION['file_count'] = $result->file_count;
			$_SESSION['dir_count'] = $result->dir_count;
		}
		return $result;
	}

	function openDownload_file($id_file){
		$this->modele = new ModeleFiles();
		return $this->modele->get_openDownload_file($id_file);
	}

	function getVue() {
		return $this->vue;
	}

}

?>