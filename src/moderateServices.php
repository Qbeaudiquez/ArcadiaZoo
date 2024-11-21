<?php require_once(__DIR__ . "/../public/html/header-footer/header.php"); ?>

<?php

$postData = $_POST;

// Delete service
if($postData["action"] === "delete"){
    $id = (int)$_POST['id'];
    $stmt = $mysqlClient->prepare("DELETE FROM service WHERE service_id = :id");
    $stmt->execute([':id' => $id]);
    unlink("../asset/img_service/service{$id}.png");
}

// Edit service
if (isset($postData["serviceName"]) && isset($postData["serviceDesc"])) {
    $id = (int)$_POST['id'];
    $stmt = $mysqlClient->prepare("
        UPDATE service 
        SET name = :serviceName, description = :serviceDesc 
        WHERE service_id = :id
    ");


    $stmt->execute([
        ':serviceName' => $postData['serviceName'],
        ':serviceDesc' => $postData['serviceDesc'],
        ':id' => $id
    ]);
}

if(isset($_FILES["image"])){
    $postFiles = $_FILES["image"];
    $fileTmpPath = $postFiles["tmp_name"];
    $fileOriginalName = $postFiles['name'];
    $fileExtension = "png";

    $newFileName = "service{$id}." . $fileExtension;
    $uploadDir = '../asset/img_service/';
    $uploadFilePath = $uploadDir . $newFileName;
    move_uploaded_file($fileTmpPath, $uploadFilePath);
}

// Make new service

if(isset($postData["newServiceName"]) 
&& isset($postData["newServiceDesc"]) 
&& isset($_FILES["newImage"])){
    $newPostFiles = $_FILES["newImage"];
    $name = $postData["newServiceName"];
    $description = $postData["newServiceDesc"];

    try{
        $serviceStatement = $mysqlClient->prepare("INSERT INTO service (name, description) VALUES (:name, :description)");
        $serviceStatement->execute([
            ':name' => $name,
            ':description' => $description
        ]);
    }catch(PDOException $exception){
        echo "<script>alert('Une erreur est survenue : {$exception->getMessage()}')</script>";
    }

    $newId = $mysqlClient->lastInsertId();

    $fileTmpPath = $newPostFiles["tmp_name"];
    $fileOriginalName = $newPostFiles['name'];

    $newFileName = "service{$newId}." . "png";
    $uploadDir = '../asset/img_service/';
    $uploadFilePath = $uploadDir . $newFileName;
    move_uploaded_file($fileTmpPath, $uploadFilePath);
}

// Return dashbord

header('Location: ' . $_SERVER['HTTP_REFERER'] . '#serviceAncor');
exit;
?>
