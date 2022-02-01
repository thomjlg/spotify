
<?php
require_once 'db-config.php';

function db_select_sqli(){
    try {
        $conn = new PDO('sqlite:' .__DIR__.'/'.$dbname);
        echo "<br>Connexion OK sur " .__DIR__."/$dbname.";
        add_shortcode('data-base', .__DIR__."/$dbname.");
    }
    catch (PDOException $pe) {
        die("<br>Erreur de connexion sur $dbname :" . $pe->getMessage());
    }
    
    $req1 = "
            SELECT * FROM db.name 
            where xxx like xxx;
            ";    
   
    add_shortcode('result-query', $conn->exec($req1));
    
    $req1 = null;
    $conn = null;
    
}

?>

