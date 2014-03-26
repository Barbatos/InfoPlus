<?php 

function souscrireAbonnement($id) {
	global $bdd;

	$stmt = $bdd->prepare('SELECT id FROM abonnement WHERE idMembre = :id');
	$stmt->bindValue(':id', $_SESSION['id']);
	$stmt->execute();
	$data = $stmt->fetch(PDO::FETCH_OBJ);
	$stmt->closeCursor();

	if($data) {
		message_redirect('Vous disposez déjà d\'un abonnement Premium !', '/');
	}

	$duree = 60 * 60 * 24 * 30 * $id;

	$stmt = $bdd->prepare('INSERT INTO abonnement 
		(idMembre, type, dateDebut, duree)
		VALUES 
		(:id, :type, :dateDebut, :duree)
	');
	$stmt->bindValue(':id', $_SESSION['id']);
	$stmt->bindValue(':type', 1);
	$stmt->bindValue(':dateDebut', time());
	$stmt->bindValue(':duree', $duree);
	$stmt->execute();
	$stmt->closeCursor();

	$stmt = $bdd->prepare('UPDATE membre SET type = :type WHERE id = :id');
	$stmt->bindValue(':type', 2);
	$stmt->bindValue(':id', $_SESSION['id']);
	$stmt->execute();
	$stmt->closeCursor();

	$_SESSION['level'] = 2;

	message_redirect('Vous avez souscrit avec succès à un abonnement Premium. Bienvenue ! :-)', '/', 1);
}
