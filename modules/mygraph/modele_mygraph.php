<?php

require_once(dirname(__FILE__,3).'/include/modele_generique.php');
require_once(dirname(__FILE__,3).'/vendor/autoload.php');

class ModeleMygraph extends ModeleGenerique {

    function recursive_unset(&$array, $unwanted_key) {
        unset($array[$unwanted_key]);
        foreach ($array as &$value) {
            if (is_array($value)) {
                $this->recursive_unset($value, $unwanted_key);
            }
        }
    }

    function recursive_changevalue(&$arr) {
        foreach($arr as $key => &$val){
            if(is_array($val)){
                $this->recursive_changevalue($val);
            }else{
                if($key == 'type' && $val != 'Folder'){
                    $type_file = explode(".", $arr['name']);
                    $arr[$key] = 'https://cdn2.iconfinder.com/data/icons/circle-icons-1/64/document-128.png';
                }elseif($key == 'type'){
                    $arr[$key] = 'https://cdn0.iconfinder.com/data/icons/medical-volume-1-4/256/48-256.png';
                }
            }
        }
    }

    function recursive_change_key($arr, $set) {
        if (is_array($arr) && is_array($set)) {
            $newArr = array();
            foreach ($arr as $k => $v) {
                        $key = array_key_exists( $k, $set) ? $set[$k] : $k;
                        $newArr[$key] = is_array($v) ? $this->recursive_change_key($v, $set) : $v;
            }
            return $newArr;
        }
        return $arr;    
    }


	function get_list_mygraph(){
        $user_token = $_SESSION['user_token'];
        $username = $_SESSION['display_name'];
        
        $modeleGene = new ModeleGenerique();
        $this->modele = new ModeleMygraph();
        $client = new GuzzleHttp\Client();
		$res = $client->request('GET', $modeleGene->getUrlApi()."file/".$username, [
			'headers' => [
                'ApiKeyUser' => $user_token
            ]
		]);
        $result = json_decode($res->getBody(), true);
    
        $this->recursive_unset($result,'mime_type');
        $this->recursive_unset($result,'size');
        $this->recursive_unset($result,'id');
        $this->recursive_unset($result,'storage_mtime');
        $this->recursive_unset($result,'path_file');
        $this->recursive_unset($result,'is_status');
        $result = $this->recursive_change_key($result,array('sub_dir'=>'children'));
        $this->recursive_changevalue($result);
        $result = $this->recursive_change_key($result,array('type'=>'imageURL'));
        $result['comment'] = "Leobox : ".$_SESSION['display_name'];
        $result = $this->recursive_change_key($result,array('comment'=>'name'));
        $result['imageURL'] = 'https://cdn2.iconfinder.com/data/icons/circle-icons-1/64/contacts-512.png';
        return $result;
    }

}


?>	