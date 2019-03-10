<?php

require_once(dirname(__FILE__,3).'/include/modele_generique.php');
require_once(dirname(__FILE__,3)."/modules/connexion/vue_connexion.php");
require_once(dirname(__FILE__,3).'/vendor/autoload.php');

class ModeleConnexion extends ModeleGenerique {

	function get_connecter($username,$password){

		$modeleGene = new ModeleGenerique();

        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', $modeleGene->getUrlApi().'user/login', [
			'query' => ['username' => $username, 'password' => $password]
        ]);
        
		$result = json_decode($res->getBody());
		return $result;
    }
    
    function get_createaccount($email,$username,$password){
        $modeleGene = new ModeleGenerique();

        $client = new GuzzleHttp\Client();
        $res = $client->request('POST', $modeleGene->getUrlApi().'user/create', [
			'query' => ['username' => $username, 'password' => $password, 'email'=> $email]
        ]);
        
		$result = json_decode($res->getBody());
		return $result;
    }

    function get_logout(){
        $user_token = $_SESSION['user_token'];
        $username = $_SESSION['display_name'];
        $modeleGene = new ModeleGenerique();

        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', $modeleGene->getUrlApi()."user/".$username."/logout", [
            'headers' => [
                'ApiKeyUser' => $user_token
            ]
        ]);
        $result = json_decode($res->getBody());
        return $result;
    }


	function formatBytes($bytes, $force_unit = NULL, $format = NULL, $si = TRUE)
    {
        // Format string
        $format = ($format === NULL) ? '%01.2f %s' : (string) $format;

        $units = array('B', 'kB', 'MB', 'GB', 'TB', 'PB');
        $mod   = 1000;

        // Determine unit to use
        if (($power = array_search((string) $force_unit, $units)) === FALSE)
        {
            $power = ($bytes > 0) ? floor(log($bytes, $mod)) : 0;
        }

        return sprintf($format, $bytes / pow($mod, $power), $units[$power]);
    }
}


		
?>
