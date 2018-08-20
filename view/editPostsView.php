 <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
		<?php
	while ($data = $posts->fetch())
        {?>
          <div class="post-preview">
            <a href="admin.php?action=editPosts&id=<?= $data['id'] ?>">
              <h2 class="post-title">
                <?php echo htmlspecialchars($data['title']); ?>
              </h2>
            </a>
              <a href="admin.php?action=changePostsView&AMP;id=<?= $data['id'] ?>">Modifier</a>
          </div>
          <hr>
		  <?php
        } // Fin de la boucle des billets
        $posts->closeCursor();
        ?>
        </div>
      </div>
    </div>

    <hr>
