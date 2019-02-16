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
		
		return $result;
	}

	function formatBytes($bytes, $force_unit = NULL, $format = NULL, $si = TRUE)
    {
        // Format string
        $format = ($format === NULL) ? '%01.2f %s' : (string) $format;

        $units = array('B', 'kB', 'MB', 'GB', 'TB', 'PB');
        $mod   = 1024;

        // Determine unit to use
        if (($power = array_search((string) $force_unit, $units)) === FALSE)
        {
            $power = ($bytes > 0) ? floor(log($bytes, $mod)) : 0;
        }

        return sprintf($format, $bytes / pow($mod, $power), $units[$power]);
    }
}


		
?>
