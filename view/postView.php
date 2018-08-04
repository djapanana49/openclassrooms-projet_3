<?php include("header.php");?>
            <p>
	<article>
		<div class="container">
		<h1 class="post-title">
                <?php echo htmlspecialchars($post['title']); ?>
              </h1>
			<div class="row">
				<div class="col-lg-8 col-md-10 mx-auto">
					<?= nl2br(htmlspecialchars($post['content'])) ?>
            </p>
				</div>
			</div>
		</div>
    </article>

    <hr>
	<h2>Ajouter un Commentaire</h2>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>


        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <?php
        }
        include("footer.php");
