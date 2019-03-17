<?php
require_once(dirname(__FILE__,3)."/modules/myview/controleur_myview.php");

$controleur = new ControleurMyview();
$result = $controleur->json_list_myview();
echo json_encode($result);

?>