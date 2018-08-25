<?php
session_start();
define("PROJET3", dirname(__FILE__)); //dossier du projet-C:\Users\SYLVIE\Documents\Openclassroom\Projet_3
define("ROOT", dirname(PROJET3)); //racine du projet-C:\Users\SYLVIE\Documents\Openclassroom
define("DS", DIRECTORY_SEPARATOR); //separateur
define("PUB", ROOT . DS . "public"); //url dossier public
define("BASE_URL", dirname($_SERVER["SCRIPT_NAME"]));
require('controller/front.php');
ob_start();
try {
    if (isset($_GET['action'])) {
        switch($_GET['action']){
            
            case "listPosts": echo "liste des articles"; listPosts();break;
            case 'post':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant de billet envoy�');
            }
            break;
            case 'addComment':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoy�');
            }
            break;
            case 'alertComment':
                if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                alertComment();
            } else{
                throw new Exception('�a ne marche pas');
            }
            break;
            
            case 'connectView':connectView();break;
            
            default:  echo "par défaut"; listPosts(); break;
        } 
 
    }else{
        
        listPosts();
        
    }
    $content = ob_get_clean();
    require('view/template.php');
} catch (Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}




	