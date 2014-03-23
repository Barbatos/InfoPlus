<article>

  <header>
    <h2><a href="#">Inscription</a></h2>
  </header>

  <form class="form-horizontal" method="post" action=".">
    <fieldset>

      <!-- Text input-->
      <div class="control-group">
        <label class="control-label" for="forname">Prénom</label>
        <div class="controls">
          <input id="forname" name="forname" type="text" placeholder="Robert" class="input-xlarge" required="">
        </div>
      </div>

      <!-- Text input-->
      <div class="control-group">
        <label class="control-label" for="lastname">Nom</label>
        <div class="controls">
          <input id="lastname" name="lastname" type="text" placeholder="De Niro" class="input-xlarge" required="">
          
        </div>
      </div>

      <!-- Text input-->
      <div class="control-group">
        <label class="control-label" for="email">Email</label>
        <div class="controls">
          <input id="email" name="email" type="text" placeholder="test@example.com" class="input-xlarge" required="">
          
        </div>
      </div>

      <!-- Text input-->
      <div class="control-group">
        <label class="control-label" for="email2">Confirmation</label>
        <div class="controls">
          <input id="email2" name="email2" type="text" placeholder="test@example.com" class="input-xlarge" required="">
          
        </div>
      </div>

      <!-- Password input-->
      <div class="control-group">
        <label class="control-label" for="password">Mot de Passe</label>
        <div class="controls">
          <input id="password" name="password" type="password" placeholder="azerty" class="input-xlarge" required="">
          
        </div>
      </div>

      <!-- Password input-->
      <div class="control-group">
        <label class="control-label" for="password2">Confirmation</label>
        <div class="controls">
          <input id="password2" name="password2" type="password" placeholder="azerty" class="input-xlarge" required="">
          
        </div>
      </div>

      <!-- Button -->
      <div class="control-group">
        <label class="control-label" for="register"></label>
        <div class="controls">
          <br /><button id="register" name="register" class="button next">Inscription</button>
        </div>
      </div>

    </fieldset>
  </form>
</article>

<p><a href="<?= WEBSITE_URL ?>">Retour à l'accueil</a></p>
