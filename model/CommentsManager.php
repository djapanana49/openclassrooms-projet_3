 <?php

require_once('model/Connection.php');

		class CommentsManager extends Connection
		{
			
		

			public function getComments($postId)
			{
				$db = $this->dbConnect();
				$comments = $db->prepare('SELECT comment_id, author, comment, validate,DATE_FORMAT(comment_date, \'%d/%m/%Y &agrave %H:%i\') AS comment_date_fr FROM comments WHERE posts_id = ? ORDER BY comment_date DESC');
				$comments->execute(array($postId));
				return $comments;
			}
			


			public function postComment($postId, $author, $comment)
			{
				$db = $this->dbConnect();
				$comments = $db->prepare('INSERT INTO comments(posts_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
				$affectedLines = $comments->execute(array($postId, $author, $comment));
				return $affectedLines;
			}
			
			public function signalComment($postId, $author, $comment)
			{
				
				$db = $this->dbConnect();
				$comments = $db->prepare('INSERT INTO comments(posts_id, author, comment,signaled, comment_date) VALUES(?, ?, ?,?, NOW())');
				$affectedLines = $comments->execute(array($postId, $author, $comment,1));
				return $affectedLines;
			}
				
			
		}