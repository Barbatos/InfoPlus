<form class="form-horizontal" method="post" action=".">
  <fieldset>

	<legend>Connection</legend>

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
		<button id="connect" name="connect" class="btn btn-success">Log In</button>
	  </div>
	</div>

  </fieldset>
</form>

<p><a href="<?= WEBSITE_URL ?>">Go back to the main page</a></p>
