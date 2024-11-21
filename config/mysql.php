<?php

if(getenv('JAWSDB_URL') !== false){
    $url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');
}else{
    $hostname = 'localhost';
$port = 3306;
$database = 'zoo_arcadia';
$username = 'root';
$password = '';
}

