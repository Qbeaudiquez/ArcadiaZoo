<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia -Accueil</title>
    <link rel="stylesheet" href="/zoo-arcadia/public/css/main/config.css">
    <link rel="stylesheet" href="/zoo-arcadia/public/css/main/index.css">
    <script src="/zoo-arcadia/public/js/main/carousel.js" defer></script>
</head>
<body>
<?php require_once(__DIR__ . "/../header-footer/header.php"); ?>
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

                <a href="../services/restaurant.php"><img src="/zoo-arcadia/asset/img_service/restaurant.png" alt="Photo de notre restaurant" class="carousel-image active" data-title="Notre restaurant"></a>

                <a href="../services/train.php"><img src="/zoo-arcadia/asset/img_service/petit-train.png" alt="Photo du petit train" class="carousel-image" data-title="Tour du parc en un petit train"></a>

                <a href="../services/guide.php"><img src="/zoo-arcadia/asset/img_service/guide-touristique.png" alt="Photo du guide touristique" class="carousel-image" data-title="Faite une visite guidé avec notre équipe de soigneur"></a>

                <div class="title-img"></div>
                  
            </div>
        </div>

            <!-- Second carousel -->

        <div class="carousel-container carousel-container2">
            
            <div class="carousel" id="carousel2">

                <button class="btn before"><img src="/zoo-arcadia/asset/icon/arrow-left.svg" alt="Bouton précédent"></button>

                <button class="btn after"><img src="/zoo-arcadia/asset/icon/arrow-right.svg" alt="Bouton suivant"></button>

                <a href="/zoo-arcadia/public/html/main/habitats.php"><img src="/zoo-arcadia/asset/img_habitats/desertaustralienvertical.jpeg" alt="Photo du desert australien" class="carousel-image active" data-title="Desert Australien"></a>

                <a href="/zoo-arcadia/public/html/main/habitats.php"><img src="/zoo-arcadia/asset/img_habitats/foretfrancaisevertical.jpeg" alt="Photo de la fôret francaise" class="carousel-image" data-title="Fôret Française"></a>

                <a href="/zoo-arcadia/public/html/main/habitats.php"><img src="/zoo-arcadia/asset/img_habitats/foretnordiquevertical.jpeg" alt="Photo de la fôret nordique" class="carousel-image" data-title="Fôret Nordique"></a>

                <a href="/zoo-arcadia/public/html/main/habitats.php"><img src="/zoo-arcadia/asset/img_habitats/montagnevertical.jpeg" alt="Photo de la montagne" class="carousel-image" data-title="Montagne"></a>

                <a href="/zoo-arcadia/public/html/main/habitats.php"><img src="/zoo-arcadia/asset/img_habitats/savanevertical.jpeg" alt="Photo de la savane" class="carousel-image" data-title="Savane "></a>

                <div class="title-img"></div>
                  
            </div>

            <div class="text-carousel">
                <h2>Habitats</h2>
                <p>Venez decouvrir nos animaux du parc à travers leur habitat</p>
            </div>
            
        </div>
        <div class="review">

            <div class="randomReview">

                <h3>Elodie</h3>
                <p>Nous avons passez un magnifique moment d’évasion en famille. Le personnel est adorable et on sent que les animaux sont bien traité </br>
                Je recommande </p>
                <div>
                    <img src="/zoo-arcadia/asset/icon/staryellow.svg" class="" alt="">
                    <img src="/zoo-arcadia/asset/icon/staryellow.svg" class="" alt="">
                    <img src="/zoo-arcadia/asset/icon/staryellow.svg" class="" alt="">
                    <img src="/zoo-arcadia/asset/icon/staryellow.svg" class="" alt="">
                    <img src="/zoo-arcadia/asset/icon/staryellow.svg" class="" alt="">
                </div>
                
            </div>
            <form class="reviewForm">
                <div class="reviewName">
                  <label for="name">Entrer votre nom : </label>
                  <input type="" name="name" id="name"  required />
                </div>
                <div class="reviewInput">
                  <label for="reviewInput">Donnez votre avis : </label>
                  <textarea name="reviewInput" id="reviewInput" rows="10" required></textarea>
                </div>

                <div class="starReviewContainer">
                    
                    <input type="radio" name="star" id="star1">
                    <label for="star1" class="star">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#dac50a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    </label>

                    <input type="radio" name="star" id="star2">
                    <label for="star2" class="star">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#dac50a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    </label>

                    <input type="radio" name="star" id="star3">
                    <label for="star3" class="star">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#dac50a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    </label>
                    
                    <input type="radio" name="star" id="star4">
                    <label for="star4" class="star">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#dac50a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    </label>
                    
                    <input type="radio" name="star" id="star5">
                    <label for="star5" class="star">
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