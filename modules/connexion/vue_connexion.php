<?php

require_once (dirname(__FILE__,3)."/include/vue_generique.php");

class VueConnexion extends VueGenerique {

    public function __construct() {
        parent::__construct();
    }

    public function connexion() {
      
    }

    function error_message($message){
    	echo '<script language="javascript">';
        echo 'alert("'.$message.'")';
        echo '</script>';
    }

    function redirectAccueil(){
        echo '<script language="JavaScript" type="text/javascript">window.location.replace("index.php");</script>';
    }

    function redirectHome(){
        echo '<script language="JavaScript" type="text/javascript">window.location.replace("index.php?module=files");</script>';
    }
}

?>