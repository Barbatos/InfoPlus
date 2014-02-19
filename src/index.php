<?php

ini_set("session.use_trans_sid","0");
ini_set("url_rewriter.tags","");

session_start();
 
define('BASEPATH', dirname(__FILE__));
define('INC_PATH', BASEPATH.'/includes');
define('VIEWS_PATH', BASEPATH.'/views');
define('MODELS_PATH', BASEPATH.'/models');
define('CONTROLLERS_PATH', BASEPATH.'/controllers');

require_once(INC_PATH.'/init.php');

if(is_file($file = CONTROLLERS_PATH.'/'.Routing::GetModule().'.php')) {
	if(is_file($file2 = MODELS_PATH.'/'.Routing::GetModule().'.php')) {
		require_once($file2); 
	}
	require_once($file);
}

else {
	header("HTTP/1.1 404 Not Found");
	exit('Page not found.');
	// TODO: 404 html page
}

require_once(VIEWS_PATH.'/header.php');

foreach(Page::$templates as $_template)
{
	require_once(VIEWS_PATH.'/'.Routing::GetModule().'/'.$_template);
}

require_once(VIEWS_PATH.'/footer.php');

?>