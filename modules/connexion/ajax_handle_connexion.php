<?php
require_once(dirname(__FILE__,3)."/modules/connexion/controleur_connexion.php");

if(isset($_POST['action']) && $_POST['action']=="connexion") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $controleur = new ControleurConnexion();
    $result = $controleur->connexion($username,$password);
    echo json_encode($result);
}

if(isset($_POST['action']) && $_POST['action']=="createaccount") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $controleur = new ControleurConnexion();
    $result = $controleur->createaccount($email,$username,$password);
    echo json_encode($result);
}

?>