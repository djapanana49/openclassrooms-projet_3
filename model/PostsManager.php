<?php

class PostsManager {

    // On récupère les 10 derniers billets
    
    function getPosts() {
        $db = Connection::getInstance();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y &agrave %H:%i\') AS creation_date_fr FROM posts ORDER BY creation_date ASC LIMIT 0, 10');
        return $req;
    }
    
     // On récupère les 3 derniers billets
    
    function getPosts_3() {
        $db = Connection::getInstance();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y &agrave %H:%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 3');
        return $req;
    }

    // On récupère un article particulier grâce à son id
    
    function getPost($postId) {
        $db = Connection::getInstance();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y &agrave %H:%i\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    // Création d'un article
    
    function addPosts($title, $postauthor, $content) {
        $db = Connection::getInstance();
        $req = $db->prepare('INSERT INTO posts (title,post_author,content,creation_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $req->execute(array($title, $postauthor, $content));
        return $affectedLines;
    }
    
    // Suppression d'un article
    
    function deletePosts($postId) {

        $db = Connection::getInstance();
        $suppr = $db->prepare('DELETE FROM posts WHERE id=?');
        $affectedLines = $suppr->execute(array($postId));
        return $affectedLines;
    }

    // Afficher un article dans l'espace administration
    
    function editPosts($postId) {

        $db = Connection::getInstance();
        $edit = $db->prepare('SELECT * FROM posts WHERE id=?');
        $affectedLines = $edit->execute(array($postId));
        return $affectedLines;
    }

    // Modification d'un article 
    
    function changePosts($postId, $title, $content) {

        $db = Connection::getInstance();
        $edit = $db->prepare('UPDATE posts set title=?, content= ? WHERE id=?');
        $affectedLines = $edit->execute(array($title,$content,$postId));
        return $affectedLines;
    }
    
    // compte du nombre des articles
    
    function countPosts(){
        
        $db = Connection::getInstance();
        $count=$db->query('SELECT COUNT(*) FROM posts');
        $count2=$count->fetchColumn();
        return $count2;
        
    }
}
