<?php

require_once './include/controleur_generique.php';
require_once './include/modele_generique.php';
require_once './include/vue_generique.php';
require_once './include/module_generique.php';
require_once './include/modele_generique_exception.php';

ini_set('display_errors', 1);
// Enregistrer les erreurs dans un fichier de log
ini_set('log_errors', 1);
// Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
error_reporting(E_ALL);

date_default_timezone_set('Europe/Paris');

	ModeleGenerique::init();

	if (isset($_GET['module'])) {
	    $nom_module = htmlspecialchars($_GET['module']);
	} else {
	    $nom_module = "connexion";
	}

	if (isset($_SESSION['user_token']) && !isset($_GET['module'])) {
	    $nom_module = "files";
	}

	switch ($nom_module) {
		case "files":
		case "sharedme":
		case "connexion":
			break;
	    default :
				
	?>

	<body marginwidth="0" marginheight="0">
	    <div id="block_error">
	        <div>
	         <h2>Erreur 404. La page à laquelle vous souhaitez accéder n'existe pas!</h2>
	        </div>
	    </div>
	</body>

	<?php
			break;
	}

	$nom_dossier = "mod_".$nom_module;
	$nom_classe_module = "Mod".$nom_module;
	require_once ("modules/".$nom_module."/".$nom_dossier.".php");
	$module = new $nom_classe_module;
	$module->getControleur()->getVue()->tamponVersContenu();

	if($nom_module == "connexion"){
		require_once './template_connexion.php';
	}else{
		require_once './template.php';
	}
	
?>
