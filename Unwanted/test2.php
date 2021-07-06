<?php
ini_set('display_errors', '1');
    $file = fopen( "../_headers/credentials.txt", "r" );
    while( !feof($file) ){
    echo fgets($file)."<br>";
}
// echo $file;
// echo fread($file, filesize("../_headers/credentials.txt"));