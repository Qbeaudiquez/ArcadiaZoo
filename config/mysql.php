<?php

if(getenv('JAWSDB_URL') !== false){
    $url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');
}

const MYSQL_HOST = 'localhost';
const MYSQL_PORT = 3306;
const MYSQL_NAME = 'zoo_arcadia';
const MYSQL_USER = 'root';
const MYSQL_PASSWORD = '';