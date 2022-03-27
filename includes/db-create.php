<?php
/*Inclusion d'un fichier de configuration pour centraliser les informations de connexion*/

function db_create($art_name, $url, $alb_name, $mus_name, $id){
    include 'db-config.php';

    try {
        $conn = new PDO('sqlite:' .__DIR__."/".$dbname);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo __DIR__."/".$dbname;
    }
    
    catch (PDOException $pe) {
        die("<br>Erreur de connexion sur $dbname :" . $pe->getMessage());
        echo '<br>Arrêt du script.';
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
            INSERT INTO tasks1 (titre, artiste, album, url, id, date_ajout)'
            .'VALUES ("'.$mus_name.'", "'.$art_name.'", "'.$alb_name.'", "'.$url.'", "'.$id.'", date(\'now\'));'
    ;
    echo "<br>";
    echo $insert_req;
    echo "<br>";
    $conn->exec($create_req);
    $conn->exec($insert_req);
    
    //Purger la requete SQL
    $create_req = null;
    $insert_req = null;
    $conn = null;
}


//db_create('TITRE', 'MUSIQUE', 'ARTISTE', 'ALBUM', 'url', 1)


?>
