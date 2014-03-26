<?php 

if (!G('id')) {
	message_redirect('Il manque un id à l\'article !', '/');
}

$article = getInfosArticle(G('id'));

Page::$title = "InfoPlus - Article";
Page::$templates = array('index.php');
