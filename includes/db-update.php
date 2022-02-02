
<?php
/*Inclusion d'un fichier de configuration pour centraliser les informations de connexion*/
require_once 'db-config.php';

/*Essai de connexion en créant on objet connexion avec les informations de la BDD*/
try {
    $conn = new PDO('sqlite:' .__DIR__.'/'.$dbname);
    echo "<br>Connexion OK sur " .__DIR__."/$dbname.";
}

/*Si erreur ou exception, interception du message*/
catch (PDOException $pe) {
    echo '<br>Arrêt du script.';
    //Fonction DIE() identique à EXIT()
    die("<br>Erreur de connexion sur $dbname :" . $pe->getMessage());
}

//Si le bloc TRY-CATCH est OK , le reste du script est réalisé
//Si erreur dans bloc TRY-CATCH, arrêt du script car fonction DIE
echo "<br>Réalisation du reste du script php.";

//Préparation de la requête
$req7 = 'UPDATE tasks1 SET subject = "aaaaa" WHERE task_id=3;
        ';

$req8 = 'UPDATE tasks2 SET subject = "aaaaa" WHERE rowid=3;
        ';

//PDO::exec() retourne le nombre de lignes qui ont été modifiées ou effacées
//par la requête SQL exécutée.
//Si aucune ligne n'est affectée, la fonction PDO::exec() retournera 0.
$conn->exec($req7);
$conn->exec($req8);

//Purger la requete SQL
$req7 = null;
$req8 = null;
//Fermer la connexion SQL (si absent, automatique à la fin du script)
$conn = null;

?>
