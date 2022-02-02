
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
   
    

    $q = $conn->query($req1);
    //echo $q? 'True' : 'False'; //Spécifique PHP7
    $q->setFetchMode(PDO::FETCH_ASSOC);

    //fetchAll — Retourne un tableau contenant toutes les lignes du jeu d'enregistrements et vide la requête.
    print_r($q->fetchAll());
    
    $conn = null;

    return print_r($q->fetchAll());
    
}

add_shortcode('result-query', 'db_select_sqli');

?>

