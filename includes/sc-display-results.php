<?php
require_once 'db-config.php';
// function that runs when shortcode is called
function sqli_results() {
    $val = isset($_GET['val']) ? $_GET['val'] : "";
    $test = isset($_GET['test']) ? $_GET['test'] : "";
    $dbname="spotify.sqlite";
    try {
        $conn = new PDO('sqlite:' .dirname(__FILE__).'/'.$dbname);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    catch (PDOException $pe) {
        die("<br>Erreur de connexion sur $dbname :" . $pe->getMessage());
    }

    if ($test == "artiste") {
        $count = $conn->query("SELECT * FROM tasks1 WHERE artiste='".$val."'");
    }
    elseif ($test == "album") {
        $count = $conn->query("SELECT * FROM tasks1 WHERE album='".$val."'");
    }
    elseif ($test == "track") {
        $count = $conn->query("SELECT * FROM tasks1 WHERE titre='".$val."'");
    }
    $conn = null;

    try {
        $res = '<ul>';
        while ($row = $count->fetch()) {
            $res .= '<li> Titre musique : '.$row['titre']."<br/>Artiste : ".$row['artiste']."<br/>Album : ".$row['album']."<br/> Url : ".$row['url']."<br/>";
            $res .= '<iframe src="https://open.spotify.com/embed/album/'.$row['id'].'" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe> <br></li>';
        }
        $res .= '</ul>';
    }
    catch (Error $e) {
        echo 'Erreur : Pas de valeur envoyé';
    }
    
    return $res;
}




// register shortcode
add_shortcode('results-query', 'sqli_results');
