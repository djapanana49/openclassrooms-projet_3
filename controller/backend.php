<?php

require_once('model/CommentsManager.php');
require_once('model/PostsManager.php');


    function showSignalComments(){

        $commentManager = new CommentsManager();
        $signals = $commentManager->showSignalComments();
        if ($signals === false) {
            throw new Exception('Aucun commentaire signalé');
        }
      
      require('view/back_commentView.php');

    }


    function deleteComment(){

        $commentManager = new CommentsManager();
        $suppr = $commentManager->deleteComment($_GET['comment_id']);
        if ($signals === false) {
            throw new Exception('Aucun commentaire supprimé');
        }
     else {
        header('Location: admin.php');
        }
    }

    function validateComment(){

        $commentManager = new CommentsManager();
        $valid = $commentManager->validateComment($_GET['comment_id']);
        if ($valid === false) {
        throw new Exception('Impossible de valider le commentaire !');
        }
        else {
        header('Location: admin.php');
        }
    }
      
      function addPosts($title,$postauthor,$content){
        
        $postManager = new PostsManager();
        $affectedLines = $postManager->addPosts($title,$postauthor,$content);

        if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'article !');
        }
        else {
        require('view/addPosts.php');
        }
      }

    