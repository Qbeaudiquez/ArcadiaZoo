<?php require_once(__DIR__ . "../../public/html/header-footer/header.php"); ?>

<?php

$postData = $_POST;

// Delete habitat
if(isset($postData["action"])){
    $id = (int)$_POST['id'];
    $stmt = $mysqlClient->prepare("DELETE FROM habitat WHERE habitat_id = :id");
    $stmt->execute([':id' => $id]);
    unlink("../asset/img_habitats/habitat{$id}.png");
}

// Edit habitat
if (isset($postData["habitatName"]) && isset($postData["habitatDesc"])) {
    $id = (int)$_POST['id'];
    $stmt = $mysqlClient->prepare("
        UPDATE habitat 
        SET name = :habitatName, description = :habitatDesc 
        WHERE habitat_id = :id
    ");


    $stmt->execute([
        ':habitatName' => $postData['habitatName'],
        ':habitatDesc' => $postData['habitatDesc'],
        ':id' => $id
    ]);
}

if(isset($_FILES["imageHabitat"])){
    $postFiles = $_FILES["imageHabitat"];
    $fileTmpPath = $postFiles["tmp_name"];
    $fileExtension = "png";

    $newFileName = "habitat{$id}." . $fileExtension;
    $uploadDir = '../asset/img_habitats/';
    $uploadFilePath = $uploadDir . $newFileName;
    move_uploaded_file($fileTmpPath, $uploadFilePath);
}

// Make new habitat

if(isset($postData["newHabitatName"]) 
&& isset($postData["newHabitatDesc"]) 
&& isset($_FILES["newHabitatImage"])){
    $newPostFiles = $_FILES["newHabitatImage"];
    $name = $postData["newHabitatName"];
    $description = $postData["newHabitatDesc"];

    try{
        $habitatStatement = $mysqlClient->prepare("INSERT INTO habitat (name, description) VALUES (:name, :description)");
        $habitatStatement->execute([
            ':name' => $name,
            ':description' => $description
        ]);
    }catch(PDOException $exception){
        echo "<script>alert('Une erreur est survenue : {$exception->getMessage()}')</script>";
    }

    $newId = $mysqlClient->lastInsertId();

    $fileTmpPath = $newPostFiles["tmp_name"];
    $newFileName = "habitat{$newId}." . "png";
    $uploadDir = '../asset/img_habitats/';
    $uploadFilePath = $uploadDir . $newFileName;
    move_uploaded_file($fileTmpPath, $uploadFilePath);
}

// Edit habitat comment

if(isset($postData["habitatCommentaire"])){
    $id = (int)$_POST['id'];
    $comentStatement = $mysqlClient->prepare('UPDATE habitat SET comment = :comment WHERE habitat_id = :id');
    $comentStatement->execute([
        ":comment" => $postData["habitatCommentaire"],
        ":id" => $id
    ]);
}

// Return dashbord

header('Location: ' . $_SERVER['HTTP_REFERER'] . '#habitatAncor');
exit;
?>
