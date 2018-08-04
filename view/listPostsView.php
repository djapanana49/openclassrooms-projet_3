<?php
require("header.php");?>
    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
		<?php
	while ($data = $posts->fetch())
        {?>
          <div class="post-preview">
            <a href="controller/post.php?id=<?= $data['id'] ?>">
              <h2 class="post-title">
                <?php echo htmlspecialchars($data['title']); ?>
              </h2>
            </a>
            <p class="post-meta">Publié le
              <?php echo $data['creation_date_fr']; ?></p>
          </div>
          <hr>
		  <?php
        } // Fin de la boucle des billets
        $posts->closeCursor();
        ?>
          
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      </div>
    </div>

    <hr>
<?include("footer.php");
   
