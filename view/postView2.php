
    <p>
	<article>
		<div class="container">
        <div class="col-lg-8 col-md-10 mx-auto">
		<h1 class="post-title">
            <br>
                <?= htmlspecialchars($post['title']); ?>
              </h1>
			<div class="row">
				
					<?= htmlspecialchars_decode($post['content']); ?>
            </p>
				
			</div>
		</div>
                    <center><a href="admin.php?action=changePostsView&AMP;id=<?= $post['id'] ?>"><button class="btn btn-primary" type="submit">Modifier</button></a>
              <a href="admin.php?action=deletePosts&AMP;id=<?= $post['id'] ?>"><button class="btn btn-danger" type="submit">Supprimer</button></a>
              <a href="admin.php?action=editPosts"><button class="btn btn-info" type="submit"><i class="fas fa-arrow-alt-circle-left"> Retour</i></button></a></center>
    </div>
    </article>

    <hr>
   
<br>

        