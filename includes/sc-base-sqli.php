<?php
// function that runs when shortcode is called
function sqli_base($param) {

    if($param == 0){
        $message = 'SQLITE';
    }
    else{
        $message = 'Spotify';
    }
// Things that you want to do.


// Output needs to be return
return $message;
}
// register shortcode [texte]
add_shortcode('data-base', 'sqli_base');
