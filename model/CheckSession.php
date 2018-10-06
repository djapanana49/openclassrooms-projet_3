<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CheckSession{
    
    public static function userIsConnected(){
        
        if(empty($_SESSION['user_session']) ){
            
           $erreur='Tous les champs ne sont pas remplis !'; 
           header('Location:index.php?action=connectView');
           
            exit;
        }
    }
}