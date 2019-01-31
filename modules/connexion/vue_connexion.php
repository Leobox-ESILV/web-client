<?php

require_once("mod_connexion.php");
require_once("controleur_connexion.php");

class VueConnexion extends VueGenerique {

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