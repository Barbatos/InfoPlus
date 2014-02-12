<html>
<h1>Mon Compte</h1>
<fieldset>
<legend> <h2>Modifier Carte bancaire</h2> </legend>
<form name="formCB" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <br>
	  <label>Numéro de CB : </label><input type="text" name="nom" size="30" maxlength="256"><br/>
	  <label>Date d'expiration : </label><input type="text" name="prenom" size="30" maxlength="256"><br/>
	  <input type="submit" name="ok" value="OK" >
      <br>	   
    </form>	
</fieldset>
<fieldset>
<legend> <h2>Modifier info personnelles</h2> </legend>
<form name="formInfoPerso" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <br>
	  <label>Nom : </label><input type="text" name="nom" size="30" maxlength="256"><br/>
	  <label>Prénom : </label><input type="text" name="prenom" size="30" maxlength="256"><br/>
	  <label>E-mail : </label><input type="text" name="email" size="30" maxlength="256"><br/>
	  <label>Mot de passe : </label><input type="password" name="mdp" size="30" maxlength="256"><br/>
	  <label>Confirmer mot de passe : </label><input type="password" name="mdp" size="30" maxlength="256"><br/>
	  <input type="submit" name="ok" value="OK" >
      <br>	   
    </form>	
</fieldset>











</html>