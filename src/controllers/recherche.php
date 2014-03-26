<?php 

if(!G('search')) {
	message_redirect('Vous devez spécifier quelque chose à chercher !', '/');
}

$resultats = getResultatsPour(G('search'));

Page::$title = "InfoPlus - Recherche";
Page::$templates = array('index.php');
