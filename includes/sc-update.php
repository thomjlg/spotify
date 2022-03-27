<?php
require_once 'db-config.php';
// function that runs when shortcode is called
function sqli_update() {
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

    $count = $conn->query("SELECT COUNT(*) FROM tasks1 WHERE julianday('now') - julianday(date_ajout) > 30");

    $req1 = null;
    $conn = null;
    /*
    $res = '<ul>';
    while ($row = $count->fetch()) {
        $res .= '<li> Titre musique : '.$row['titre']."<br/>Artiste : ".$row['artiste']."<br/>Album : ".$row['album']."<br/> Url : ".$row['url']."<br/>";
        $res .= '<iframe src="https://open.spotify.com/embed/album/'.$row['id'].'" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe> <br></li>';
    }
    $res .= '</ul>';
    */

    $result = $count->fetch();
    $count = $result[0];
    if ($count > 0) {
        $res = "Attention certaines données sont anciennes de plus de 30 jours.";
        $res .= '<form method="GET" action="/wp-content/plugins/spotify/includes/update.php"><input type="submit" name="wp_submit" value="Update" class="button-primary" />';
    }
    else {
        $res = "Tout est à jour";
    }
    return $res;
}
// register shortcode
add_shortcode('update', 'sqli_update');
