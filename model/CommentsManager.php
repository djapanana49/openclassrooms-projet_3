 <?php

require_once('model/Connection.php');

		class CommentsManager extends Connection
		{
			
		

			public function getComments($postId)
			{
				$db = $this->dbConnect();
				$comments = $db->prepare('SELECT comment_id, author, comment,signaled,DATE_FORMAT(comment_date, \'%d/%m/%Y &agrave %H:%i\') AS comment_date_fr FROM comments WHERE posts_id = ? ORDER BY comment_date DESC');
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
          
          
          public function showSignalComments(){
            
                $db = $this->dbConnect();
                $signals = $db->query('SELECT * FROM comments WHERE signaled = 1');
                return $signals;
  
          }
          
           public function deleteComment(){
            
                $commentId=$_GET['comment_id'];
				$db=$this->dbConnect();
				$suppr=$db->prepare('DELETE FROM comments WHERE comment_id=?');
				$affectedLines = $suppr->execute(array($commentId));
				return $affectedLines;
  
          }
          
           public function validateComment(){
            
                $commentId=$_GET['comment_id'];
                $db = $this->dbConnect();
                $valid=$db->prepare('UPDATE comments set signaled=0 where comment_id=?');
		        $affectedLines = $valid->execute(array($commentId));
		        return $affectedLines;
  
          }
				
		}