<?php

require_once(dirname(__FILE__,3)."/modules/connexion/modele_connexion.php");
require_once(dirname(__FILE__,3)."/modules/connexion/vue_connexion.php");
require_once(dirname(__FILE__,3)."/include/controleur_generique.php");

class ControleurConnexion extends ControleurGenerique {

	function connexion($username,$password){
		$this->modele = new ModeleConnexion();
		$result = $this->modele->get_connecter($username,$password);

		if($result->is_status == 200){
			$_SESSION['display_name'] = $result->display_name;
			$_SESSION['email'] = $result->email;
			$_SESSION['quota'] = $this->modele->formatBytes($result->quota,'MB');
			$_SESSION['used_space'] = $this->modele->formatBytes($result->used_space);
			$_SESSION['percent_used'] = ($result->used_space/$result->quota)*100;
			$_SESSION['user_token'] = $result->user_token;
			$_SESSION['file_count'] = $result->file_count;
			$_SESSION['dir_count'] = $result->dir_count;
			$_SESSION['expiration_token'] = $result->expiration_token;
		}

		return $result;
	}

	function createaccount($email,$username,$password){
		$this->modele = new ModeleConnexion();
		$result = $this->modele->get_createaccount($email,$username,$password);
		return $result;
	}

	function logout(){
		$this->vue = new VueConnexion();
		$this->modele = new ModeleConnexion();
		$result = $this->modele->get_logout();
		session_unset();
		$this->vue->redirectAccueil();
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