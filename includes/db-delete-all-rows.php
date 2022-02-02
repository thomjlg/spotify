<?php
require_once 'db-config.php';

try {
    $conn = new PDO('sqlite:' .__DIR__.'/'.$dbname);
    echo "<br>Connexion OK sur " .__DIR__."/$dbname.";
}

catch (PDOException $pe) {
    die("<br>Erreur de connexion sur $dbname :" . $pe->getMessage());
}

$delete_req = '
        DELETE FROM tasks1;
        ';

$conn->exec($delete_req);
$delete_req = null;
//Fermer la connexion SQL (si absent, automatique à la fin du script)
$conn = null;

?>
