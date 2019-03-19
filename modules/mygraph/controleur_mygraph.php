<?php

require_once (dirname(__FILE__,3)."/modules/mygraph/modele_mygraph.php");
require_once (dirname(__FILE__,3)."/modules/mygraph/vue_mygraph.php");
require_once (dirname(__FILE__,3)."/include/controleur_generique.php");

class ControleurMygraph extends ControleurGenerique {

	 function affiche_mygraph() {
		$this->vue = new VueMygraph();
		$this->vue->vue_mygraph();
	}
	
	function json_list_mygraph(){
		$this->modele = new ModeleMygraph();
		$list_dir_array = $this->modele->get_list_mygraph();
		return $list_dir_array;
	}
	
	function getVue() {
		return $this->vue;
	}

}

?>