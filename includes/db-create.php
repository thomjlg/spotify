<?php
/*Inclusion d'un fichier de configuration pour centraliser les informations de connexion*/

function db_create($titre, $artiste, $album, $url, $id){
    require_once 'db-config.php';

    try {
        $conn = new PDO('sqlite:' .__DIR__.'/'.$dbname);
    }
    catch (PDOException $pe) {
        die("<br>Erreur de connexion sur $dbname :" . $pe->getMessage());
    }
    
    $create_req = "
            CREATE TABLE IF NOT EXISTS tasks1 (
                input_id    INTEGER PRIMARY KEY AUTOINCREMENT ,
                titre       VARCHAR (255)        DEFAULT NULL,
                artiste     VARCHAR (255)        DEFAULT NULL,
                album       VARCHAR (255)        DEFAULT NULL,
                url         VARCHAR (400)        DEFAULT NULL,
                id          VARCHAR (255)        DEFAULT NULL,
                date_ajout        DATE                 DEFAULT NULL
                );
    "
    ;

    $insert_req = '
            INSERT INTO tablename (titre, artiste, album, url, id, date_ajout)'
            .'VALUES ("'.$titre.'", "'.$artiste.'", "'.$album.'", "'.$url.'", "'.$id.'", NOW());'
    ;

    $conn->exec($create_req);
    $conn->exec($insert_req);
    
    //Purger la requete SQL
    $create_req = null;
    $insert_req = null;
    $conn = null;
}

?>
