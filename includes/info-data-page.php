<?php 
require_once 'db-select.php';
// $result = db_select_sqli();

add_action("the_content", "tl_p1_Add_Text");

// Define 'af_p1_Add_Text'
function tl_p1_Add_Text()
{
  echo '<form method="post" action="".db_select_sqli()."db-select.php"> Type de recherche : <select name="Type de recherche"><option value="titre">titre</option><option value="artiste">artiste</option><option value="album">album</option></select> <input type="text" id=value value="" placeholder="your filter here"> <button type="submit" id="btn-submit">Rechercher</button></form>';
//   echo "<p>Résultat de la recherche : $result</p>";

}



