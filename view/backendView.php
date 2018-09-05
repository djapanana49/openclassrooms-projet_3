<?php
/* Affichage de la page d'accueil de la zone d'administration */
if (isset($_SESSION['user_session'])) {
    ?>
    <center><h2>Bonjour <?= $_SESSION['user_session'] ?>, <br/>Bienvenue sur votre page d'administration</h2></center>
    <br/>
    <br/>
    <p><h3>Les 3 derniers articles</h3></p>
    <div class="card-deck">

        <?php
        while ($data = $posts->fetch()) {
            ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($data['title']); ?></h5>
                    <p class="card-text"><?= substr($data['content'], 0, 150) ?></p>
                </div>
            </div>
            <?php
        } // Fin de la boucle des billets
        ?>

    </div>
    <div class="modal-footer">
        <a class="btn btn-primary" href="admin.php?action=deconnexion" data-toggle="modal" data-target="#logoutModal">Déconnexion</a>
    </div>
    <?php
}