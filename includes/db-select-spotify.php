<?php
function db_select_spotify(){
  $client_id = '4aeb6deb3f994efd95fcf6ed0708d5be';
  $client_secret = 'cf2237bf85a14725b4fa2b4049c798a8';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,            'https://accounts.spotify.com/api/token' );
  curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret)));
  curl_setopt($ch, CURLOPT_POSTFIELDS,     'grant_type=client_credentials' );
  curl_setopt($ch, CURLOPT_POST,           1 );
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:x.x.x) Gecko/20041107 Firefox/x.x");
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

  $json = curl_exec($ch);
  $json = json_decode($json);
  curl_close($ch);

  $authorization = "Authorization: Bearer " . $json->access_token;

  $artist = 'rammlied';

  $spotifyURL = 'https://api.spotify.com/v1/search?q='.urlencode($artist).'&type=album';

  $ch2 = curl_init();


  curl_setopt($ch2, CURLOPT_URL, $spotifyURL);
  curl_setopt($ch2,  CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization));
  curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch2, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:x.x.x) Gecko/20041107 Firefox/x.x");
  curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
  $json2 = curl_exec($ch2);
  $json2 = json_decode($json2);
  curl_close($ch2);

  echo '<pre>'.print_r($json2, true).'</pre>';
}
?>
