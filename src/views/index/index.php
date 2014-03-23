
<?php 
$theme = G('arg1');

if(!$theme || $theme == 'tous') {
	$add = '';
}
else {
	$add = 'WHERE theme = (SELECT id FROM theme WHERE libelle = :theme)';
}

$stmt = $bdd->prepare('SELECT * FROM article '.$add.' ORDER BY dateAjout DESC');
$stmt->bindValue(':theme', $theme);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_OBJ);
$stmt->closeCursor();

foreach($data as $d) {
?>

<article class="is-post is-post-excerpt">
  <header>
    <h2><a href="#"><?= $d->titre ?></a></h2>
    <span class="byline">Article publié sur <a href="http://<?= $d->site ?>" target="_blank"><?= $d->site ?></a></span>
  </header>
  <div class="info">
    <span class="date"><span class="month"><?= date('M', $d->dateAjout) ?></span> <span class="day"><?= date('d', $d->dateAjout) ?></span><span class="year">, <?= date('Y', $d->dateAjout) ?></span></span>
  </div>
  <a href="#" class="image image-full"><img src="<?= $d->img ?>" alt="" /></a>
  <p>
    <?= cutString(nl2br($d->texte), 600) ?>
  </p>
  <p>
  	<a href="/article/<?= rewrite($d->titre) ?>" class="button next">Lire la suite</a>
  </p>
</article>

<?php 
}
?>

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
  <a href="#" class="button next">Page suivante</a>
</div>
