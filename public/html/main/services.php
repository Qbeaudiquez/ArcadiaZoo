<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia - Services</title>
    <link rel="stylesheet" href="/zoo-arcadia/public/css/main/config.css">
    <link rel="stylesheet" href="/zoo-arcadia/public/css/main/services.css">
</head>
<body>
    <?php require_once(__DIR__ . '/../header-footer/header.php')?>

    <main id="scrolldown" class=".main">
        <div class="cardsContainer">
            <?php require_once(__DIR__ . '/../../../src/insertServices.php')?>
        </div>        
    </main>

    <?php require_once(__DIR__ . '/../header-footer/footer.php')?>
</body>
</html>