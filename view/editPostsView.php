 <!-- Page gestion des articles -->
 
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
              <a href="admin.php?action=post&AMP;id=<?= $data['id'] ?>"><button class="btn btn-dark" type="submit">Afficher</button></a>
              <a href="admin.php?action=changePostsView&AMP;id=<?= $data['id'] ?>"><button class="btn btn-primary" type="submit">Modifier</button></a>
              <a href="admin.php?action=deletePosts&AMP;id=<?= $data['id'] ?>"><button class="btn btn-danger" type="submit">Supprimer</button></a>
          </div>
          <hr>
		  <?php
        } // Fin de la boucle des billets
        $posts->closeCursor();
        ?>
          <div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation d'annulation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">confirmer</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
      </div>
    </div>
  </div>
</div>
        </div>
      </div>
    </div>

    <hr>
