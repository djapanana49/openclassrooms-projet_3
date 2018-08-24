<?php
session_start();
extract($_POST);
if(isset ($_POST['id'])){
$id = $_POST['id'];
}
?>

<h2>Bonjour <?= $id ?>  , bienvenue sur votre page d'administration</h2>
<br/>
<br/>
<a href="#" class="btn btn-dark" role="button">se déconnecter</a>