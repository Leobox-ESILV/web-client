<?php

require_once(dirname(__FILE__,3).'/include/modele_generique.php');
require_once(dirname(__FILE__,3).'/vendor/autoload.php');

class ModeleMyview extends ModeleGenerique {

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
                    $type_file = explode(".", $arr['text']);
                    if(isset($type_file[1])){
                        $arr[$key] = 'file file-'.$type_file[1];
                    }else{
                        $arr[$key] = 'file file';
                    }
                }elseif($key == 'type'){
                    $arr[$key] = 'folder';
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


	function get_list_myview(){
        $user_token = $_SESSION['user_token'];
        $username = $_SESSION['display_name'];
        
        $modeleGene = new ModeleGenerique();
        $this->modele = new ModeleMyview();
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
        $result = $this->recursive_change_key($result,array('sub_dir'=>'children'));
        $result = $this->recursive_change_key($result,array('name'=>'text'));
        $this->recursive_changevalue($result);
        $result = $this->recursive_change_key($result,array('type'=>'icon'));
        return $result['children'];
    }

}


?>	