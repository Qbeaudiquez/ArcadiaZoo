<?php
$usersStatement = $mysqlClient->prepare('SELECT * FROM user');
$usersStatement->execute();
$users = $usersStatement->fetchAll();


$roleStatement = $mysqlClient->prepare('SELECT * FROM role');
$roleStatement->execute();
$roles = $roleStatement->fetchAll();