<?php
    $dbname = 'spotify.sqlite';
    /*$host = 'localhost:8888'; // Ou Adresse IP du server 11.22.33.44. Inutile de préciser le port 3306 si non changé.
    $username = 'wordpress';
    $password = 'wordpress';
*/

/*
Utilisation ?
https://stackoverflow.com/questions/2418473/difference-between-require-include-require-once-and-include-once/2418514#2418514
    require
    when the file is required by your application, e.g. an important message
    template or a file containing configuration variables without which the app
     would break.

    require_once
    when the file contains content that would produce an error on
    subsequent inclusion, e.g. function important() { // important code } is
    definitely needed in your application but since functions cannot be
    redeclared should not be included again.

    include
    when the file is not required and application flow should continue when
    not found, e.g. great for templates referencing variables from the current
    scope or something

    include_once
    optional dependencies that would produce errors on subsequent loading or
    maybe remote file inclusion that you do not want to happen twice due to
    the HTTP overhead

*/
