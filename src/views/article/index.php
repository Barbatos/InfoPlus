<article class="is-post is-post-excerpt">
  <header>
    <h2><a href="#"><?= $article->titre ?></a></h2>
    <span class="byline">Article publié sur <a href="http://<?= $article->site ?>" target="_blank"><?= $article->site ?></a></span>
  </header>
  <div class="info">
    <span class="date"><span class="month"><?= date('M', $article->dateAjout) ?></span> <span class="day"><?= date('d', $article->dateAjout) ?></span><span class="year">, <?= date('Y', $article->dateAjout) ?></span></span>
  </div>
  <a href="#" class="image image-full"><img src="<?= $article->img ?>" alt="" /></a>
  <p>
    <?php 

    if($_SESSION['level'] < 2) {
    	echo cutString(nl2br($article->texte), 600);
    }
    
    else {
    	echo nl2br($article->texte); 
    }

    ?>
  </p>
  <p>
  	<?php 

  	if($_SESSION['level'] < 2) {
  		echo '<a href="/premium/" class="button next">Lire la suite</a>';
  	}

  	?>
  	
  </p>
</article>