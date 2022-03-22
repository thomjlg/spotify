<?php
require_once 'db-config.php';

try {
    $conn = new PDO('sqlite:' .__DIR__.'/'.$dbname);
}
catch (PDOException $pe) {
    die("<br>Erreur de connexion sur $dbname :" . $pe->getMessage());
}

$artist = $_GET['artist'];
$delete_clause = "
        DELETE FROM table 
        WHERE artist like $artist;
        ";

$conn->exec($delete_clause);
$delete_clause = null;
$conn = null;

echo "<br>Les données ont été supprimées de la base.";

echo "<br /><br /><button onclick='history.back()'>Retour à la page d'administration</button>";

?>
