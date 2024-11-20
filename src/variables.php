<?php require_once(__DIR__ . "/../config/mysql.php"); ?>
<?php require_once(__DIR__ . "/databaselogin.php"); ?>

<?php
if(isset($_GET["habitat"])){
    $dashbordAcess = $_GET["habitat"] === "dashbord";
    }

?>

<?php

function fetchData(PDO $mysqlClient, string $querry) : array{
    try{
        $statement = $mysqlClient->prepare($querry);
    $statement->execute();
    $table = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $table;
    }catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
    
}

$users = fetchData($mysqlClient, 'SELECT * FROM user');
$roles = fetchData($mysqlClient, 'SELECT * FROM role');
$reviews = fetchData($mysqlClient, 'SELECT * FROM review ORDER BY review_id DESC LIMIT 10');
$services = fetchData($mysqlClient, 'SELECT * FROM service');
$habitats = fetchData($mysqlClient, 'SELECT * FROM habitat');
$animals = fetchData($mysqlClient, 'SELECT * FROM animal');
$reports = fetchData($mysqlClient, 'SELECT * FROM veteninary_report');
$employeReports = fetchData($mysqlClient, 'SELECT * FROM employe_report');
$targets = fetchData($mysqlClient, 'SELECT * FROM target_value');

