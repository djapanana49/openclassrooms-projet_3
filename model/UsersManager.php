<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('model/Connection.php');

class UsersManager extends Connection {

    public function createUser($userId, $pwd) {

        $db = $this->dbConnect();
        $users = $db->prepare('INSERT INTO users(identifiant,mdp) VALUES(?, ?)');
        $affectedLines = $users->execute(array($userId, $pwd));
        return $affectedLines;
    }

    public function getUser($userId, $pwd) {

        $db = $this->dbConnect();
        $users = $db->prepare('SELECT identifiant, mdp FROM users WHERE identifiant = ? AND mdp = ? ');
        $users->execute(array($userId, $pwd));
        $userRow = $users->fetch(PDO::FETCH_ASSOC);
        if ($users->rowCount() > 0) {
  
            $_SESSION['user_session'] = $userRow['identifiant'];
            return true;
        } else {
            return false;
        }
    }
    
    public function deconnexion() {
        
        $_SESSION = array();
        session_destroy();
        header('index.php?action=listpost');
    }
        

}