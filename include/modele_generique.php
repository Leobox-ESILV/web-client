<?php

session_start();

class ModeleGenerique{
	
	protected static $url_api;
	
	static function init(){
		ModeleGenerique::$url_api = "http://leobox.org:8080/v1/";
	}

	static function getUrlApi(){
		return "http://leobox.org:8080/v1/";
	}

	static function getClassName() {
	    return 'ModeleGenerique';
	}
	
}

?>