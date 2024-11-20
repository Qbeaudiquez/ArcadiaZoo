<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
    <script src="/zoo-arcadia/public/js/main/ratingStar.js" ></script>
    <script src="../../js/dashbord/searchReportInput.js" defer></script>
    <link rel="stylesheet" href="../../css/main/dashbord.css">
</head>
<body>
<?php require_once(__DIR__ . "/../header-footer/header.php"); ?>
<?php 
    $adminAccess = $_SESSION['LOGGED_ROLE_ID'] === 1;
    $vetAccess = $_SESSION['LOGGED_ROLE_ID'] === 2;
    $employeAcces = $_SESSION['LOGGED_ROLE_ID'] === 3; 
?>



<main id="scrolldown" class="main">
<?php if(isset($_SESSION['LOGGED_ROLE_ID'])) : ?>
<nav class="navbarDashbord">
    <ul>
        <?php if($adminAccess):?>

            <li title="Avis">
                <a href="dashbord.php?service=dashbord&habitat=dashbord#reviewAncor" class="navlinkDashbord">
                    <img src="../../../asset/icon/message-circle.svg" alt="icon nouveau comentaire">
                </a>
            </li title="Services">
            <li><a href="dashbord.php?service=dashbord&habitat=dashbord#serviceAncor" class="navlinkDashbord">
                    <img src="../../../asset/icon/truck.svg" alt="icon service">
                </a>
            </li>
            <li title="Nouvel utilisateur">
                <a href="dashbord.php?service=dashbord&habitat=dashbord#newUserAncor" class="navlinkDashbord">
                    <img src="../../../asset/icon/user-plus.svg" alt="icon nouvel utilisateur">  
                </a>
            </li>
            <li title="Habitats">
                <a href="dashbord.php?service=dashbord&habitat=dashbord#habitatAncor" class="navlinkDashbord">
                    <img src="../../../asset/icon/home (1).svg" alt="icon habitat'">  
                </a>
            </li>
            <li title="Animaux">
                <a href="dashbord.php?service=dashbord&habitat=dashbord#animalAncor" class="navlinkDashbord">
                    <img src="../../../asset/icon/twitter.svg" alt="icon animaux">  
                </a>
            </li>
            <li title="Rapport du vétérinaire">
                <a href="dashbord.php?service=dashbord&habitat=dashbord#reportAncor" class="navlinkDashbord">
                    <img src="../../../asset/icon/book-open.svg" alt="icon raport">  
                </a>
            </li>
        <?php elseif($employeAcces):?>
            <li><a href="dashbord.php?service=dashbord&habitat=dashbord#reviewAncor" class="navlinkDashbord">Avis</a></li>
            <li><a href="dashbord.php?service=dashbord&habitat=dashbord#serviceAncor" class="navlinkDashbord">Services</a></li>
            <li><a href="dashbord.php?service=dashbord&habitat=dashbord#animalAncor" class="navlinkDashbord">Animaux</a></li>
        <?php elseif($vetAccess):?>
            <li><a href="dashbord.php?service=dashbord&habitat=dashbord#habitatAncor" class="navlinkDashbord">Habitats</a></li>
            <li><a href="dashbord.php?service=dashbord&habitat=dashbord#reportAncor" class="navlinkDashbord">Rapport du vétérinaire</a></li>
        <?php endif?>
    </ul>
</nav>




<!-- Reviews -->
    <h3 class="containerTitle" id="reviewAncor">Avis</h3>
    <?php if((isset($adminAccess) || isset($employeAcces)) && ($adminAccess || $employeAcces)): ?>
        
        <?php
            
            $unmoderatedReviews = array_filter($reviews, function($review) {
                return $review["isVisible"] === 0;
            });

            
            if (empty($unmoderatedReviews)): ?>
            <div class='dashbordContainer'>
                <p class="noReview">Aucun avis en attente de modération.</p>
            </div>
                    
        <?php else: ?>
            <div class='dashbordContainer reviews'>
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
<?php if($adminAccess || $employeAcces):?>
    <h3 class="containerTitle" id="serviceAncor">Services</h3>
    <div class='dashbordContainer services'>
    <div class="serviceContainer">
        <?php require_once(__DIR__ . "/../../../src/insertServices.php"); ?>
    </div>

<!-- Créer un nouveau compte -->
<div class="makeContainer">
    <h3>Créer un nouveau service</h3>
    <form class="makeServiceForm formulaire" action="../../../src/moderateServices.php" method="post" enctype="multipart/form-data">

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

<?php if($adminAccess):?>
    <h3 class="containerTitle" id="newUserAncor">Créer un nouvel utilisateur</h3>
    <?php require_once(__DIR__ . "/../../../src/insertUserCreation.php"); ?>
