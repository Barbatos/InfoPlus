<?php 

function getResultatsPour($keyword) {
	global $bdd;

	$stmt = $bdd->prepare('SELECT id, titre FROM article WHERE titre LIKE :titre');
	$stmt->bindValue(':titre', '%'.$keyword.'%');
	$stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_OBJ);
	$stmt->closeCursor();

	return $data;
}
