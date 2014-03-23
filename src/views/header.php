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
                  &copy; 2013 An Untitled Site.<br />
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

              <!-- Post -->
                <article class="is-post is-post-excerpt">
                  <header>
                    <!--
                      Note: Titles and bylines will wrap automatically when necessary, so don't worry
                      if they get too long. You can also remove the "byline" span entirely if you don't
                      need a byline.
                    -->
                    <h2><a href="#">Welcome to Striped</a></h2>
                    <span class="byline">A free, fully responsive HTML5 site template by HTML5 UP</span>
                  </header>
                  <div class="info">
                    <!--
                      Note: The date should be formatted exactly as it's shown below. In particular, the
                      "least significant" characters of the month should be encapsulated in a <span>
                      element to denote what gets dropped in 1200px mode (eg. the "uary" in "January").
                      Oh, and if you don't need a date for a particular page or post you can simply delete
                      the entire "date" element.
                      
                    -->
                    <span class="date"><span class="month">Jan<span>uary</span></span> <span class="day">14</span><span class="year">, 2013</span></span>
                    <!--
                      Note: You can change the number of list items in "stats" to whatever you want.
                    -->
                    <ul class="stats">
                      <li><a href="#" class="fa fa-comment">16</a></li>
                      <li><a href="#" class="fa fa-heart">32</a></li>
                      <li><a href="#" class="fa fa-twitter">64</a></li>
                      <li><a href="#" class="fa fa-facebook">128</a></li>
                    </ul>
                  </div>
                  <a href="#" class="image image-full"><img src="images/n33-robot-invader.jpg" alt="" /></a>
                  <p>
                    <strong>Hello!</strong> You're looking at <a href="http://html5up.net/striped/">Striped</a>, a fully responsive HTML5 site template designed by <a href="http://n33.co/">AJ</a>
                    for <a href="http://html5up.net/">HTML5 UP</a> It features a clean, minimalistic design, styling for all basic page elements (including blockquotes, tables and lists), a
                    repositionable sidebar (left or right), and HTML5/CSS3 code designed for quick and easy customization (see code comments for details).
                  </p>
                  <p>
                    Striped is released for free under the <a href="http://html5up.net/license/">Creative Commons Attribution license</a> so feel free to use it for personal projects
                    or even commercial ones &ndash; just be sure to credit <a href="http://html5up.net/">HTML5 UP</a> for the design. If you like what you see here, be sure to check out
                    <a href="http://html5up.net/">HTML5 UP</a> for more cool designs or follow me on <a href="http://twitter.com/n33co">Twitter</a> for new releases and updates.
                  </p>
                </article>
            
              <!-- Post -->
                <article class="is-post is-post-excerpt">
                  <header>
                    <h2><a href="#">Lorem ipsum dolor sit amet</a></h2>
                    <span class="byline">Feugiat interdum sed commodo ipsum consequat dolor nullam metus</span>
                  </header>
                  <div class="info">
                    <span class="date"><span class="month">Jan<span>uary</span></span> <span class="day">8</span><span class="year">, 2013</span></span>
                    <ul class="stats">
                      <li><a href="#" class="fa fa-comment">16</a></li>
                      <li><a href="#" class="fa fa-heart">32</a></li>
                      <li><a href="#" class="fa fa-twitter">64</a></li>
                      <li><a href="#" class="fa fa-facebook">128</a></li>
                    </ul>
                  </div>
                  <a href="#" class="image image-full"><img src="images/fotogrph-dark-stairwell.jpg" alt="" /></a>
                  <p>
                    Quisque vel sapien sit amet tellus elementum ultricies. Nunc vel orci turpis. Donec id malesuada metus. 
                    Nunc nulla velit, fermentum quis interdum quis, tate etiam commodo lorem ipsum dolor sit amet dolore. 
                    Quisque vel sapien sit amet tellus elementum ultricies. Nunc vel orci turpis. Donec id malesuada metus. 
                    Nunc nulla velit, fermentum quis interdum quis, convallis eu sapien. Integer sed ipsum ante.
                  </p>
                </article>

              <!-- Pager -->
                <div class="pager">
                  <!--<a href="#" class="button previous">Previous Page</a>-->
                  <div class="pages">
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <span>&hellip;</span>
                    <a href="#">20</a>
                  </div>
                  <a href="#" class="button next">Next Page</a>
                </div>

            </div>
          </div>
