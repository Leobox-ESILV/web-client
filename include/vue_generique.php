<?php

class VueGenerique{
	
	protected $contenu;
	protected $titre;
	
	function __construct(){
		$this->contenu = "";
		$this->titre = "";
		ob_start();
	}

	function tamponVersContenu(){
		$this->contenu .= ob_get_clean();
		
	}
	
	function vue_erreur($err){
		echo "<p style=\"color:red;\">$err</p>";
	}
	
	function vue_confirm($confirm){
		echo "<p style=\"color:green;\">$confirm</p>";
	}
	
	function getTitre(){
		return $this->titre;
	}
	
	function getContenu(){
		return $this->contenu;
	}
	
	
	
}

?>