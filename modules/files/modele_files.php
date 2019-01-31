<?php

require_once(dirname(__FILE__,3).'./include/modele_generique.php');
require_once(dirname(__FILE__,3).'./vendor/autoload.php');

class ModeleFiles extends ModeleGenerique {

    function set_mime_type($mime_type){
        if(strpos($mime_type,'image')){
            $value = 'la-file-image-o';
        }else if(strpos($mime_type,'directory')){
            $value = 'la-folder-o';
        }else if(strpos($mime_type,'pdf')){
            $value = 'la-file-pdf-o';
        }else if(strpos($mime_type,'audio')){
            $value = 'la-file-sound-o';
        }else if(strpos($mime_type,'video')){
            $value = 'la-file-video-o';
        }else if(strpos($mime_type,'compressed') || strpos($mime_type,'zip')){
            $value = 'la-file-zip-o';
        }else{
            $value = 'la-file-code-o';
        }
        return $value;
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

    function find_path_tree($find, $array) {
        $this->modele = new ModeleFiles();
        if(isset($array['path_file'])){
            if( $array['path_file'] == $find ) {
                return $array['sub_dir'];
            }
        }
    
        if( empty($array['sub_dir']) ) {
            return null;
        }
    
        foreach($array['sub_dir'] as $child) {
            $result = $this->modele->find_path_tree($find, $child);
            if( $result !== null ) {
                return $result;
            }
        }
    
        return null;
    }
    

	function get_list_files(){
        $user_token = $_SESSION['user_token'];
        $username = $_SESSION['display_name'];
        
        $client = new GuzzleHttp\Client();
		$res = $client->request('GET', parent::$url_api."file/".$username, [
			'headers' => [
                'ApiKeyUser' => $user_token
            ]
		]);
        $result = json_decode($res->getBody(), true);
        return $result;
    }

    function get_create_folder($name_folder){
        $user_token = $_SESSION['user_token'];
        $username = $_SESSION['display_name'];
        $path_dir = $_SESSION['current_path_file']."/".$name_folder;
        $modeleGene = new ModeleGenerique();

        $client = new GuzzleHttp\Client();
		$res = $client->request('POST', $modeleGene->getUrlApi()."file/".$username."/createdir", [
            'query' => ['path_dir' => $path_dir],
			'headers' => [
                'ApiKeyUser' => $user_token
            ]
        ]);
        $result = json_decode($res->getBody(), true);
        return $result;
    }

    function get_upload_file($file){
        $user_token = $_SESSION['user_token'];
        $username = $_SESSION['display_name'];
        $path_file = $_SESSION['current_path_file'];
        $modeleGene = new ModeleGenerique();

        $client = new GuzzleHttp\Client();
		$res = $client->request('POST', $modeleGene->getUrlApi()."file/".$username."/upload", [
            'query' => ['path_file' => $path_file],
			'headers' => [
                'ApiKeyUser' => $user_token
            ],
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen($file['tmp_name'], 'r'),
                    'filename' => $file['name']
                ]
            ]
        ]);
        $result = json_decode($res->getBody(), true);
        return $result;
    }

}


?>	