<?php

require_once 'model/CommentsManager.php';
require_once 'model/PostsManager.php';
require_once 'model/UsersManager.php';


    function showSignalComments(){

        $commentManager = new CommentsManager();
        $signals = $commentManager->showSignalComments();
        if ($signals === false) {
            throw new Exception('Aucun commentaire signalé');
        }
      
      require('view/back_commentView.php');

    }


    function deleteComment($commentid){

        $commentManager = new CommentsManager();
        $suppr = $commentManager->deleteComment($commentid);
        if ($suppr === false) {
            throw new Exception('Aucun commentaire supprimé');
        }
     else {
        header('Location: admin.php');
        }
    }

    function validateComment($commentId){

        $commentManager = new CommentsManager();
        $valid = $commentManager->validateComment($commentId);
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
        require('view/addPostsView.php');
        }
      }

    function addPostsView(){

        require('view/addPostsView.php');
    }

    