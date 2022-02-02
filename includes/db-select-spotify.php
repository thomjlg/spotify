<?php
function db_select_spotify($search, $type){
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

  if ($type == 'album') {
    $album = $search;

    $spotifyURL = 'https://api.spotify.com/v1/search?q='.urlencode($album).'&type=album';
  
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
  
    
    //Name : $json2->{'albums'}->{'items'}[0]->{'artists'}[0]->{'name'}
    //URL : $json2->{'albums'}->{'items'}[0]->{'artists'}[0]->{'external_urls'}
    //URI : $json2->{'albums'}->{'items'}[0]->{'href'}
  
    $spotifyURL = $json2->{'albums'}->{'items'}[0]->{'href'};
  
    $ch3 = curl_init();
  
    curl_setopt($ch3, CURLOPT_URL, $spotifyURL);
    curl_setopt($ch3,  CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization));
    curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch3, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:x.x.x) Gecko/20041107 Firefox/x.x");
    curl_setopt($ch3, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, false);
    $json3 = curl_exec($ch3);
    $json3 = json_decode($json3);
    curl_close($ch3);
  
    //echo '<pre>'.print_r($json2->{'albums'}->{'items'}[0]->{'artists'}[0]->{'name'}).'</pre>';
    //echo '<pre>'.print_r($json2->{'albums'}->{'items'}[0]->{'artists'}[0]->{'external_urls'}).'</pre>';
    //echo '<pre>'.print_r($json2->{'albums'}->{'items'}[0]->{'name'}.'</pre>';
    //echo '<pre>'.print_r($json3->{'tracks'}->{'items'}[0]->{'name'}).'</pre>';
  
    $art_name = $json2->{'albums'}->{'items'}[0]->{'artists'}[0]->{'name'};
    $url = $json2->{'albums'}->{'items'}[0]->{'artists'}[0]->{'external_urls'};
    $alb_name = $json2->{'albums'}->{'items'}[0]->{'name'};
    $mus_name = $json3->{'tracks'}->{'items'}[0]->{'name'};
  
    return $art_name, $url, $alb_name, $mus_name;
  }
  elseif ($type == 'track') {
    $track = $search;

    $spotifyURL = 'https://api.spotify.com/v1/search?q='.urlencode($track).'&type=track';
    
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

    //echo '<pre>'.print_r($json2->{'tracks'}->{'items'}[0]->{'artists'}[0]->{'name'}).'</pre>';
    //echo '<pre>'.print_r($json2->{'tracks'}->{'items'}[0]->{'external_urls'}->{'spotify'}).'</pre>';
    //echo '<pre>'.print_r($json2->{'tracks'}->{'items'}[0]->{'album'}->{'name'}).'</pre>';
    //echo '<pre>'.print_r($json2->{'tracks'}->{'items'}[0]->{'name'}).'</pre>';

    $art_name = $json2->{'tracks'}->{'items'}[0]->{'artists'}[0]->{'name'};
    $url = $json2->{'tracks'}->{'items'}[0]->{'external_urls'}->{'spotify'};
    $alb_name = $json2->{'tracks'}->{'items'}[0]->{'album'}->{'name'};
    $mus_name = $json2->{'tracks'}->{'items'}[0]->{'name'};
  
    return $art_name, $url, $alb_name, $mus_name;
  }
  elseif ($type == 'artist') {
    $artist = $search;

    $spotifyURL = 'https://api.spotify.com/v1/search?q='.urlencode($artist).'&type=artist';

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

    ///////////////////////////////////////////////////////////////////////////////////////////////////////

    $spotifyURL = 'https://api.spotify.com/v1/artists/'.urlencode($json2->{'artists'}->{'items'}[0]->{'id'}).'/top-tracks?market=FR';

    $ch3 = curl_init();


    curl_setopt($ch3, CURLOPT_URL, $spotifyURL);
    curl_setopt($ch3,  CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization));
    curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch3, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:x.x.x) Gecko/20041107 Firefox/x.x");
    curl_setopt($ch3, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, false);
    $json3 = curl_exec($ch3);
    $json3 = json_decode($json3);
    curl_close($ch3);

    //echo '<pre>'.print_r($json3, true).'</pre>';

    echo '<pre>'.print_r($json2->{'artists'}->{'items'}[0]->{'name'}).'</pre>';
    echo '<pre>'.print_r($json2->{'artists'}->{'items'}[0]->{'external_urls'}->{'spotify'}).'</pre>';
    echo '<pre>'.print_r($json3->{'tracks'}[0]->{'name'}).'</pre>';
    echo '<pre>'.print_r($json3->{'tracks'}[0]->{'album'}->{'name'}).'</pre>';

    $art_name = $json2->{'artists'}->{'items'}[0]->{'name'};
    $url = $json2->{'artists'}->{'items'}[0]->{'external_urls'}->{'spotify'};
    $alb_name = $json3->{'tracks'}[0]->{'album'}->{'name'};
    $mus_name = $json3->{'tracks'}[0]->{'name'};

    return $art_name, $url, $alb_name, $mus_name;    
  }

}
?>
