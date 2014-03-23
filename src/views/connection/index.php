<article>
	<header>
		<h2><a href="#">Connexion</a></h2>
	</header>

	<form class="form-horizontal" method="post" action=".">
	  <fieldset>

		<div class="control-group">
		  <label class="control-label" for="email">Email</label>
		  <div class="controls">
			<input id="email" name="email" type="text" placeholder="me@example.com" class="input-xlarge" required="">
		  </div>
		</div>

		<div class="control-group">
		  <label class="control-label" for="password">Mot de Passe</label>
		  <div class="controls">
			<input id="password" name="password" type="password" placeholder="azerty" class="input-xlarge" required="">
		  </div>
		</div>

		<div class="control-group">
		  <label class="control-label" for="connect"></label>
		  <div class="controls">
		  	<br /><button id="connect" name="connect" class="button next">Connexion</button>
		  </div>
		</div>

	  </fieldset>
	</form>
</article>
<p><a href="<?= WEBSITE_URL ?>">Retour à l'accueil</a></p>
