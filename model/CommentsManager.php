<?php

class CommentsManager {

    //selection des commentaires pour un article donné

    public function getComments($postId) {
        $db = Connection::getInstance();
        $comments = $db->prepare('SELECT comment_id, author, comment,signaled,DATE_FORMAT(comment_date, \'%d/%m/%Y &agrave %H:%i\') AS comment_date_fr FROM comments WHERE posts_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        return $comments;
    }

    //Insertion d'un nouveau commentaire

    public function postComment($postId, $author, $comment) {
        $db = Connection::getInstance();
        $comments = $db->prepare('INSERT INTO comments(posts_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        return $affectedLines;
    }

    // signalement d'un commentaire

    public function alertComment() {
        $commentId = $_GET['comment_id'];
        $db = Connection::getInstance();
        $alert = $db->prepare('UPDATE comments set signaled=1 where comment_id=?');
        $affectedLines = $alert->execute(array($commentId));
        return $affectedLines;
    }

    // afficher les commentaires signalés

    public function showSignalComment() {

        $db = Connection::getInstance();
        $signals = $db->query('SELECT * FROM comments WHERE signaled = 1');
        return $signals;
    }

    // supprimer un commentaire signalé

    public function deleteComment($commentId) {


        $db = Connection::getInstance();
        $suppr = $db->prepare('DELETE FROM comments WHERE comment_id=?');
        $affectedLines = $suppr->execute(array($commentId));
        return $affectedLines;
    }

    // valider un commentaire signalé

    public function validateComment($commentId) {


        $db = Connection::getInstance();
        $valid = $db->prepare('UPDATE comments set signaled=0 where comment_id=?');
        $affectedLines = $valid->execute(array($commentId));
        return $affectedLines;
    }

    /* Compte des commentaires */

    function countComments() {

        $db = Connection::getInstance();
        $count = $db->query('SELECT COUNT(*) FROM comments');
        $count2 = $count->fetchColumn();
        return $count2;
    }

    /* Compte des commentaires signalés */

    function countSigComments() {

        $db = Connection::getInstance();
        $count = $db->query('SELECT COUNT(*) FROM comments WHERE signaled=1');
        $count2 = $count->fetchColumn();
        return $count2;
    }

}
