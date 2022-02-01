<?php
/*Inclusion d'un fichier de configuration pour centraliser les informations de connexion*/

function db_create($titre, $artiste, $album, $url, $date){
    require_once 'db-config.php';

    try {
        $conn = new PDO('sqlite:' .__DIR__.'/'.$dbname);
        echo "<br>Connexion OK sur " .__DIR__."/$dbname.";
    }
    catch (PDOException $pe) {
        echo '<br>Arrêt du script.';
        //Fonction DIE() identique à EXIT()
        die("<br>Erreur de connexion sur $dbname :" . $pe->getMessage());
    }
    
    $insert_req = '
            INSERT INTO tablename (titre, artiste, album, url, date)'
            .'VALUES ("'.$titre.'", "'.$artiste.'", "'.$album.'", "'.$url.'", "'.$date.'");'
            ;
    
    $conn->exec($insert_req);
    
    //Purger la requete SQL
    $insert_req = null;
    $conn = null;
}

?>
