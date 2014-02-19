<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title><?= Page::$title ?></title>

		<link href="http://bootstrapdocs.com/v2.3.2/docs/assets/css/bootstrap.css" rel="stylesheet">
    	<link href="http://bootstrapdocs.com/v2.3.2/docs/assets/css/bootstrap-responsive.css" rel="stylesheet">

		<!--[if lt IE 9]>
	    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->
	</head>
	<body>

	<?php 
    if(isset($_SESSION['errors']) && !empty($_SESSION['errors'])){
      foreach($_SESSION['errors'] as $e){
        echo '<br /><br /><br /><div class="alert alert-error">'.$e['error'].'</div>';
      }
      $_SESSION['errors'] = array();
    }

    if(isset($_SESSION['messages']) && !empty($_SESSION['messages'])){
      foreach($_SESSION['messages'] as $e){
        echo '<br /><br /><br /><div class="alert alert-success">'.$e['message'].'</div>';
      }
      $_SESSION['messages'] = array();
    }
    ?>
    