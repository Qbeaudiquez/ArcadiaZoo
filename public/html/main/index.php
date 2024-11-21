<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia -Accueil</title>
    <link rel="stylesheet" href="/zoo-arcadia/public/css/main/index.css">
    <script src="/zoo-arcadia/public/js/main/carousel.js" defer></script>
    <script src="/zoo-arcadia/public/js/main/ratingStar.js"></script>
</head>
<body>
<?php require_once(__DIR__ . "/zoo-arcadia/public/html/header-footer/header.html"); ?>
    <main id="scrolldown" class="main">

            <!-- First carousel -->

        <div class="carousel-container">
            <div class="text-carousel">
                <h2>Services</h2>
                <p>Venez decouvrir tous nos services du parc</p>
            </div>
            <div class="carousel" id="carousel1">

                <button class="btn before"><img src="/zoo-arcadia/asset/icon/arrow-left.svg" alt="Bouton précédent"></button>

                <button class="btn after"><img src="/zoo-arcadia/asset/icon/arrow-right.svg" alt="Bouton suivant"></button>

                <?php foreach($services as $service):?>
                    <a href="../main/services.php?service=service<?= $service['service_id']?>#scrolldown"><img src="../../../asset/img_service/service<?= $service['service_id']?>.png" alt="Photo <?= $service['name']?>" class="carousel-image active" data-title="<?= $service['name']?>"></a>
                <?php endforeach ?>

                <div class="title-img"></div>
                  
            </div>
        </div>

            <!-- Second carousel -->

        <div class="carousel-container carousel-container2">
            
            <div class="carousel" id="carousel2">

                <button class="btn before"><img src="/zoo-arcadia/asset/icon/arrow-left.svg" alt="Bouton précédent"></button>

                <button class="btn after"><img src="/zoo-arcadia/asset/icon/arrow-right.svg" alt="Bouton suivant"></button>

                <?php foreach($habitats as $habitat):?>
                    <a href="../main/habitats.php?habitat=habitat<?= $habitat['habitat_id']?>#scrolldown"><img src="../../../asset/img_habitats/habitat<?= $habitat['habitat_id']?>.png" alt="Photo <?= $habitat['name']?>" class="carousel-image active" data-title="<?= $habitat['name']?>"></a>
                <?php endforeach ?>

                <div class="title-img"></div>
                  
            </div>

            <div class="text-carousel">
                <h2>Habitats</h2>
                <p>Venez decouvrir nos animaux du parc à travers leur habitat</p>
            </div>
            
        </div>
        <div class="review" id="formAnchor">
                    <h3 style="margin-top: 50px; color:var(--second-color)">Ce qu'ils pensent de nous : </h3>
            <div class="randomReview">
                
            <?php require_once(__DIR__ . "../../../../src/insertReview.php"); ?>
            </div>

            <?php require_once(__DIR__ . "../../../../src/review.php"); ?>
                    <h3 style="margin-top:20px; color:var(--second-color)">Hesitez pas a nous laisser un avis : </h3>
            <form class="reviewForm" action="index.php#formAnchor" method="post">
                <div class="reviewName">
                  <label for="pseudo">Entrer votre nom : </label>
                  <input type="text" name="pseudo" id="pseudo"  required />
                </div>
                <div class="reviewInput">
                  <label for="reviewInput">Donnez votre avis : </label>
                  <textarea name="reviewInput" id="reviewInput" rows="10" maxlength="150" required></textarea>
                </div>

                <div class="starReviewContainer">
                    
                    <input type="radio" name="star5" id="star5" >
                    <label for="star5" class="star">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#dac50a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    </label>

                    <input type="radio" name="star4" id="star4" >
                    <label for="star4" class="star">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#dac50a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    </label>

                    <input type="radio" name="star3" id="star3" >
                    <label for="star3" class="star">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#dac50a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    </label>
                    
                    <input type="radio" name="star2" id="star2">
                    <label for="star2" class="star">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#dac50a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    </label>
                    
                    <input type="radio" name="star1" id="star1">
                    <label for="star1" class="star">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#dac50a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    </label>
                </div>

                <div class="reviewSubmit">
                  <input type="submit" value="Soumettre" />
                </div>
              </form>
              
        </div>
    </main>
    <?php require_once(__DIR__ . "/../header-footer/footer.php"); ?>
</body>
</html>