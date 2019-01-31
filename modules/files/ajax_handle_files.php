<?php
require_once(dirname(__FILE__,3)."./modules/files/controleur_files.php");

if(isset($_POST['action']) && $_POST['action']=="create_folder") {
    $name_folder = $_POST['name_folder'];
    $controleur = new ControleurFiles();
    $result = $controleur->create_folder($name_folder);
    echo json_encode($result);
}

?>