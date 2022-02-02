<?php
require_once 'db-config.php';
include('db-create.php');
include('db-select.php');
require_once plugin_dir_path(__FILE__) . 'includes/sc-base-sqli.php';


try {
    $conn = new PDO('sqlite:' .__DIR__.'/'.$dbname);
    add_shortcode('data-base', .__DIR__."/$dbname.");
}

/*Si erreur ou exception, interception du message*/
catch (PDOException $pe) {
    die("<br>Erreur de connexion sur $dbname :" . $pe->getMessage());
}

$count = $conn->querySingle("SELECT COUNT(*) as count FROM tablename WHERE condition");

if($count == 0){
    //requeter sur la base spotify (API)
    db_select_spotify();
    
    //puis ajouter les data dans la base sqlite
    db_create($titre, $artiste, $album, $url, $date);

    //enfin, afficher les donneés dans le short-code
    db_select_sqli($titre, $artiste, $album, $url, $date);

}else{
    //données présentes dans la base sqlite donc les afficher
    db_select_sqli($titre, $artiste, $album, $url, $date);
}

$req1 = null;
$conn = null;
?>

