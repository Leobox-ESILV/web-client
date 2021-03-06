<?php

require_once(dirname(__FILE__,3).'/modules/connexion/controleur_connexion.php');

class ModConnexion extends ModuleGenerique {

	function __construct() {
		$this->controleur = new ControleurConnexion();
		$action=isset($_GET['action'])?$_GET['action']:"default";
	
		switch($action) {
			case "connexion":
				$this->controleur->connexion();
			break;
			case "logout":
				$this->controleur->logout();
			break;
		}
		$this->controleur->afficheConnexion();
	}

	function getControleur(){
		return $this->controleur;
	}

}
	  
?>


