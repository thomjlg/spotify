<?php
// function that runs when shortcode is called
function sqli_base() {

// Things that you want to do.
$message = 'SQLITE';

// Output needs to be return
return $message;
}
// register shortcode [texte]
add_shortcode('data-base', 'sqli_base');
