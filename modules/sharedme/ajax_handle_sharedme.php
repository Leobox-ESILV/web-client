<?php
require_once(dirname(__FILE__,3)."/modules/sharedme/controleur_sharedme.php");

if(isset($_POST['action']) && $_POST['action']=="create_folder") {
    $name_folder = $_POST['name_folder'];
    $id_parent = $_POST['id_parent'];
    $controleur = new ControleurSharedme();
    $result = $controleur->create_folder($name_folder,$id_parent);
    echo json_encode($result);
}

if(isset($_POST['action']) && $_POST['action']=="upload_file") {
    $file = $_FILES['file1'];
    $id_parent = $_POST['id_parent'];
    $controleur = new ControleurSharedme();
    $result = $controleur->upload_file($file,$id_parent);
    echo json_encode($result);
}

if(isset($_POST['action']) && $_POST['action']=="upload_folder") {
    $file = $_FILES['file1'];
    $folder_source = $_POST['folder_source'];
    $controleur = new ControleurSharedme();
    $result = $controleur->upload_folder($file,$folder_source);
    echo json_encode($result);
}

if(isset($_POST['action']) && $_POST['action']=="openDownload_file") {
    $id_file = $_POST['id_file'];
    $controleur = new ControleurSharedme();
    $res = $controleur->openDownload_file($id_file);
    echo base64_encode($res->getBody());
}

if(isset($_POST['action']) && $_POST['action']=="rename") {
    $id_file = $_POST['id_file'];
    $new_name = $_POST['new_name'];
    $controleur = new ControleurSharedme();
    $result = $controleur->rename($id_file,$new_name);
    echo json_encode($result);
}

if(isset($_POST['action']) && $_POST['action']=="delete") {
    $id_file = $_POST['id_file'];
    $controleur = new ControleurSharedme();
    $result = $controleur->delete($id_file);
    echo json_encode($result);
}

?>