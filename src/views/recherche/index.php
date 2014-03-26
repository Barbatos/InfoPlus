
<article class="is-post is-post-excerpt">
	<header>
		<h2><a href="#">Recherche: <?= G('search') ?></a></h2>
	</header>

	<?php 
	if(!empty($resultats)) {
	?>
	
	<p>Voici la liste des résultats trouvés :</p>	
	
	<table class="style1">
		<thead>
			<tr>
				<th>Titre</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach($resultats as $r) 
			{
			?>
			<tr>
				<td><a href="/article/<?= $r->id ?>/<?= rewrite($r->titre) ?>.html"><?= $r->titre ?></a></td>
			</tr>
			<?php 
			}
			?>
		</tbody>
	</table>

	<?php 
	}
	else {
	?>
	<p>Aucun résultat trouvé.</p>
	<p><a href="/">Retour à l'accueil</a></p>
	<?php 
	}
	?>
</article>