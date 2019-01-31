<?php

require_once("controleur_connexion.php");

class ModConnexion extends ModuleGenerique {

	function __construct() {
		$this->controleur = new ControleurConnexion();

		$action=isset($_GET['action'])?$_GET['action']:"default";
	
		switch($action) {
			case "connexion":
				$this->controleur->connexion();
			break;
		}
	}

	function getControleur(){
		return $this->controleur;
	}

}
	  
?>


