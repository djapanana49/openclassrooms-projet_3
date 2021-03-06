<?php

session_start();
require('autoload.php');
require('controller/backend.php');
ob_start();
$nb_articles = countPosts(); //nombre d'articles
$nb_comments = countComments(); //nombre de commentaires
$nb_sig_comments = countSigComments(); //nombre de commentaires signalés
// choix d'action dans un switch

try {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'showSignalComments': showSignalComments();
                $sous_titre = "Commentaires signalés"; // titre de section
                break;

            case 'deleteComment':
                if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                    deleteComment($_GET['comment_id']);
                    showSignalComments();
                    $sous_titre = "Commentaires signalés";
                } else {
                    throw new Exception('Pas de suppression possible');
                }
                break;

            case 'validateComment':
                if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                    validateComment($_GET['comment_id']);
                    showSignalComments();
                    $sous_titre = "Commentaires signalés";
                } else {
                    throw new Exception('Pas de validation possible');
                }
                break;

            case 'addPosts':
                if (!empty($_POST['title']) && !empty($_POST['post_author']) && !empty($_POST['content'])) {
                    addPosts($_POST['title'], $_POST['post_author'], $_POST['content']);
                    $sous_titre = "Ajout articles";
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
                break;

            case 'addPostsView':addPostsView();
                $sous_titre = "Ajout d'articles";
                break;

            case 'backendView':backendView();
                $sous_titre = "Vue d'ensemble";
                break;

            case 'editPosts': editPosts();
                $sous_titre = "Gestion des articles";
                countPosts();
                break;

            case 'changePosts':
                if (isset($_GET['id']) && $_GET['id'] > 0) {

                    if (!empty($_POST['title']) && !empty($_POST['content'])) {

                        changePosts($_GET['id'], $_POST['title'], $_POST['content']);
                        $sous_titre = "Gestion des articles";
                    }
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
                break;

            case 'changePostsView':
                if (isset($_GET['id']) && $_GET['id'] > 0) {

                    changePostsView($_GET['id']);
                }
                $sous_titre = "Gestion des articles / Modification";
                break;

            case 'getUser':
                if (isset($_POST) && !empty($_POST['id']) && !empty($_POST['pwd'])) {

                    doConnexion($_POST['id'], $_POST['pwd']);
                } else {

                    CheckSession::userIsConnected();
                }
                $sous_titre = "Vue d'ensemble";

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
                $sous_titre = "Gestion des articles / Affichage";
                break;

            case 'deconnexion':
                deconnexion();
                break;
            case "listPosts": listPosts();
                break;

            default:
                backendView();
                listPosts();

                break;
        }
    } else {
        backendView();
        listPosts();
    }

    $content = ob_get_clean();
    require('view/back_template.php');
} catch (Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
