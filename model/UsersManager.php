<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsersManager {
    /* public function createUser($userId, $pwd) {

      $db = Connection::getInstance();
     $hash = password_hash($pwd,PASSWORD_BCRYPT);
      $users = $db->prepare('INSERT INTO users(identifiant,mdp) VALUES(?, ?)');
      $affectedLines = $users->execute(array($userId, $hash));
      return $affectedLines;
      } */

// vérificaion de l'identifiant et du mot de passe pour la connexion à l'espace administration
    public function getUser($userId, $pwd) {

        $db = Connection::getInstance();
        $users = $db->prepare('SELECT identifiant, mdp FROM users WHERE identifiant = ? ');
        $users->execute(array($userId));
        $resultat = $users->fetch(PDO::FETCH_ASSOC);

        // Comparaison du mdp envoyé via le formulaire avec la base

        $isPasswordCorrect = password_verify($pwd, $resultat['mdp']);
        
        if (!$resultat) {

           return false;
        } else {
            if ($isPasswordCorrect) {
                
                $_SESSION['user_session'] = $resultat['identifiant'];
               
                return true;
            } else {
               
                return false;
            }
        }
    }

    // deconnexion de la zone administration 
    public function deconnexion() {

        $_SESSION = array();
        session_destroy();
        header('Location:index.php?action=listpost');
    }

}
