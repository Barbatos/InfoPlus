<?php 

if (!G('id')) {
	redirect(null, '/', null);
}

$article = getInfosArticle(G('id'));

Page::$title = "InfoPlus - Article";
Page::$templates = array('index.php');
