<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title><?= Page::$title ?></title>

		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700|Open+Sans+Condensed:300,700" rel="stylesheet" />
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/skel.min.js"></script>
    <script src="/assets/js/skel-panels.min.js"></script>
    <script src="/assets/js/init.js"></script>
      <link rel="stylesheet" href="/assets/css/skel-noscript.css" />
      <link rel="stylesheet" href="/assets/css/style.css" />
      <link rel="stylesheet" href="/assets/css/style-desktop.css" />
      <link rel="stylesheet" href="/assets/css/style-wide.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="/assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]>
      <script src="/assets/js/html5shiv.js"></script>
      <link rel="stylesheet" href="/assets/css/ie8.css" />
    <![endif]-->
    <!--[if lte IE 7]><link rel="stylesheet" href="/assets/css/ie7.css" /><![endif]-->
	</head>

  <body class="left-sidebar">

    <!-- Wrapper -->
      <div id="wrapper">

        

        <!-- Sidebar -->
          <div id="sidebar">
          
            <!-- Logo -->
              <div id="logo">
                <h1>InfoPlus</h1>
              </div>
              
              <center>
              <?php 
              if(is_connected()) {
              ?>
              Hey! :) <br />
              <a href="<?= WEBSITE_URL ?>logout/">Déconnexion</a>

              <?php 
              }

              else {
              ?>

              <a href="<?= WEBSITE_URL ?>connection/">Connexion</a> <br />
              <a href="<?= WEBSITE_URL ?>register/">Inscription</a> <br />

              <?php 
              }
              ?>
              </center>

            <!-- Search -->
              <section class="is-search">
                <form method="post" action="#">
                  <input type="text" class="text" name="search" placeholder="Search" />
                </form>
              </section>

            <!-- Nav -->
            <?php 
            $stmt = $bdd->prepare('SELECT libelle from theme ORDER BY ordre ASC');
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
            ?>
              <nav id="nav">
                <ul>
                  <!-- class="current_page_item" -->
                  <?php 
                  foreach($data as $d) {
                  ?>
                  <li><a href="/<?= rewrite($d->libelle) ?>"><?= $d->libelle ?></a></li>
                  <?php 
                  }
                  ?>
                </ul>
              </nav>
          
            <!-- Recent Posts -->
              <section class="is-recent-posts">
                <header>
                  <h2>Dernières actualités</h2>
                </header>
                <ul>
                  <?php 
                  $stmt = $bdd->prepare('SELECT * FROM article ORDER BY dateAjout DESC LIMIT 8');
                  $stmt->execute();
                  $data = $stmt->fetchAll(PDO::FETCH_OBJ);
                  $stmt->closeCursor();

                  foreach($data as $d) {
                  ?>
                  <li><a href="/article/<?= rewrite($d->titre) ?>"><?= $d->titre ?></a></li>
                  <?php 
                  }
                  ?>
                </ul>
              </section>
          
            <!-- Copyright -->
              <div id="copyright">
                <p>
                  &copy; 2013 InfoPlus<br />
                  Images: <a href="http://n33.co">n33</a>, <a href="http://fotogrph.com">fotogrph</a><br />
                  Design: <a href="http://html5up.net/">HTML5 UP</a>
                </p>
              </div>

          </div>

      </div>

      <!-- Content -->
          <div id="content">
            <div id="content-inner">
              
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
