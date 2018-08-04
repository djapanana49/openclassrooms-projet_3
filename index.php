<?php
define("PROJET3",dirname(__FILE__));//dossier du projet-C:\Users\SYLVIE\Documents\Openclassroom\Projet_3
define("ROOT",dirname(PROJET3));//racine du projet-C:\Users\SYLVIE\Documents\Openclassroom
define("DS",DIRECTORY_SEPARATOR);//separateur
define("PUB",ROOT.DS."public");//url dossier public
define("BASE_URL",dirname($_SERVER["SCRIPT_NAME"]));
require('controller/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}
else {
    listPosts();
}
