<?php 

if($_SESSION['level'] >= 2) {
	message_redirect('Vous êtes déjà Premium !', '/');
}

Page::$title = "InfoPlus - Abonnement Premium";
Page::$templates = array('index.php');
