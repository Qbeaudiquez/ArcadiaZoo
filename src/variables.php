<?php require_once(__DIR__ . "/../config/mysql.php"); ?>
<?php require_once(__DIR__ . "/databaselogin.php"); ?>

<?php

function fetchData(PDO $mysqlClient, string $querry) : array{
    $statement = $mysqlClient->prepare($querry);
    $statement->execute();
    $table = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $table;
}

$users = fetchData($mysqlClient, 'SELECT * FROM user');
$roles = fetchData($mysqlClient, 'SELECT * FROM role');
$reviews = fetchData($mysqlClient, 'SELECT * FROM review ORDER BY review_id DESC LIMIT 10');
$services = fetchData($mysqlClient, 'SELECT * FROM service');