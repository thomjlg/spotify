<?php
require_once 'db-config.php';
include 'db-select-spotify.php';
include 'db-select.php';
include 'db-create.php';

$val = isset($_GET['search']) ? $_GET['search'] : "";
$test = isset($_GET['selector']) ? $_GET['selector'] : "";


try {
    $conn = new PDO('sqlite:' .dirname(__FILE__).'/'.$dbname);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

/*Si erreur ou exception, interception du message*/
catch (PDOException $pe) {
    die("<br>Erreur de connexion sur $dbname :" . $pe->getMessage());
}


$count = $conn->query("SELECT * FROM tasks1 WHERE julianday('now') - julianday(date_ajout) > 30");

while ($row = $count->fetch()) {
    $delete_req = "
        DELETE FROM tasks1 WHERE titre='".$row['titre']."';
        ";

    $conn->exec($delete_req);
    //requeter sur la base spotify (API)
    list($art_name, $url, $alb_name, $mus_name, $id) = db_select_spotify($row['titre'], 'track');
    //puis ajouter les data dans la base sqlite
    db_create($art_name, $url, $alb_name, $mus_name, $id);
}

$conn = null;

header('Location: http://localhost:8888/spotify'); 
die();
?>

