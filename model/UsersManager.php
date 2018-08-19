<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('model/Connection.php');

class UsersManager{
    
    public function createUser($userId, $pwd) {
        
        $db = $this->dbConnect();
        $users = $db->prepare('INSERT INTO users(identifiant,mdp) VALUES(?, ?)');
        $affectedLines = $users->execute(array($userId, $pwd));
        return $affectedLines;
        
    }
    
    public function getUser($userId, $pwd){
        
        $db = $this->dbConnect();
        $users = $db->prepare('SELECT identifiant, mdp FROM users WHERE conn_id = ? & mdp = ? ');
        $users->execute(array($userId, $pwd));
        /* @var $users type */
        return $users;
        
    }
}