<?php
require_once 'db-config.php';

try {
    $conn = new PDO('sqlite:' .__DIR__.'/'.$dbname);
}

catch (PDOException $pe) {
    die("<br>Erreur de connexion sur $dbname :" . $pe->getMessage());
}

$delete_req = '
        DELETE FROM tasks1;
        ';

$conn->exec($delete_req);
$delete_req = null;

echo "<br>Toutes les données ont été supprimées de la base.";

echo "<br /><br /><button onclick='history.back()'>Retour à la page d'administration</button>";

//Fermer la connexion SQL (si absent, automatique à la fin du script)
$conn = null;

?>
