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
			$_SESSION['dir_count'] = $result->dir_count;
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

	function rename($id_file,$new_name){
		$this->modele = new ModeleFiles();
		$result = $this->modele->get_rename($id_file,$new_name);
		if($result->is_status==200){
			unset($_SESSION['list_dir']);
		}
		return $result;
	}

	function delete($id_file){
		$this->modele = new ModeleFiles();
		$result = $this->modele->get_delete($id_file);
		if($result->is_status==200){
			unset($_SESSION['list_dir']);
		}
		return $result;
	}

	function getuserToShare(){
		$this->modele = new ModeleFiles();
		$result = $this->modele->get_userToShare();
		return $result;
	}

	function setuserToShare($id_file,$user_toshare){
		$this->modele = new ModeleFiles();
		$result = $this->modele->set_userToShare($id_file,$user_toshare);
		return $result;
	}

	function getVue() {
		return $this->vue;
	}

}

?>