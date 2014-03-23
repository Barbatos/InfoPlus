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
                  <h2>Recent News</h2>
                </header>
                <ul>
                  <li><a href="#">Nothing happened</a></li>
                  <li><a href="#">My Dearest Cthulhu</a></li>
                  <li><a href="#">The Meme Meme</a></li>
                  <li><a href="#">Now Full Cyborg</a></li>
                  <li><a href="#">Temporal Flux</a></li>
                </ul>
              </section>
          
            <!-- Calendar -->
              <section class="is-calendar">
                <div class="inner">
                  <table>
                    <caption>February 2013</caption>
                    <thead>
                      <tr>
                        <th scope="col" title="Monday">M</th>
                        <th scope="col" title="Tuesday">T</th>
                        <th scope="col" title="Wednesday">W</th>
                        <th scope="col" title="Thursday">T</th>
                        <th scope="col" title="Friday">F</th>
                        <th scope="col" title="Saturday">S</th>
                        <th scope="col" title="Sunday">S</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td colspan="4" class="pad"><span>&nbsp;</span></td>
                        <td><span>1</span></td>
                        <td><span>2</span></td>
                        <td><span>3</span></td>
                      </tr>
                      <tr>
                        <td><span>4</span></td>
                        <td><span>5</span></td>
                        <td><a href="#">6</a></td>
                        <td><span>7</span></td>
                        <td><span>8</span></td>
                        <td><span>9</span></td>
                        <td><a href="#">10</a></td>
                      </tr>
                      <tr>
                        <td><span>11</span></td>
                        <td><span>12</span></td>
                        <td><span>13</span></td>
                        <td class="today"><a href="#">14</a></td>
                        <td><span>15</span></td>
                        <td><span>16</span></td>
                        <td><span>17</span></td>
                      </tr>
                      <tr>
                        <td><span>18</span></td>
                        <td><span>19</span></td>
                        <td><span>20</span></td>
                        <td><span>21</span></td>
                        <td><span>22</span></td>
                        <td><a href="#">23</a></td>
                        <td><span>24</span></td>
                      </tr>
                      <tr>
                        <td><a href="#">25</a></td>
                        <td><span>26</span></td>
                        <td><span>27</span></td>
                        <td><span>28</span></td>
                        <td class="pad" colspan="3"><span>&nbsp;</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
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
