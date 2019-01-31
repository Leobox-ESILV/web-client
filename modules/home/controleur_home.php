<?php

require_once ("modules/home/modele_home.php");
require_once ("modules/home/vue_home.php");

class ControleurHome extends ControleurGenerique {

    function afficheHome() {
        $this->vue = new VueHome();
        $this->modele = new ModeleHome();
        $this->vue->home();
    }

   function getVue() {
        return $this->vue;
    }

}   

?>
