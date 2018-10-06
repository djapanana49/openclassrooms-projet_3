<?php

/* Affichage des commentaires signalés */

function showSignalComments() {
    CheckSession::userIsConnected(); //vérification de la session
    $commentManager = new CommentsManager();
    $signals = $commentManager->showSignalComment();
    if ($signals == false) {
        throw new Exception('Aucun commentaire signalé');
    }

    require('view/back_commentView.php');
}

/* Suppression des commentaires signalés */

function deleteComment($commentid) {
    CheckSession::userIsConnected();
    $commentManager = new CommentsManager();
    $suppr = $commentManager->deleteComment($commentid);
    if ($suppr === false) {
        throw new Exception('Aucun commentaire supprimé');
    }
}

/* Validation des commentaires signalés */

function validateComment($commentId) {
    CheckSession::userIsConnected();
    $commentManager = new CommentsManager();
    $valid = $commentManager->validateComment($commentId);
    if ($valid === false) {
        throw new Exception('Impossible de valider le commentaire !');
    }
}

/**
 * Ajouter un article
 * @param string $title
 * @param string $postauthor
 * @param string $content
 * @throws Exception
 */
function addPosts($title, $postauthor, $content) {
    CheckSession::userIsConnected();
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
    CheckSession::userIsConnected();
    require('view/addPostsView.php');
}

/* Accès à la page d'accueil de l'administration */

function backendView() {
    CheckSession::userIsConnected();
    $postManager = new PostsManager(); // Création d'un objet
    $posts = $postManager->getPosts(3); // Appel d'une fonction de cet objet
    require('view/backendView.php');
}

/**
 * Modification des articles 
 * @param int $postId
 * @param string $title
 * @param string $content
 * @throws Exception
 */
function changePosts($postId, $title, $content) {
    CheckSession::userIsConnected();
    $postManager = new PostsManager();
    $affectedLines = $postManager->changePosts($postId, $title, $content);
    header('Location:admin.php?action=backendView');

    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier l\'article !');
    }
}

/* Affichage des articles */

function editPosts() {
    CheckSession::userIsConnected();
    $postManager = new PostsManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/editPostsView.php');
}

/**
 * Accès à la page de modification des articles
 * @param int $postsId
 */
function changePostsView($postsId) {
    CheckSession::userIsConnected();
    $postManager = new PostsManager(); // Création d'un objet
    $posts = $postManager->getPost($postsId);
    require('view/back_postView.php');
}

/**
 * Vérification des identifiants de connexion
 * @param int $userId
 * @param string $pwd
 */
function doConnexion($userId, $pwd) {

    $userManager = new UsersManager();
    $userIsConnected = $userManager->getUser($userId, $pwd);
    if ($userIsConnected == false) {

        header('Location:index.php?action=connectView&errorMessage=identifiant ou mot de passe erroné');
        exit;
    } else {

        header('Location:admin.php?action=backendView');
        exit;
    }
}

/**
 * Suppression d'un article 
 * @param int $postId
 */
function deletePosts($postid) {
    CheckSession::userIsConnected();
    $postManager = new PostsManager();
    $suppr = $postManager->deletePosts($postid);
    if ($suppr === false) {
        throw new Exception('Aucun commentaire supprimé');
    } else {
        header('Location:admin.php?action=backendView');
        exit;
    }
}

/* Affichage d'un article */

function post() {
    CheckSession::userIsConnected();
    $postManager = new PostsManager();
    $post = $postManager->getPost($_GET['id']);
    require('view/postView2.php');
}

/* déconnexion de la session */

function deconnexion() {

    $userManager = new UsersManager();
    $userManager->deconnexion();
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

function listPosts() {
    CheckSession::userIsConnected();
    $postManager = new PostsManager(); // Création d'un objet
    $postManager->getPosts(); // Appel d'une fonction de cet objet
}
