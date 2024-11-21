<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia - Services</title>
    <link rel="stylesheet" href="../../css/main/habitats.css">
    <script src="../../js/habitats/targetValue.js" defer></script>
    <script src="../../js/habitats/showAnimalReport.js" defer></script>
</head>
<body>
<?php require_once(__DIR__ . '../../header-footer/header.php')?>

    <main id="scrolldown" class="main">
        <div class="cardsContainer">
            <?php require_once(__DIR__ . '../../../../src/insertHabitats.php')?>
        </div>
        <div class="animalsCard">
            <?php require_once(__DIR__ . '../../../../src/insertAnimals.php')?>
        </div>

    </main>

    <?php require_once(__DIR__ . '../../header-footer/footer.php')?>
</body>
</html>