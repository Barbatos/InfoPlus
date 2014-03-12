<?php 

if(is_connected()) {
	message_redirect('You are already logged in!', '/');
}

$register = new Register($bdd);

if(P()) {
	if(P('forname') && P('lastname') && P('email') && P('email2') && P('password') && P('password2')) {
		if(P('password') != P('password2')) {
			message_redirect("The two password fields must match!", '/register/');
		}

		if(P('email') != P('email2')) {
			message_redirect("The two emails must match!", '/register/');
		}

		if(!$register->checkEmail(P('email'))) {
			message_redirect("This email address is already registered to InfoPlus.", '/register/');
		}

		if($register->register()) {
			message_redirect("You've successfully registered to InfoPlus! You'll receive an email shortly containing a link to validate your registration.", '/', 1);
		}
		else {
			message_redirect("There was an error processing your registration. Please try again.", '/register/');
		}
	}
	else {
		message_redirect("You must fill all the fields!", '/register/');
	}
}
Page::$title = "InfoPlus - Register";
Page::$templates = array('index.php');
