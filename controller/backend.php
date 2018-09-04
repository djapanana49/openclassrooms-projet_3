<?php

/* Affichage des commentaires signalés */

function showSignalComments() {

    $commentManager = new CommentsManager();
    $signals = $commentManager->showSignalComment();
    if ($signals == false) {
        throw new Exception('Aucun commentaire signalé');
    }

    require('view/back_commentView.php');
}

/* Suppression des commentaires signalés */

function deleteComment($commentid) {

    $commentManager = new CommentsManager();
    $suppr = $commentManager->deleteComment($commentid);
    if ($suppr === false) {
        throw new Exception('Aucun commentaire supprimé');
    }
}

/* Validation des commentaires signalés */

function validateComment($commentId) {

    $commentManager = new CommentsManager();
    $valid = $commentManager->validateComment($commentId);
    if ($valid === false) {
        throw new Exception('Impossible de valider le commentaire !');
    }
}

/* Ajouter des articles */

function addPosts($title, $postauthor, $content) {

    $postManager = new PostsManager();
    $affectedLines = $postManager->addPosts($title, $postauthor, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'article !');
    } else {
        require('view/addPostsView.php');
    }
}

/* Accès à la page d'ajout des articles */

function addPostsView() {

    require('view/addPostsView.php');
}

/* Accès à la page d'accueil de l'administration */

function backendView() {

    require('view/backendView.php');
}

/* Modification des articles */

function changePosts($postId, $title, $content) {

    $postManager = new PostsManager();
    $affectedLines = $postManager->changePosts($postId, $title, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier l\'article !');
    }
}

/* Affichage des articles */

function editPosts() {

    $postManager = new PostsManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/editPostsView.php');
}

/* Accès à la page de modification des articles */

function changePostsView($postsId) {

    $postManager = new PostsManager(); // Création d'un objet
    $posts = $postManager->getPost($postsId);
    require('view/back_postView.php');
}

/* Vérification des identifiants de connexion */

function getUser($userId, $pwd) {

    $userManager = new UsersManager();
    $user = $userManager->getUser($userId, $pwd);
    if ($user == true) {

        require('view/backendView.php');
    } else {
        header('Location:index.php?action=connectView');
    }
}

/* Suppression d'un article */

function deletePosts($postid) {

    $postManager = new PostsManager();
    $suppr = $postManager->deletePosts($postid);
    if ($suppr === false) {
        throw new Exception('Aucun commentaire supprimé');
    } else {
        require('view/backendView.php');
    }
}

/* Affichage d'un article */

function post() {
    $postManager = new PostsManager();
    $post = $postManager->getPost($_GET['id']);
    require('view/postView2.php');
}

/* déconnexion de la session */

function deconnexion() {

    $userManager = new UsersManager();
    $user = $userManager->deconnexion();
}

/* Compte des articles */

function countPosts() {

    $postManager = new PostsManager(); // Création d'un objet
    $count = $postManager->countPosts(); // Appel d'une fonction de cet objet
    return $count;
}

/* Compte des commentaires */

function countComments() {

    $commentManager = new CommentsManager(); // Création d'un objet
    $count = $commentManager->countComments(); // Appel d'une fonction de cet objet
    return $count;
}

/* Compte des commentaires signalés */

function countSigComments() {

    $commentManager = new CommentsManager(); // Création d'un objet
    $count = $commentManager->countSigComments(); // Appel d'une fonction de cet objet
    return $count;
}
