<?php

require_once("modele_connexion.php");
require_once("vue_connexion.php");

class ControleurConnexion extends ControleurGenerique {

	function connexion(){
		$this->vue = new VueConnexion();
		$this->modele = new ModeleConnexion();
		$email=$_POST['email'];
		$mdp=$_POST['motdepasse'];
		$this->modele->connecter($email,$mdp);
	}
}

?>