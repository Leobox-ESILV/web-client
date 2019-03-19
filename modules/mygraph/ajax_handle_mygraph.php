<?php
require_once(dirname(__FILE__,3)."/modules/mygraph/controleur_mygraph.php");

$controleur = new ControleurMygraph();
$result = $controleur->json_list_mygraph();
echo json_encode($result);

?>