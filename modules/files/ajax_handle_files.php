<?php
require_once(dirname(__FILE__,3)."/modules/files/controleur_files.php");

if(isset($_POST['action']) && $_POST['action']=="create_folder") {
    $name_folder = $_POST['name_folder'];
    $controleur = new ControleurFiles();
    $result = $controleur->create_folder($name_folder);
    echo json_encode($result);
}

if(isset($_POST['action']) && $_POST['action']=="upload_file") {
    $file = $_FILES['file1'];
    $controleur = new ControleurFiles();
    $result = $controleur->upload_file($file);
    echo json_encode($result);
}

if(isset($_POST['action']) && $_POST['action']=="upload_folder") {
    $file = $_FILES['file1'];
    $folder_source = $_POST['folder_source'];
    $controleur = new ControleurFiles();
    $result = $controleur->upload_folder($file,$folder_source);
    echo json_encode($result);
}

if(isset($_POST['action']) && $_POST['action']=="openDownload_file") {
    $id_file = $_POST['id_file'];
    $controleur = new ControleurFiles();
    $res = $controleur->openDownload_file($id_file);
    echo base64_encode($res->getBody());
}


?>