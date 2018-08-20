<?php
require('controller/backend.php');
ob_start();
try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'showSignalComments') {
            showSignalComments();
        } elseif ($_GET['action'] == 'deleteComment') {
            if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                deleteComment($_GET['comment_id']);
            } else
                throw new Exception('ça ne marche pas');
        }

        elseif ($_GET['action'] == 'validateComment') {
            if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                validateComment();
            } else
                throw new Exception('ça ne marche pas');
        }

        elseif ($_GET['action'] == 'addPosts') {

            if (!empty($_POST['title']) && !empty($_POST['post_author']) && !empty($_POST['content'])) {
                addPosts($_POST['title'], $_POST['post_author'], $_POST['content']);
            } else {
                throw new Exception('Erreur : tous les champs ne sont pas remplis !');
            }
        } elseif ($_GET['action'] == 'addPostsView') {

            addPostsView();
        }
        if ($_GET['action'] == 'editPosts') {
            editPosts();
        }
         elseif ($_GET['action'] == 'changePosts') {
             
             if(isset($_GET['id'])&&$_GET['id']>0){

            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                
                changePosts($_GET['id'], $_POST['title'], $_POST['content']);
                
             } }else {
                throw new Exception('Erreur : tous les champs ne sont pas remplis !');
            }
        } elseif ($_GET['action'] == 'changePostsView') {
            if (isset($_GET['id']) && $_GET['id'] > 0){
             
            changePostsView($_GET['id']);
        }
        
        }
    } else {

       header('Location: admin.php');
    }

    $content = ob_get_clean();
    require('view/back_template.php');
} catch (Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
