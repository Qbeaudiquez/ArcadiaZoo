<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
    <script src="/zoo-arcadia/public/js/main/ratingStar.js"></script>
    <link rel="stylesheet" href="../../css/main/dashbord.css">
</head>
<body>
<?php require_once(__DIR__ . "/../header-footer/header.php"); ?>
<?php if(isset($_SESSION['LOGGED_ROLE_ID'])) : ?>

<?php 
$adminAccess = $_SESSION['LOGGED_ROLE_ID'] === 1;
$vetAcces = $_SESSION['LOGGED_ROLE_ID'] === 2;
$employeAcces = $_SESSION['LOGGED_ROLE_ID'] === 3;
?>
<main id="scrolldown" class="main">
    


<!-- Reviews -->
    <h3>Avis</h3>
    <?php if($adminAccess || $employeAcces): ?>
        
        <?php
            
            $unmoderatedReviews = array_filter($reviews, function($review) {
                return $review["isVisible"] === 0;
            });

            
            if (empty($unmoderatedReviews)): ?>
            <div class='dashbordContainer reviews'>
                <p>Aucun avis en attente de modération.</p>
            </div>
                    
        <?php else: ?>
            <div class='dashbordContainer '>
                <?php foreach ($unmoderatedReviews as $review): ?>
                    <div class="reviewsContainer">
                    <div style="
                            display:flex; 
                            flex-direction:column;
                            gap:7px;
                            opacity:1;
                            padding:20px">

                        <h3 style="color:rgb(216, 227, 199);"> <?= htmlspecialchars($review["pseudo"]) ?></h3>
                        <p style="color:rgb(216, 227, 199);"> <?= $review["review"] ?></p>

                        <div id="rating-<?= $review['review_id'] ?>" class="rating">
                            <img class="star" src="../../../asset/icon/star.svg" alt="star">
                            <img class="star" src="../../../asset/icon/star.svg" alt="star">
                            <img class="star" src="../../../asset/icon/star.svg" alt="star">
                            <img class="star" src="../../../asset/icon/star.svg" alt="star">
                            <img class="star" src="../../../asset/icon/star.svg" alt="star">
                        </div>
                    </div>
                    <form method="POST" action="../../../src/moderateReview.php">
                        <input type="hidden" name="action" value="keep">
                        <input type="hidden" name="id" value="<?= $review['review_id'] ?>">
                        <button type="submit">Garder</button>
                    </form>
                    <form method="POST" action="../../../src/moderateReview.php">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?= $review['review_id'] ?>">
                        <button type="submit">Supprimer</button>
                    </form>
                    </div>
                    <script>
                        setRating(<?= $review['rating'] ?>, <?= $review['review_id'] ?>);
                    </script>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

<!-- Services -->
<h3>Services</h3>
<div class='dashbordContainer services'>
<?php if($adminAccess || $employeAcces):?>
    <div class="serviceContainer">
        <?php require_once(__DIR__ . "/../../../src/insertServices.php"); ?>
    </div>


<div class="makeContainer">
    <h3>Créer un nouveau service</h3>
    <form class="makeServiceForm" action="../../../src/moderateServices.php" method="post" enctype="multipart/form-data">

        <label for="newServiceName">Nom du service</label>
        <input type="text" name="newServiceName" id="newServiceName" required>

        <label for="newServiceDesc">Description</label>
        <textarea name="newServiceDesc" id="newServiceDesc" required></textarea>

        <label for="newImage">Choisir une image :</label>
        <input type="file" name="newImage" id="newImage" accept="image/*">
        <button type="submit">Créer</button>
    </form>
</div>
<?php endif;?>
</div>
<?php else :?>
  <?=  "<div class='dashbordContainer reviews'><p>Veuillez vous connecter</p></div>"?>

<?php endif;?>








</main>
<?php require_once(__DIR__ . "/../header-footer/footer.php"); ?>
</body>
</html>
