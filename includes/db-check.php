<?php
require_once 'db-config.php';
include 'db-select-spotify.php';
//include 'sc-base-sqli.php';
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
if ($test == "artiste") {
    $count = $conn->query("SELECT COUNT(*) FROM tasks1 WHERE artiste='".$val."'");
}
elseif ($test == "album") {
    $count = $conn->query("SELECT COUNT(*) FROM tasks1 WHERE album='".$val."'");
}
elseif ($test == "track") {
    $count = $conn->query("SELECT COUNT(*) FROM tasks1 WHERE titre='".$val."'");
}   

$result = $count->fetch();
$count = $result[0];

if($count == 0){
    //requeter sur la base spotify (API)
    list($art_name, $url, $alb_name, $mus_name, $id) = db_select_spotify($val, $test);
    //puis ajouter les data dans la base sqlite
    db_create($art_name, $url, $alb_name, $mus_name, $id);

    header('Location: http://localhost:8888/resultat-requete?val='.$val.'&test='.$test.'&param=1'); 
    die();
}else{
    header('Location: http://localhost:8888/resultat-requete?val='.$val.'&test='.$test.'&param=0'); 
    die();
}
?>

