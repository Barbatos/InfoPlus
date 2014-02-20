<?php 

function rewrite($name)
{
	$name = strtolower($name);
	
	// Delete the tags
	$name = preg_replace('`\{.+\}`U', '', $name);
	$name = preg_replace('`\[.+\]`U', '', $name);
	
	// Replace the unauthorized characters
	$name = str_replace(array('ä', 'à', 'â'), 'a', $name);
	$name = str_replace(array('é', 'è', 'ê', 'ë'), 'e', $name);
	$name = str_replace(array('î', 'ï'), 'i', $name);
	$name = str_replace(array( 'ô', 'ô', 'ö', 'õ'), 'o', $name);
	$name = str_replace(array('ù', 'û', 'ü'), 'u', $name);
	$name = str_replace(array('ñ'), 'n', $name);
	$name = str_replace(array('ç'), 'c', $name);
	$name = preg_replace('`[^a-z0-9]+`', '-', $name);
	$name = preg_replace('`-{2,}`', '-', $name);
	$name = trim($name, '-');
	
	return empty($name) ? 'lien' : $name ;
}

/**
 * Function that securizes a string
 *
 * @author 	Charles 'Barbatos' Duprey
 * @access 	public
 */
function s($string)
{
	return stripslashes(stripslashes(htmlspecialchars($string)));
}

/**
 * Securized $_GET
 *
 * @author 	Charles 'Barbatos' Duprey
 * @access 	public
 */
function G($str, $index = NULL)
{
	if(!isset($index)):
		if(isset($_GET[$str])):
			return s($_GET[$str]);

		else:
			return NULL;
		endif;

	else:
		if(isset($_GET[$str]) AND is_array($_GET[$str]) AND isset($_GET[$str][$index])):
			return s($_GET[$str][$index]);

		else:
			return NULL;
		endif;
	endif;	
}

/**
 * securized $_POST
 *
 * @author 	Charles 'Barbatos' Duprey
 * @access 	public
 */
function P($str = NULL, $index = NULL)
{
	if(!isset($str)){
		if(isset($_POST) && !empty($_POST)){
			return true;
		}
		else {
			return false;
		}
	}

	if(!isset($index)){
		if(isset($_POST[$str])){
			return s($_POST[$str]);
		} 
		else {
			return NULL;
		}
	}
	else {
		if(isset($_POST[$str]) AND is_array($_POST[$str]) AND isset($_POST[$str][$index])){
			return s($_POST[$str][$index]);
		}
		else {
			return NULL;
		}
	}

}

/**
 * Add an error message to the list of messages to display
 *
 * @param 	$error - chaîne de caractères - l'erreur à afficher
 * @author 	Charles 'Barbatos' Duprey
 * @access 	public
 */
function error_add($error){
	$_SESSION['errors'][]['error'] = $error;
}

/**
 * Add a message to the list of messages to display
 *
 * @param 	$message 
 * @author 	Charles 'Barbatos' Duprey
 * @access 	public
 */
function message_add($message){
	$_SESSION['messages'][]['message'] = $message;
}

/**
 * Redirects the user to another page and display a message
 *
 * @param 	$message 
 * @param 	$url 
 * @param 	$type - 1: error message, 2: ok message
 * @author 	Charles 'Barbatos' Duprey
 * @access 	public
 */
function message_redirect($message, $url = 'index.php', $type = 0){
	global $Site;

	if(empty($url)){
		$url = $_SERVER['HTTP_REFERER'];
	}
	else {
		$url = $Site['base_address'].$url;
	}

	if($type == 1){
		message_add($message);
	}
	else {
		error_add($message);
	}

	header('Location: '.$url);
	exit();
}

/**
 * Check if there are errors to display to the user
 *
 * @return 	true if there are errors to display
 * @author 	Charles 'Barbatos' Duprey
 * @access 	public
 */
function error_exists(){
	return (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) ? true : false;
}

/**
 * Check if the user is connected
 *
 * @return 	true if the user is connected
 * @author 	Charles 'Barbatos' Duprey
 * @access 	public
 */
function is_connected(){
	if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
		return true;
	}
	else {
		return false;
	}
}

/**
 * Returns a human readable date from a timestamp
 *
 * @return 	the formated datetime
 * @author 	Charles 'Barbatos' Duprey, zCorrecteurs.fr
 * @access 	public
 */
function dateformat($dateheure, $datetime = 1)
{
	if($dateheure == 0)
	{
		return 'jamais';
	}
	$final = '';
	$dateheurefausse = mktime(1, 0, 0, date('m', $dateheure), date('d', $dateheure), date('Y', $dateheure));
	$fauxnow = mktime(1, 0, 0, date('m'), date('d'), date('Y'));
	$faussedifference = $fauxnow - $dateheurefausse;
	$now = time();
	$difference = $now - $dateheure;

	$futur = false;
	if($difference < 0)
	{
		$difference = abs($difference);
		$faussedifference = abs($faussedifference);
		$futur = true;
	}

	if($faussedifference > 2*24*60*60) 
	{
		if($datetime == 1)
		{
			return 'on '.date('d/m/Y at H\hi:s', $dateheure);
		}
		elseif($datetime == 0)
		{
			return 'on '.date('d/m/Y', $dateheure);
		}
	}
	elseif($faussedifference == 0) 
	{
		if($datetime == 1)
		{
			if($difference >= 4*60*60) 
			{
				$final = 'today,';
			}
			elseif($difference < 4*60*60) 
			{
				if($futur)
				{
					$final = 'in ';
				}
				else
				{
					$final = '';
				}
				$heure = (int)($difference/(60*60));
				$difference -= $heure*60*60;
				$minute = (int)($difference/60);
				$difference -= $minute*60;
				$seconde = $difference;
				if($heure > 0)
				{
					if($minute < 10)
					{
						$minute = '0'.$minute;
					}
					$final .= $heure.'h'.$minute;
				}
				elseif($minute > 0)
				{
					$final .= $minute.' min';
				}
				else
				{
					$final .= $seconde.' s';
				}

				if(!$futur) {
					$final .= ' ago';
				}

				return $final;
			}
		}
		elseif($datetime == 0)
		{
			return 'today';
		}
	}
	elseif($faussedifference == 24*60*60 || $faussedifference == 24*60*60 + 3600 || $faussedifference == 24*60*60 - 3600) 
	{
		if($futur)
		{
			$final = 'tomorrow,';
		}
		else
		{
			$final = 'yesterday,';
		}
	}
	elseif($faussedifference == 2*24*60*60 || $faussedifference == 2*24*60*60 + 3600 || $faussedifference == 2*24*60*60 - 3600) 
	{
		if($futur)
		{
			$final = 'in two days,';
		}
		else
		{
			$final = 'two days ago,';
		}
	}
	if($datetime == 1)
	{

		$final .= ' at '.date('H\hi:s', $dateheure);
	}
	else
	{
		$final = substr($final, 0, strlen($final) - 1);
	}

	return $final;
}

function mailto($dest, $exp, $subject, $msg)
{
	$headers = "From: \"InfoPlus\" <contact@infoplus.com>\n";
	$headers .= "Reply-To: contact@infoplus.com\n";
	$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";
	if(mail($dest, $subject, $msg, $headers)) {
		return true;
	}
	else {
		return false;
	}
}

function genKey($nb)
{
	$list = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789abcdefghijklmnopqrstuvwxyz";
	$key = "";

	for($i = 0; $i < $nb; $i++){
		$key .= $list[rand(0, strlen($list)-1)];
	}

	return $key;
}	
