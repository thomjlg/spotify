<?php
// function that runs when shortcode is called
function sqli_base() {
    $param = isset($_GET['param']) ? $_GET['param'] : "";
    if($param == 0){
        $message = 'Résultat obtenu dans la base SQLITE';
    }
    else{
        $message = 'Résultats récupéré depuis Spotify';
    }
// Things that you want to do.


// Output needs to be return
return $message;
}
// register shortcode
add_shortcode('data-base', 'sqli_base');
