<html>


<fieldset>
<legend> <h1>Abonnement</h1> </legend>
<form name="formAbonnement" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <br>
	  <label>Choisir site : </label><select name="listeSite" ><option>Liste des sites</option> </select><br/>
	  <label>S'abonner à plusieurs sites : </label><input type="text" name="plusSite" size="30" maxlength="256"><br/>
	  <label>Votre sélection : </label><input type="text" name="selection" size="30" maxlength="256"><br/>
	  <input type="submit" name="ok" value="OK" >
      <br>	   
    </form>	
</fieldset>









</html>