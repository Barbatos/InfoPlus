<?php 

if($_SESSION['level'] >= 2) {
	message_redirect('Vous êtes déjà Premium !', '/');
}

if(G('id') && G('act') == 'souscrire') {
	souscrireAbonnement(G('id'));
}

Page::$title = "InfoPlus - Abonnement Premium";
Page::$templates = array('index.php');
