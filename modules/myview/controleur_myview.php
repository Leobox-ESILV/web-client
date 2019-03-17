<?php

require_once (dirname(__FILE__,3)."/modules/myview/modele_myview.php");
require_once (dirname(__FILE__,3)."/modules/myview/vue_myview.php");
require_once (dirname(__FILE__,3)."/include/controleur_generique.php");

class ControleurMyview extends ControleurGenerique {

	 function affiche_myview() {
		$this->vue = new VueMyview();
		$this->vue->vue_myview();
	}
	
	function json_list_myview(){
		$this->modele = new ModeleMyview();
		$list_dir_array = $this->modele->get_list_myview();
		/* echo '<pre>'; print_r($list_dir_array); echo '</pre>'; */
		return $list_dir_array;
	}
	
	function getVue() {
		return $this->vue;
	}

}

?>