<?php

require_once('model/Connection.php');

	class PostsManager extends Connection
	{

			function getPosts()
			{

		   $db = $this->dbConnect();

			// On récupère les 5 derniers billets
			$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y &agrave %H:%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
			return $req;
		   }

		   function getPost($postId)
			{
			$db = $this->dbConnect();
			$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y &agrave %H:%i\') AS creation_date_fr FROM posts WHERE id = ?');
			$req->execute(array($postId));
			$post = $req->fetch();

			return $post;
			}
	}