<?php endif?>

<!-- Habitat -->
<?php if($adminAccess || $vetAccess):?>
    <h3 class="containerTitle" id="habitatAncor">Habitats</h3>
<div class="dashbordContainer habitat">
    <div class="habitatContainer">
        <?php require_once(__DIR__ . "/../../../src/insertHabitats.php"); ?>
    </div>
    <?php if($adminAccess):?>
    <div class="makeContainer">
    <h3>Créer un nouveau habitat</h3>
    <form class="makeHabitatForm formulaire" action="../../../src/moderateHabitat.php" method="post" enctype="multipart/form-data">

        <label for="newHabitatName">Nom de l'habitat</label>
        <input type="text" name="newHabitatName" id="newHabitatName" required>

        <label for="newHabitatDesc">Description</label>
        <textarea name="newHabitatDesc" id="newHabitatDesc" required></textarea>

        <label for="newImage">Choisir une image :</label>
        <input type="file" name="newHabitatImage" id="newHabitatImage" accept="image/*">
        <button type="submit">Créer</button>
    </form>
</div>

<?php endif?>
</div>
<?php endif?>

<!-- Animals -->

<?php if($adminAccess || $employeAcces || $vetAccess):?>
    <h3 class="containerTitle" id="animalAncor">Animaux</h3>
    <div class="dashbordContainer animals">
        <div class="searchInputcontainer">
            <h4>Recherchez un animal : </h4>
            <input type="text" name="" id="searchInput" placeholder="Nom de l'animal">
        </div>
        <?php require_once(__DIR__ . "/../../../src/insertAnimalForm.php"); ?>
        <?php if($adminAccess):?>
    
    <div class="makeContainer animal">
    <h3 >Créer un nouveau animal</h3>
    <form class="makeHabitatForm formulaire" action="../../../src/moderateAnimal.php" method="post" enctype="multipart/form-data">

        <label for="newAnimalName">Nom de l'animal:</label>
        <input type="text" name="newAnimalName" id="newAnimalName" required>

        <label for="newAnimalRace">Race : </label>
        <textarea name="newAnimalRace" id="newAnimalRace" required></textarea>

        <label for="newHabitatId">Habitat :</label>
        <select name="newHabitatId" id="newHabitatId">
            <?php foreach($habitats as $habitat):?>
                <option value="<?= $habitat["habitat_id"]?>"><?= $habitat["name"]?></option>
            <?php endforeach?>
        </select>

        <label for="newAnimalImage">Choisir une image :</label>
        <input type="file" name="newAnimalImage" id="newAnimalImage" accept="image/*">
        <button type="submit">Créer</button>
    </form>
</div>

<?php endif?>
    </div>
    </div>
<?php endif;?>

<!-- Report -->
<?php if($adminAccess || $vetAccess):?>
    <h3 class="containerTitle" id="reportAncor">Comptes rendu vétérinaire</h3>
    <div class="dashbordContainer report">
        <div class="seachReportInputContainer">
            <h4>Filtrer par : </h4>
            <select id="seachReportInput">
                <option value="all" default>Selectionnez un filtre : </option>
                <option value="name">Nom</option>
                <option value="date">Date</option>
            </select>
        </div>
        <div class="reportContainer">
        <?php foreach($reports as $report):?>
            <?php foreach($animals as $animal):?>
                <?php if($animal["animal_id"] === $report["animal_id"]):?>
            <div class="report allReports" data-date="<?= $report["date"]?>" data-name="<?= $animal["name"]?>">
                    <div class="reportInfo" >
                        <h4>Nom : </h4>
                        <p><?= $animal["name"]?></p>
                    </div>
                    <div class="reportInfo">
                        <h4>Etat : </h4>
                        <p><?= $report["etat"]?></p>
                    </div>
                    <div class="reportInfo">
                        <h4>Detail : </h4>
                        <p><?= $report["detail"]?></p>
                    </div>
                    <div class="reportInfo">
                        <h4>Nouriture recommandé : </h4>
                        <p><?= $report["food"]?></p>
                    </div>
                    <div class="reportInfo">
                        <h4>Quantité journalière : </h4>
                        <p><?= $report["weight"]?></p>
                    </div>
                    <div class="reportInfo">
                        <h4>Dernier passage : </h4><p><?= $report["date"]?>
                    </p>
                </div>
            </div>
            <?php endif;?>
            <?php endforeach?> 
        <?php endforeach?>    
        </div>
    </div>
<?php endif;?>
<?php else :?>
  <?=  "<div class='dashbordContainer reviews'><p>Veuillez vous connecter</p></div>"?>

<?php endif;?>








</main>
<?php require_once(__DIR__ . "/../header-footer/footer.php"); ?>
</body>
</html>
