<?php 
require_once 'db-select.php';

// Define 'af_p1_Add_Text'
function tl_p1_Add_Text(){
  return '<form method="post" style="text-align:center" action="/wp-content/plugins/spotify/includes/db-select-public.php?artist="> Type de recherche : <select name="Type de recherche"><option value="titre">titre</option><option value="artiste">artiste</option><option value="album">album</option></select> <br /> <br/><input type="text" id=value value="" placeholder="your filter here"> <br /><button type="submit" id="btn-submit">Rechercher</button></form>';
}

add_shortcode('search', 'tl_p1_Add_Text');

