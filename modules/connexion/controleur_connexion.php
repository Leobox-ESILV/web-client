<?php

require_once("./modules/connexion/modele_connexion.php");
require_once("./modules/connexion/vue_connexion.php");

class ControleurConnexion extends ControleurGenerique {

	function connexion(){
		$this->vue = new VueConnexion();
		$this->modele = new ModeleConnexion();
		$email=$_POST['email'];
		$mdp=$_POST['motdepasse'];
		$this->modele->connecter($email,$mdp);
	}

	function afficheConnexion() {
        $this->vue = new VueConnexion();
        $this->modele = new ModeleConnexion();
        $this->vue->connexion();
    }

	function getVue() {
        return $this->vue;
    }
}

?>