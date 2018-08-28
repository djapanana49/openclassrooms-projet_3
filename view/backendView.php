<?php
if (isset($_SESSION['user_session'])) {
    ?>
    <h2>Bonjour <?= $_SESSION['user_session'] ?>  , bienvenue sur votre page d'administration</h2>
    <br/>
    <br/>
   
          <div class="modal-footer">
            <a class="btn btn-primary" href="admin.php?action=deconnexion" data-toggle="modal" data-target="#logoutModal">Déconnexion</a>
          </div>
    <?php
}


    