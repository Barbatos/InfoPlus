<?php

// Define the page charset and the timezone
header('Content-Type: text/html; charset=UTF-8');
mb_internal_encoding('UTF-8');
date_default_timezone_set('Europe/Paris');
ini_set('arg_separator.output', '&amp;');

// Turn off magic quotes for security purpose
ini_set('magic_quotes_runtime', 0);

require_once(INC_PATH.'/functions.php');
require_once(INC_PATH.'/page.class.php');
require_once(INC_PATH.'/routing.class.php');

// Database connection
$db['user'] 	= "infoplus";
$db['password'] = "infoplus";
$db['dbname'] 	= "infoplus";
$db['host'] 	= "barbatos.fr";
$db['db'] 		= "mysql:host=".$db['host'].";dbname=".$db['dbname'].";charset=UTF8";

$bdd = new PDO($db['db'], $db['user'], $db['password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
if(!$bdd){
	exit('Erreur de connexion à la base de données.');
}

unset($db);

Routing::dispatch();

// No messages to display
if(!isset($_SESSION['errors'])){
	$_SESSION['errors'] = array();
	$_SESSION['messages'] = array();
}
