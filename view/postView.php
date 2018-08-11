
    <p>
	<article>
		<div class="container">
        <div class="col-lg-8 col-md-10 mx-auto">
		<h1 class="post-title">
            <br>
                <?= htmlspecialchars($post['title']); ?>
              </h1>
			<div class="row">
				
					<?= nl2br(htmlspecialchars($post['content'])); ?>
            </p>
				
			</div>
		</div>
    </div>
    </article>

    <hr>
    <div class="col-lg-8 col-md-10 mx-auto">
	<h2>Ajouter un Commentaire</h2>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" size=50>
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment" rows=10 cols=50></textarea>
    </div>
    <div>
        <input type="checkbox" name="signaler" value="signaler"/> Signaler le commentaire
    </div>
    <div><br>
        <input class="btn btn-primary" type="submit" />
        
    </div>
</form>
</div>
<br><p>
<div class="col-lg-8 col-md-10 mx-auto">
        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch())
        {
            if($comment['validate']==1){
                
                ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                
           <?php 
            
            }
    }?>
        
</div></p>

        