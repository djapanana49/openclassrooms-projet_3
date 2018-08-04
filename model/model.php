 <?php
		function getPosts()
		{

	   $db = dbConnect();

        // On récupère les 5 derniers billets
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y &agrave %H:%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
		return $req;
       }
	   
	   function getPost($postId)
		{
		$db = dbConnect();
		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y &agrave %H:%i\') AS creation_date_fr FROM posts WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
		}

		function getComments($postId)
		{
			$db = dbConnect();
			$comments = $db->prepare('SELECT comment_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y &agrave %H:%i\') AS comment_date_fr FROM comments WHERE posts_id = ? ORDER BY comment_date DESC');
			$comments->execute(array($postId));
			return $comments;
		}
		// Nouvelle fonction qui nous permet d'éviter de répéter du code
		function dbConnect()
		{
			try
			{
				$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
				return $db;
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
		}
		
		function postComment($postId, $author, $comment)
		{
			$db = dbConnect();
			$comments = $db->prepare('INSERT INTO comments(posts_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
			$affectedLines = $comments->execute(array($postId, $author, $comment));
			return $affectedLines;
}