<?php
define("PROJET3",dirname(__FILE__));//dossier du projet-C:\Users\SYLVIE\Documents\Openclassroom\Projet_3
define("ROOT",dirname(PROJET3));//racine du projet-C:\Users\SYLVIE\Documents\Openclassroom
define("DS",DIRECTORY_SEPARATOR);//separateur
define("PUB",ROOT.DS."public");//url dossier public
define("BASE_URL",dirname($_SERVER["SCRIPT_NAME"]));
require('controller/front.php');
	ob_start(); 
	try{
		if (isset($_GET['action'])) {
			if ($_GET['action'] == 'listPosts') {
				listPosts();
			}
			elseif ($_GET['action'] == 'post') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					post();
				}
				else {
					throw new Exception('Erreur : aucun identifiant de billet envoyé');
				}
			}
		elseif ($_GET['action'] == 'addComment') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					if (!empty($_POST['author']) && !empty($_POST['comment'])) {
						addComment($_GET['id'], $_POST['author'], $_POST['comment']);
					}
					else {
						throw new Exception('Erreur : tous les champs ne sont pas remplis !');
					}
				}
				else {
					throw new Exception('Erreur : aucun identifiant de billet envoyé');
				}
			}
		
	
		elseif($_GET['action']=='alertComment'){
				if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
					echo'modification en cours';
				alertComment();
		
				}
			else throw new Exception('ça ne marche pas');
			}
		}
		
		else {
			listPosts();
		}
		$content = ob_get_clean(); 
		require('view/template.php'); 
	}
	
	catch(Exception $e) { // S'il y a eu une erreur, alors...

    echo 'Erreur : ' . $e->getMessage();

}




	