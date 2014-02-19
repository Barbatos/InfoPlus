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
		$stmt = $this->db->prepare("
			INSERT INTO membre (email, motDePasse, type, nom, prenom) 
			VALUES 
			(:email, :password, :type, :nom, :prenom)
		");
		$stmt->bindValue(':email', P('email'));
		$stmt->bindValue(':password', sha1(P('password')));
		$stmt->bindValue(':type', 1);
		$stmt->bindValue(':nom', P('lastname'));
		$stmt->bindValue(':prenom', P('forname'));

		if($stmt->execute()) {
			return true;
		}
		else {
			return false;
		}
	}
}
