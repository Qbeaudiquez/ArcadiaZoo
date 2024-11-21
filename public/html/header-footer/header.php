<!-- Start session -->
<?php session_start();?>


<!-- Initialization script php -->
<?php require_once(__DIR__ . "../../../../src/variables.php"); ?>


<!-- Initialization script js -->

<script src="../../js/header/connexion.js" defer></script>
<script src="../../js/header/scrollbar.js" defer></script>
<script src="../../js/header/burgermenu.js" defer></script>

<!-- Initialization header css -->
<link rel="stylesheet" href="../../css/main/config.css">
<link rel="stylesheet" href="../../css/header-footer/header.css">

<!-- Initialization go up -->

<a href="#scrollup"><img src="../../../asset/icon/arrow-up-circle.svg" alt="" class="goup"></a>

<!-- Header -->

<header class="header">
    

    <div class="burger-menu"><img class="imgBurgerMenu" src="../../../asset/icon/menu.svg" alt="Menu principale"></div>

    <img class="small-logo" src="../../../asset/logo/small-logo.svg" alt="Petit logo">

    <nav>
        <ul class="navbar">
            <li><a id="home" href="index.php" class="link">Accueil</a></li>
            <li><a id="services" href="services.php?service=services#scrolldown" class="link">Services</a></li>
            <li><a id="habits" href="habitats.php?habitat=habitats#scrolldown" class="link">Habitats</a></li>
            <li><a id="contact" href="contact.php#scrolldown" class="link">Contact</a></li>
            <?php require_once(__DIR__ . "../../../../src/login.php"); ?>
            
        </ul>
    </nav>            
</header>

<section  id="scrollup" class="hero">

    <div class="hero-container">

        <div class="logo"><a href="index.php"><img src="../../../asset/logo/Logo.svg" alt="Image du logo"></a></div>
        <h1>Zoo Arcadia</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis similique dolorem unde molestias modi eveniet. Ab, quasi autem sed, nemo laborum cupiditate mollitia obcaecati ex necessitatibus aliquid perferendis deserunt aspernatur!
        </p>

    </div>

    <div class="cta">

        <a href="#scrolldown" class="scrollArrow"><img src="../../../asset/icon/arrow-down.svg" alt="" class="arrow-down"></a>
        <p>Faites défiler vers le bas pour en voir plus !</p>

    </div>
</section>
