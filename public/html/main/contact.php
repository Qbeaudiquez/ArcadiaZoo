<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia - Contact</title>
    <link rel="stylesheet" href="/zoo-arcadia/public/css/main/config.css">
    <link rel="stylesheet" href="/zoo-arcadia/public/css/main/contact.css">
</head>
<body>

    <?php require_once(__DIR__ . '/../header-footer/header.php')?>

    <main id="scrolldown" class="main">
        <form class="formContact">

            <h3>Une question ? Un renseignement ? Laissez nous un message</h3>

            <fieldset class="identity">
                <legend>Votre identité<span>*</span></legend>
                <input type="text" name="name" id="name" placeholder="Nom" required>
                <input type="text" name="surname" id="surname" placeholder="Prénom" required>
            </fieldset>

            <fieldset class="email">
                <legend>Votre email<span>*</span></legend>
                <input type="email" name="email" id="email" required>
            </fieldset>

            <fieldset class="phone">
                <legend>Votre téléphone</legend>
                <input type="tel" name="phone" id="phone">
            </fieldset>

            <fieldset class="answer">
                <legend>Votre message<span>*</span></legend>
                <textarea name="answer" id="answer" required></textarea>
            </fieldset>
            <div class="confidentiality">
                <input type="checkbox" name="confidentiality" id="confidentiality" required>
                <label for="confidentiality"> J'accepte la <a href="">politique de confidentialité</a><span>*</span></label>
            </div>
            <input type="submit" value="Soumettre" class="contactBtn">
            <cite>* Champs obligatoires</cite>
        </form>
        <section class="localisation">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d9362.139190398111!2d4.837290891474207!3d45.76356150704808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1731006814287!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="infoContainer">
                <div class="infoIndividual">
                    <img src="/zoo-arcadia/asset/icon/map-pin.svg" alt="logo adresse">
                    <p>54 Avenue des platanes 69001 Lyon</p>
                </div>
                <div class="infoIndividual">
                    <img src="/zoo-arcadia/asset/icon/car-side-svgrepo-com.svg" alt="logo voiture" width="30px" height="30px">
                    <p>Acces direct par la rocade Est sortie 5</p>
                </div>
                <div class="infoIndividual">
                    <img src="/zoo-arcadia/asset/icon/bus-svgrepo-com.svg" alt="logo bus" width="30px" height="30px">
                    <p>
                        Accès tram T2 : Arret Jean Macé<br>
                        Accès métro b : Arrêt Jean Macé<br>
                        Accès bus 48 & C20 : Arrêt Bertelot
                    </p>
                </div>
            </div>
        </section>
    </main>

    <?php require_once(__DIR__ . '/../header-footer/footer.php')?>


</body>
</html>