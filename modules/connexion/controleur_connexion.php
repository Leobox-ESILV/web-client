<?php

require_once("./modules/connexion/modele_connexion.php");
require_once("./modules/connexion/vue_connexion.php");

class ControleurConnexion extends ControleurGenerique {

	function connexion(){
		$this->vue = new VueConnexion();
		$this->modele = new ModeleConnexion();
		$email=$_POST['email'];
		$mdp=$_POST['motdepasse'];
		$result = $this->modele->connecter($email,$mdp);

		if($result->is_status != 200){
			$this->vue->error_message($result->comment);
			$this->vue->redirectAccueil();
		}else{
			$_SESSION['display_name'] = $result->display_name;
			$_SESSION['email'] = $result->email;
			$_SESSION['quota'] = $this->modele->formatBytes($result->quota,'MB');
			$_SESSION['used_space'] = $this->modele->formatBytes($result->used_space,'MB');
			$_SESSION['percent_used'] = ($result->used_space/$result->quota)*100;
			$_SESSION['user_token'] = $result->user_token;
			$_SESSION['file_count'] = $result->file_count;
			$_SESSION['dir_count'] = $result->dir_count;
			$_SESSION['expiration_token'] = $result->expiration_token;
			$this->vue->redirectHome();
		}
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