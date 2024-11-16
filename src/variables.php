<?php require_once(__DIR__ . "/../config/mysql.php"); ?>
<?php require_once(__DIR__ . "/databaselogin.php"); ?>

<?php


$usersStatement = $mysqlClient->prepare('SELECT * FROM user');
$usersStatement->execute();
$users = $usersStatement->fetchAll();


$rolesStatement = $mysqlClient->prepare('SELECT * FROM role');
$rolesStatement->execute();
$roles = $rolesStatement->fetchAll();

$reviewsStatement = $mysqlClient->prepare('SELECT * FROM review ORDER BY review_id DESC LIMIT 10');
$reviewsStatement->execute();
$reviews = $reviewsStatement->fetchAll();