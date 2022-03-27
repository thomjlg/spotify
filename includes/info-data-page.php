<?php 
require_once 'db-select.php';

// Define 'af_p1_Add_Text'
function tl_p1_Add_Text(){
  return '
  <form method="GET" style="text-align:center" action="/wp-content/plugins/spotify/includes/db-check.php">
    Type de recherche : 
    <select name="selector">
      <option value="track">titre</option>
      <option value="artiste">artiste</option>
      <option value="album">album</option>
    </select>
    <br/> 
    <br/>
    <input type="text" name="search" placeholder="your filter here">
    <br/>
    <input type="submit" id="btn-submit" name="submit"></input>
  </form>';
}

add_shortcode('search', 'tl_p1_Add_Text');

