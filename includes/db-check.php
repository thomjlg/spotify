<?php
require_once 'db-config.php';
include('db-create.php');
include('db-select.php');


try {
    $conn = new PDO('sqlite:' .__DIR__.'/'.$dbname);
}

/*Si erreur ou exception, interception du message*/
catch (PDOException $pe) {
    die("<br>Erreur de connexion sur $dbname :" . $pe->getMessage());
}

$count = $conn->querySingle("SELECT COUNT(*) as count FROM tablename WHERE condition");

if($count == 0){
    //requeter sur la base spotify (API)
    db_select_spotify();
    sqli_base(1);
    //puis ajouter les data dans la base sqlite
    db_create($titre, $artiste, $album, $url, $date);

    //enfin, afficher les donneés dans le short-code
    db_select_sqli($titre, $artiste, $album, $url, $date);

}else{
    //données présentes dans la base sqlite donc les afficher
    sqli_base(0);
    db_select_sqli($titre, $artiste, $album, $url, $date);
}

$req1 = null;
$conn = null;
?>

