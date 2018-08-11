 <?php

require_once('model/Connection.php');

		class CommentsManager extends Connection
		{
			
		

			public function getComments($postId)
			{
				$db = $this->dbConnect();
				$comments = $db->prepare('SELECT comment_id, author, comment,DATE_FORMAT(comment_date, \'%d/%m/%Y &agrave %H:%i\') AS comment_date_fr FROM comments WHERE posts_id = ? ORDER BY comment_date DESC');
				$comments->execute(array($postId));
				return $comments;
			}
			// Nouvelle fonction qui nous permet d'éviter de répéter du code


			public function postComment($postId, $author, $comment)
			{
				$db = $this->dbConnect();
				$comments = $db->prepare('INSERT INTO comments(posts_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
				$affectedLines = $comments->execute(array($postId, $author, $comment));
				return $affectedLines;
			}
			
			public function alertComment(){
				$commentId=$_GET['comment_id'];
				$db=$this->dbConnect();
				$alert=$db->prepare('UPDATE comments set signaled=1 where comment_id=?');
				$affectedLines = $alert->execute(array($commentId));
				return $affectedLines;
				
			}
				
		}