<?php if(isset($_GET["habitat"])):?>
    
    <?php foreach($habitats as $habitat):?>
    <?php $habitat["identifier"] = "habitat{$habitat['habitat_id']}"?>
        

        <?php if($_GET["habitat"] === "habitats") : ?>
            <!-- Insert all habitats habitat page -->
            <div class="cards">
                <h3 class="cardTitle"><?= $habitat["name"]?></h3>
                <a href="habitats.php?habitat=<?= $habitat["identifier"]?>#scrolldown"><img class="cardImg" src="../../../asset/img_habitats/<?= $habitat["identifier"]?>.png" alt="photo <?= $habitat["name"]?>"></a>
            </div>
        <?php endif ?>

        <?php if($_GET["habitat"] === "dashbord" && ($adminAccess || $vetAccess)): ?>
            <!-- Insert all habitats dasbord page -->
            <div class="cardsAndFormulaire">
            <div class="cards">
                <h3 class="cardTitle"><?= $habitat["name"]?></h3>
                <img class="cardImg" src="../../../asset/img_habitats/<?= $habitat["identifier"]?>.png" alt="photo <?= $habitat["name"]?>">
                <p class="cardDesc"><?= $habitat["description"]?></p>
            </div>
            <form class="formulaire" action="../../../src/moderateHabitat.php" method="post">
                <label for="habitatCommentaire">Modifier le commentaire</label>
                <textarea name="habitatCommentaire" id="habitatCommentaire" rows="8"><?php if(isset($habitat["comment"])):?><?= $habitat["comment"]?><?php endif?></textarea>
                <input type="hidden" name="id" value="<?= $habitat['habitat_id'] ?>">
                <button type="submit">Modifier</button>
            </form>
                <?php if($adminAccess) : ?>
                    <div class="formulairesDiv">
                        <form class="editHabitatForm formulaire" method="POST" action="../../../src/moderateHabitat.php" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($habitat['habitat_id']); ?>">

                        <label for="habitatName">Nom de l'habitat</label>
                        <input type="text" name="habitatName" id="habitatName" value="<?= htmlspecialchars($habitat['name']); ?>" required>

                        <label for="habitatDesc">Description : </label>
                        <textarea name="habitatDesc" id="habitatDesc" rows="8" required><?= htmlspecialchars($habitat['description']); ?></textarea>

                        <label for="imageHabitat">Choisir une image :</label>
                        <input type="file" name="imageHabitat" id="imageHabitat" accept="image/*">

                        <button type="submit">Editer</button>
                    </form>
                    <form method="POST" action="../../../src/moderateHabitat.php">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?= $habitat['habitat_id'] ?>">
                        <button type="submit">Supprimer</button>
                    </form>
                </div>
                
                    
            
            <?php endif ?>
            </div>
            <?php endif ?>

        
        <?php if($_GET["habitat"] === $habitat["identifier"]) : ?>
            <!-- Insert one habitat -->
             <a class="backHabitatsLink" href="habitats.php?habitat=habitats#scrolldown"><img class="backHabitats" src="../../../asset/icon/x.svg" alt=""></a>
            <div class="cards">
                
                <h3 class="cardTitle"><?= $habitat["name"]?></h3>
                <a href="habitats.php?habitat=<?= $habitat["identifier"]?>"><img class="cardImg" src="../../../asset/img_habitats/<?= $habitat["identifier"]?>.png" alt="photo <?= $habitat["name"]?>"></a>
                <h4>Description : </h4>
                <p class="cardDesc"><?= $habitat["description"]?></p>
                <?php if(isset($habitat["comment"])):?>
                    <h4>Commentaire : </h4>
                    <p><?= $habitat["comment"] ?></p>
                <?php endif ?>
                

            </div>
        <?php endif ?>
    <?php endforeach?>
<?php endif ?>