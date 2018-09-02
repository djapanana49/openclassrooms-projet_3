<?php
session_start();
require('autoload.php');
require('controller/backend.php');
ob_start();
try {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'showSignalComments': showSignalComments();
                $sous_titre="Commentaires signalés";
                break;
            
            case 'deleteComment':
                if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                    deleteComment($_GET['comment_id']);
                    showSignalComments();
                    $sous_titre="Commentaires signalés";
                } else {
                    throw new Exception('Pas de suppression possible');
                }
                break;
                
            case 'validateComment':
                if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                    validateComment($_GET['comment_id']);
                    showSignalComments();
                    $sous_titre="Commentaires signalés";
                } else {
                    throw new Exception('Pas de validation possible');
                }
                break;
                
            case 'addPosts':
                if (!empty($_POST['title']) && !empty($_POST['post_author']) && !empty($_POST['content'])) {
                    addPosts($_POST['title'], $_POST['post_author'], $_POST['content']);
                    $sous_titre="Ajout articles";
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
                break;

            case 'addPostsView':addPostsView();
                $sous_titre="Ajout d'articles";
                break;
            
            case 'backendView':backendView();
                $sous_titre="Vue d'ensemble";
                break;
            
            case 'editPosts': editPosts();
                $sous_titre="Gestion des articles";
                break;
            
            case 'changePosts':
                if (isset($_GET['id']) && $_GET['id'] > 0) {

                    if (!empty($_POST['title']) && !empty($_POST['content'])) {

                        changePosts($_GET['id'], $_POST['title'], $_POST['content']);
                    }
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
                break;
                
            case 'changePostsView':
                if (isset($_GET['id']) && $_GET['id'] > 0) {

                    changePostsView($_GET['id']);
                }
                $sous_titre="Gestion des articles / Modification";
                break;

            case 'getUser':
                if (isset($_POST) && !empty($_POST['id']) && !empty($_POST['pwd'])) {
                    getUser($_POST['id'], $_POST['pwd']);
                    
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
                $sous_titre="Vue d'ensemble";
                break;
            case 'deletePosts':
                
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    
                    deletePosts($_GET['id']);
                }
                break;
                
             case 'post':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
                }
                $sous_titre="Gestion des articles / Affichage";
                break;
                
            case 'deconnexion':
                deconnexion();
                break;
                

            default:  backendView();
                break;
        }
        
    } else {

        backendView();
    }

    $content = ob_get_clean();
    require('view/back_template.php');
} catch (Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
