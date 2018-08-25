<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="col-lg-8 col-md-10 mx-auto">
    <h2>Se Connecter</h2>

    <form action="admin.php?action=getUser" method="post">
        <div>
            <label for="identifiant">Identifiant</label><br />
            <input type="text" id="id" name="id" size=50>
        </div>
        <div>
            <label for="mdp">Mot de passe</label><br />
            <input type="password" id="pwd" name="pwd" size=50>
        </div>
        <div><br>
            <input class="btn btn-primary" type="submit" value="valider"/>

        </div>
       
    </form>
    
</div>