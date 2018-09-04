<!-- Liste des articles -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php
            while ($data = $posts->fetch()) {
                ?>
                <div class="post-preview">
                    <a href="index.php?action=post&id=<?= $data['id'] ?>">
                        <h2 class="post-title">
                            <?php echo htmlspecialchars($data['title']); ?>
                        </h2>
                    </a>
                    <p class="post-meta">Publié le
                        <?php echo $data['creation_date_fr']; ?></p>
                    <?php
                    $html = '<p>' . substr($data['content'], 0, 200) . '... </p>';
                    $html.='<p><a href="index.php?action=post&id=' . $data['id'] . '">lire la suite</a></p>';
                    echo $html;
                    ?>
                </div>
                <hr>
                <?php
            } // Fin de la boucle des billets
            $posts->closeCursor();
            ?>

            <!-- Pager -->
            <div class="clearfix">
                <!-- <a class="btn btn-primary float-right" href="#">Anciens articles &rarr;</a>-->
            </div>
        </div>
    </div>
</div>

<hr>


