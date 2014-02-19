<?php 

if(is_connected()) {
	message_redirect('You are already logged in!', '/');
}

$connection = new Connection($bdd);

// If the user sent the form
if(P()){
	$connection->connect();
}

Page::$title = "InfoPlus - Connection";
Page::$templates = array('index.php');
