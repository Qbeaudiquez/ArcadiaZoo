<?php

try{
    $mysqlClient = new PDO(
        sprintf('mysql:host=%s;dbname=%s;port=%s;charset=utf8', $hostname, $database, $port),
        $username,
        $password
    );
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $exception){
    die('Erreur : ' . $exception->getMessage());
}