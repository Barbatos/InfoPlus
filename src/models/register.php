<?php 

class Register {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function checkEmail($email) {

		$stmt = $this->db->prepare("SELECT count(*) AS nb FROM membre WHERE email = :email");
		$stmt->bindValue(':email', $email);
		$stmt->execute();
		$nb = $stmt->fetch(PDO::FETCH_OBJ);
		$stmt->closeCursor();

		if(!$nb->nb) {
			return true;
		}
		else {
			return false;
		}
	}

	public function register() {
		$key = genKey(20);

		$stmt = $this->db->prepare("
			INSERT INTO membre (email, motDePasse, type, nom, prenom, cleInscription) 
			VALUES 
			(:email, :password, :type, :nom, :prenom, :cle)
		");
		$stmt->bindValue(':email', P('email'));
		$stmt->bindValue(':password', sha1(P('password')));
		$stmt->bindValue(':type', 1);
		$stmt->bindValue(':nom', P('lastname'));
		$stmt->bindValue(':prenom', P('forname'));
		$stmt->bindValue(':cle', $key);

		if($stmt->execute()) {
			$txt = "<html><body><h1>Registration Confirmation</h1>";
			$txt .= "<p>".P('forname').", welcome on InfoPlus!</p>";
			$txt .= "<p>In order to validate your registration, please click on this confirmation link:<br />";
			$txt .= '<a href="'.WEBSITE_URL.'/register/validate/'.P('email').'/'.$key.'/"></a></p>';
			$txt .= '<p>We are looking forward to seeing you on InfoPlus,<br />';
			$txt .= '<i>The InfoPlus team</i></p>';

			mailto(P('email'), "Registration confirmation", $txt);
			return true;
		}
		else {
			return false;
		}
	}

	public function validateRegistration() {
		
	}
}
