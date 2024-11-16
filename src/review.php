<?php

$postData = $_POST;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($postData["pseudo"], $postData["reviewInput"]) && (
    isset($postData["star1"]) ||
    isset($postData["star2"]) ||
    isset($postData["star3"]) ||
    isset($postData["star4"]) ||
    isset($postData["star5"]) 
)){
    $pseudo = htmlspecialchars($postData["pseudo"]);
    $review = htmlspecialchars($postData["reviewInput"]);

    if (isset($postData["star1"])) {
        $rating = 1;
    } elseif (isset($postData["star2"])) {
        $rating = 2;
    } elseif (isset($postData["star3"])) {
        $rating = 3;
    } elseif (isset($postData["star4"])) {
        $rating = 4;
    } elseif (isset($postData["star5"])) {
        $rating = 5;
    }

    try{
        $reviewStatement = $mysqlClient->prepare("INSERT INTO review (pseudo, review, rating, isVisible) VALUES (:pseudo, :review, :rating, :isVisible)");
        $reviewStatement->execute([
            ':pseudo' => $pseudo,
            ':review' => $review,
            ':rating' => $rating,
            ':isVisible' => 0
        ]);
        echo "<div class='successMessage' style='
            color:darkgreen;'>
            Avis soumis avec succès !</div>";
    }catch(PDOException $exception ){
        echo "<div class='successMessage' style='
            color:darkred;'>
            Une erreur est survenue : " . $exception->getMessage() . "</div>";
    }

}elseif(
    isset($postData["pseudo"]) &&
    !isset($postData["star1"]) &&
    !isset($postData["star2"]) &&
    !isset($postData["star3"]) &&
    !isset($postData["star4"]) &&
    !isset($postData["star5"]) 
){
    echo "<div class='errorMessage' style='
    color:darkred;'>
    Veuillez saisir une note pour valider le formulaire</div>";
}
}

