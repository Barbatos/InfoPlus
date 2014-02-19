<?php

class Connection {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function connect() {
		if(P('email') && P('password')){
			$stmt = $this->db->prepare("SELECT * FROM membre WHERE email = :email AND motDePasse = :password");
			$stmt->bindValue(':email', P('email'));
			$stmt->bindValue(':password', sha1(P('password')));
			$stmt->execute();
			$data = $stmt->fetch(PDO::FETCH_OBJ);
			$stmt->closeCursor();

			if(!$data->email){
				message_redirect("Invalid email or password", "/connection/");
			}
			else {
				$_SESSION['id'] = $data->id;
				$_SESSION['level'] = $data->type;
				$_SESSION['email'] = $data->email;
	 
				message_redirect("You are now logged in to InfoPlus :-)", "/index/", 1);
			}
		}
		else {
			message_redirect("You need to fill all the fields", "connexion.php");
		}
	}
}