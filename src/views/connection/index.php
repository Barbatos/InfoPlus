<article>
	<header>
		<h2><a href="#">Connection</a></h2>
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
		  <label class="control-label" for="password">Password</label>
		  <div class="controls">
			<input id="password" name="password" type="password" placeholder="password" class="input-xlarge" required="">
		  </div>
		</div>

		<div class="control-group">
		  <label class="control-label" for="connect"></label>
		  <div class="controls">
		  	<br /><button id="connect" name="connect" class="button next">Log In</button>
		  </div>
		</div>

	  </fieldset>
	</form>
</article>
<p><a href="<?= WEBSITE_URL ?>">Go back to the main page</a></p>
