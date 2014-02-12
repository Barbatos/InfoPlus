<html>

<fieldset>
<legend> <h1>Inscription</h1> </legend>
<form name="formInscription" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <br>
	  <label>Nom : </label><input type="text" name="nom" size="30" maxlength="256"><br/>
	  <label>Prénom : </label><input type="text" name="prenom" size="30" maxlength="256"><br/>
	  <label>E-mail : </label><input type="text" name="email" size="30" maxlength="256"><br/>
	  <label>Mot de passe : </label><input type="password" name="mdp" size="30" maxlength="256"><br/>
	  <label>Confirmer mot de passe : </label><input type="password" name="mdp" size="30" maxlength="256"><br/>
	  <input type="submit" name="valider" value="Valider" >
      <br>	   
    </form>	
</fieldset>












</html>