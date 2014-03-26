<?php 

function getInfosArticle($article) {
	global $bdd;

	$stmt = $bdd->prepare('SELECT * FROM article WHERE id = :id');
	$stmt->bindValue(':id', $article);
	$stmt->execute();
	$data = $stmt->fetch(PDO::FETCH_OBJ);
	$stmt->closeCursor();

	if($data) {
		return $data;
	}
	else return false;
}
