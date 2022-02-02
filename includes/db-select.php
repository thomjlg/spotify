
<?php
require_once 'db-config.php';

function db_select_sqli(){

    $artist = $_GET['artist'];
    try {
        $conn = new PDO('sqlite:' .__DIR__.'/'.$dbname);
    }
    catch (PDOException $pe) {
        die("<br>Erreur de connexion sur $dbname :" . $pe->getMessage());
    }
    
    $req1 = "
            SELECT * FROM db.name 
            where artist like $artist;
            ";    
   
    
    $req1 = null;
    $conn = null;

    return $conn->exec($req1);
    
}

// add_shortcode('result-query', 'db_select_sqli');
// add_shortcode('data-base', .__DIR__."/$dbname.");

?>

