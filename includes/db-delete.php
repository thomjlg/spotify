<?php
require_once 'db-config.php';

try {
    $conn = new PDO('sqlite:' .__DIR__.'/'.$dbname);
}
catch (PDOException $pe) {
    die("<br>Erreur de connexion sur $dbname :" . $pe->getMessage());
}

$delete_clause = '
        DELETE FROM table WHERE condition;
        ';

$conn->exec($delete_clause);
$delete_clause = null;
$conn = null;

?>
