<?php require_once(__DIR__ . "/../public/html/header-footer/header.php"); ?>

<?php

if(isset($_SESSION["LOGGED_USER"])){
    $username =$_SESSION["LOGGED_USER"];
}

if(isset($_POST)){
    $postData = $_POST;
}

if(isset($_POST['id'])){
    $id = (int)$_POST['id'];
}

// Delete animal
if(isset($postData["action"])){
    $stmt = $mysqlClient->prepare("DELETE FROM animal WHERE animal_id = :id");
    $stmt->execute([':id' => $id]);
    
    $stmtTargetValue = $mysqlClient->prepare("DELETE FROM target_value WHERE animal_id = :id");
    $stmtTargetValue->execute([':id' => $id]);
    unlink("../asset/img_animals/{$id}.png");
}

// Edit animal
if (isset($postData["animalName"]) && isset($postData["animalRace"])) {
    $stmt = $mysqlClient->prepare("
        UPDATE animal 
        SET name = :animalName, 
            race = :animalRace 
        WHERE animal_id = :id
    ");


    $stmt->execute([
        ':animalName' => $postData['animalName'],
        ':animalRace' => $postData['animalRace'],
        ':id' => $id
    ]);
}

if(isset($_FILES["imgAnimal"])){
    $postFiles = $_FILES["imgAnimal"];
    $fileTmpPath = $postFiles["tmp_name"];
    $fileExtension = "png";

    $newFileName = "{$id}." . $fileExtension;
    $uploadDir = '../asset/img_animals/';
    $uploadFilePath = $uploadDir . $newFileName;
    move_uploaded_file($fileTmpPath, $uploadFilePath);
}


// Mise à jour du rapport employé
if (isset($postData["lastMeal"]) || isset($postData["lastMealDate"])) {
    // Si lastMeal est vide, on passe à NULL
    $lastMeal = !empty($postData['lastMeal']) ? $postData['lastMeal'] : NULL;
    $lastMealDate = !empty($postData['lastMealDate']) ? $postData['lastMealDate'] : NULL;
    
// Vérifier si un enregistrement existe
$stmt = $mysqlClient->prepare("SELECT * FROM employe_report WHERE animal_id = :id");
$stmt->execute([':id' => $id]);
$record = $stmt->fetch();

if ($record) {
    // Si un enregistrement existe, on fait une mise à jour
    $stmt = $mysqlClient->prepare("
        UPDATE employe_report 
        SET last_meal = :lastMeal, 
            last_passage = :lastMealDate 
        WHERE animal_id = :id
    ");
} else {
    // Si aucun enregistrement n'existe, on insère
    $stmt = $mysqlClient->prepare("
        INSERT INTO employe_report (animal_id, last_meal, last_passage) 
        VALUES (:id, :lastMeal, :lastMealDate)
    ");
}

// Exécuter la requête
$stmt->execute([
    ':id' => $id,
    ':lastMeal' => $lastMeal,
    ':lastMealDate' => $lastMealDate
]);
}

// Mise à jour ou insertion dans le rapport vétérinaire
if (
    isset($postData["animalEtat"]) || 
    isset($postData["animalDetail"]) || 
    isset($postData["lastPassage"]) || 
    isset($postData["food"]) || 
    isset($postData["weight"])
) {
    // Initialisation des valeurs avec `NULL` si les champs sont vides
    
    $animalEtat = !empty($postData['animalEtat']) ? $postData['animalEtat'] : NULL;
    $animalDetail = !empty($postData['animalDetail']) ? $postData['animalDetail'] : NULL;
    $lastPassage = !empty($postData['lastPassage']) ? $postData['lastPassage'] : NULL;
    $food = !empty($postData['food']) ? $postData['food'] : NULL;
    $weight = !empty($postData['weight']) ? $postData['weight'] : NULL;

    try {
        // Vérifier si un enregistrement existe pour l'animal_id donné
        $stmt = $mysqlClient->prepare("SELECT * FROM veteninary_report WHERE animal_id = :id");
        $stmt->execute([':id' => $id]);
        $record = $stmt->fetch();


        if ($record) {
            // Si un enregistrement existe, effectuer une mise à jour
                 $stmt = $mysqlClient->prepare("
                UPDATE veteninary_report 
                SET username = :username,
                    date = :lastPassage,
                    etat = :animalEtat, 
                    detail = :animalDetail,
                    food = :food,
                    weight = :weight
                WHERE animal_id = :id
            ");
                            

            
            
        } else {
            // Si aucun enregistrement n'existe, insérer une nouvelle ligne
            $stmt = $mysqlClient->prepare("
                                INSERT INTO veteninary_report (username,animal_id, date, etat, detail, food, weight) 
                                VALUES (:username,:id, :lastPassage, :animalEtat, :animalDetail, :food, :weight)
                            ");
            
            
            
        }

        // Exécuter la requête
        $stmt->execute([
            ':username' => $username,
            ':id' => $id,
            ':lastPassage' => $lastPassage,
            ':animalEtat' => $animalEtat,
            ':animalDetail' => $animalDetail,
            ':food' => $food,
            ':weight' => $weight
        ]);
    } catch (PDOException $exception) {
        echo "<script>alert('Une erreur est survenue : {$exception->getMessage()}')</script>";
    }
}






// Make new animal

if(isset($postData["newAnimalName"]) 
&& isset($postData["newAnimalRace"]) 
&& isset($_FILES["newAnimalImage"])){
    $newPostFiles = $_FILES["newAnimalImage"];
    $name = $postData["newAnimalName"];
    $race = $postData["newAnimalRace"];
    $habitatId = (int)$postData["newHabitatId"];
    

    try{

        $animalStatement = $mysqlClient->prepare("INSERT INTO animal (name, race, habitat_id) VALUES (:name, :race, :habitat_id)");
        $animalStatement->execute([
            ':name' => $name,
            ':race' => $race,
            'habitat_id' => $habitatId
        ]);
    }catch(PDOException $exception){
        echo "<script>alert('Une erreur est survenue : {$exception->getMessage()}')</script>";
    }

    $newId = $mysqlClient->lastInsertId();

    try{

        $valueStatement = $mysqlClient->prepare("INSERT INTO target_value ( animal_id) VALUES (:animal_id)");
        $valueStatement->execute([
            'animal_id' => $newId
        ]);
    }catch(PDOException $exception){
        echo "<script>alert('Une erreur est survenue : {$exception->getMessage()}')</script>";
    }


    $fileTmpPath = $newPostFiles["tmp_name"];
    $newFileName = "{$newId}." . "png";
    $uploadDir = '../asset/img_animals/';
    $uploadFilePath = $uploadDir . $newFileName;
    move_uploaded_file($fileTmpPath, $uploadFilePath);
}

// Return dashbord

header('Location: ' . $_SERVER['HTTP_REFERER'] . '#animalAncor');
exit;
?>