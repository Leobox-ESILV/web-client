<?php

require_once('./include/modele_generique.php');
require_once("./modules/connexion/vue_connexion.php");
require_once('./vendor/autoload.php');

class ModeleConnexion extends ModeleGenerique {

	function connecter($email,$mdp){

		$this->vue = new VueConnexion();

		$client = new GuzzleHttp\Client();
		$res = $client->request('GET', parent::$url_api.'user/login', [
			'query' => ['username' => $email, 'password' => $mdp]
		]);
		$result = json_decode($res->getBody());
		
		if($result->is_status != 200){
			$this->vue->error_message($result->comment);
			$this->vue->redirectAccueil();
		}else{
			$_SESSION['display_name'] = $result->display_name;
			$_SESSION['email'] = $result->email;
			$_SESSION['quota'] = $result->quota;
			$_SESSION['used_space'] = $result->used_space;
			$_SESSION['user_token'] = $result->user_token;
			$_SESSION['expiration_token'] = $result->expiration_token;
			$this->vue->redirectHome();
		}
			
	}
}


		
?>
