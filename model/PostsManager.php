<?php

class PostsManager {

    function getPosts() {

        $db = Connection::getInstance();

        // On récupère les 5 derniers billets
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y &agrave %H:%i\') AS creation_date_fr FROM posts ORDER BY creation_date ASC LIMIT 0, 10');
        return $req;
    }

    function getPost($postId) {
        $db = Connection::getInstance();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y &agrave %H:%i\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    function addPosts($title, $postauthor, $content) {
        $db = Connection::getInstance();
        $req = $db->prepare('INSERT INTO posts (title,post_author,content,creation_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $req->execute(array($title, $postauthor, $content));
        return $affectedLines;
    }

    function deletePosts($postId) {

        $db = Connection::getInstance();
        $suppr = $db->prepare('DELETE FROM posts WHERE id=?');
        $affectedLines = $suppr->execute(array($postId));
        return $affectedLines;
    }

    function editPosts($postId) {

        $db = Connection::getInstance();
        $edit = $db->prepare('SELECT * FROM posts WHERE id=?');
        $affectedLines = $edit->execute(array($postId));
        return $affectedLines;
    }

    function changePosts($postId, $title, $content) {

        $db = Connection::getInstance();
        $edit = $db->prepare('UPDATE posts set title=?, content= ? WHERE id=?');
        $affectedLines = $edit->execute(array($title,$content,$postId));
        return $affectedLines;
    }
    
    function countPosts(){
        
        $db = Connection::getInstance();
        $count=$db->query('SELECT COUNT(*) FROM posts');
        $count2=$count->fetch();
        return $count2;
        
    }
}
