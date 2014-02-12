<?php
require_once('includes/init.php');

$stmt = $bdd->prepare('SELECT * FROM membre');
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_OBJ);
$stmt->closeCursor();

foreach($data as $d) {
	echo "Membre #" . $d->id . ":" . $d->email;
}

?>