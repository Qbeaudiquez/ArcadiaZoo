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
<main>
    <?php if($_SESSION['LOGGED_ROLE_ID'] === 1 || $_SESSION['LOGGED_ROLE_ID'] === 3): ?>
        
        <?php
            
            $unmoderatedReviews = array_filter($reviews, function($review) {
                return $review["isVisible"] === 0;
            });

            
            if (empty($unmoderatedReviews)): ?>
                    <p>Aucun avis en attente de modération.</p>
        <?php else: ?>
            <div class='dashbordReviewsContainer'>
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
</main>
<?php require_once(__DIR__ . "/../header-footer/footer.php"); ?>
</body>
</html>
