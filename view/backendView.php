<?php
if (isset($_SESSION['user_session'])) {
    ?>
    <h2>Bonjour <?= $_SESSION['user_session'] ?>  , bienvenue sur votre page d'administration</h2>
    <br/>
    <br/>
    <a href="#" class="btn btn-dark" role="button">se déconnecter</a>
    <?php
}


    