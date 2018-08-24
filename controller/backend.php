<?php

require_once 'model/CommentsManager.php';
require_once 'model/PostsManager.php';
require_once 'model/UsersManager.php';

function showSignalComments() {

    $commentManager = new CommentsManager();
    $signals = $commentManager->showSignalComment();
    if ($signals == false) {
        throw new Exception('Aucun commentaire signalé');
    }
    
    require('view/back_commentView.php');
    
}

function deleteComment($commentid) {

    $commentManager = new CommentsManager();
    $suppr = $commentManager->deleteComment($commentid);
    if ($suppr === false) {
        throw new Exception('Aucun commentaire supprimé');
    } else {
        require('view/backendView.php');
    }
}

function validateComment($commentId) {

    $commentManager = new CommentsManager();
    $valid = $commentManager->validateComment($commentId);
    if ($valid === false) {
        throw new Exception('Impossible de valider le commentaire !');
    } else {
        header('Location: admin.php');
    }
}

function addPosts($title, $postauthor, $content) {

    $postManager = new PostsManager();
    $affectedLines = $postManager->addPosts($title, $postauthor, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'article !');
    } else {
        require('view/addPostsView.php');
    }
}

function addPostsView() {

    require('view/addPostsView.php');
}

function changePosts($postId, $title, $content) {

    $postManager = new PostsManager();
    $affectedLines = $postManager->changePosts($postId, $title, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier l\'article !');
    }
}

function editPosts() {
    
    $postManager = new PostsManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/editPostsView.php');
    
}

function changePostsView($postsId) {
    
    $postManager = new PostsManager(); // Création d'un objet
    $posts = $postManager->getPost($postsId);
    require('view/back_postView.php');
}

function getUser($userId, $pwd){
    
    $userManager = new UsersManager();
    $user =$userManager->getUser($userId, $pwd);
    if($user==true){
   /* var_dump($user);
    die;*/
    require('view/backendView.php');}
    
    else{
        
        header('Location:index.php?action=connectView');
    }
}

function deletePosts($postid) {

    $postManager = new PostsManager();
    $suppr = $postManager->deletePosts($postid);
    if ($suppr === false) {
        throw new Exception('Aucun commentaire supprimé');
    } else {
        require('view/backendView.php');
    }
}

function post()
{
    $postManager = new PostsManager();
    $post = $postManager->getPost($_GET['id']);
    require('view/postView2.php');
}
