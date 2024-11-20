<script src="../../js/dashbord/searchAnimalInput.js" defer></script>
<?php foreach ($habitats as $habitat): ?>
    <?php foreach ($animals as $animal): ?>
        <?php if ($habitat["habitat_id"] === $animal["habitat_id"]): ?>
            <div class="cancelAnimal animalCard" data-name='<?= htmlspecialchars($animal['name']) ?>'>
                <?php if($adminAccess):?>
                    <form method="POST" action="../../../src/moderateAnimal.php">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?= $animal['animal_id'] ?>">
                        <button type="submit">Supprimer</button>
                    </form>
                <?php endif; ?>
                
                <form class="formulaire cards" method="post" action="../../../src/moderateAnimal.php" enctype="multipart/form-data" >
                    <h5 class="inputInfo">Nom : 
                        <?php if ($vetAccess || $employeAcces): ?>
                            <?= $animal["name"] ?>
                        <?php endif; ?>
                        <?php if ($adminAccess): ?>
                            <input type="text" name="animalName" id="animalName" value="<?= htmlspecialchars($animal['name']) ?>">
                        <?php endif; ?>
                    </h5>
                    <h5 class="inputInfo">Race : 
                        <?php if ($vetAccess || $employeAcces): ?>
                            <?= $animal["race"] ?>
                        <?php endif; ?>
                        <?php if ($adminAccess): ?>
                            <input type="text" name="animalRace" id="animalRace" value="<?= htmlspecialchars($animal['race']) ?>">
                        <?php endif; ?>
                    </h5>

                    <img class="imgAnimal" src="/zoo-arcadia/asset/img_animals/<?= $animal["animal_id"] ?>.png" alt="photo <?= htmlspecialchars($animal["race"]) ?>">

                    <?php if ($adminAccess): ?>
                        <input type="file" name="imgAnimal" id="imgAnimal" class="animalImgUpdate">
                    <?php endif; ?>

                    <h4>Rapport de l'employé(e) :</h4>
                    <?php 
                    $lastMeal = '';
                    $lastMealDate = '';
                    foreach ($employeReports as $employeReport) {
                        if ($employeReport["animal_id"] === $animal["animal_id"]) {
                            $lastMeal = $employeReport["last_meal"];
                            $lastMealDate = $employeReport["last_passage"];
                            break;
                        }
                    }
                    ?>
                    <p class="inputInfo">Dernier repas : 
                        <?php if ($vetAccess): ?>
                            <?= htmlspecialchars($lastMeal) ?>
                        <?php endif; ?>
                        <?php if ($adminAccess || $employeAcces): ?>
                            <input type="text" name="lastMeal" id="lastMeal" value="<?= htmlspecialchars($lastMeal) ?>">
                        <?php endif; ?>
                    </p>
                    <p class="inputInfo">Date : 
                        <?php if ($vetAccess): ?>
                            <?= htmlspecialchars($lastMealDate) ?>
                        <?php endif; ?>
                        <?php if ($adminAccess || $employeAcces): ?>
                            <input type="date" name="lastMealDate" id="lastMealDate" value="<?= htmlspecialchars($lastMealDate) ?>">
                        <?php endif; ?>
                    </p>

                    <h4>Rapport du vétérinaire :</h4>
                    <?php 
                    $animalEtat = '';
                    $animalDetail = '';
                    $lastPassage = '';
                    $food = '';
                    $weight = '';
                    foreach ($reports as $report) {
                        if ($report["animal_id"] === $animal["animal_id"]) {
                            $animalEtat = $report["etat"];
                            $animalDetail = $report["detail"];
                            $lastPassage = $report["date"];
                            $food = $report["food"];
                            $weight = $report["weight"];
                            break;
                        }
                    }
                    ?>
                    <p class="inputInfo">Etat de l'animal : 
                        <?php if ($employeAcces): ?>
                            <?= htmlspecialchars($animalEtat) ?>
                        <?php endif; ?>
                        <?php if ($adminAccess || $vetAccess): ?>
                            <input type="text" name="animalEtat" id="animalEtat" value="<?= htmlspecialchars($animalEtat) ?>">
                        <?php endif; ?>
                    </p>
                    <h5>Détail : </h5>
                        <?php if ($employeAcces): ?>
                            <?= htmlspecialchars($animalDetail) ?>
                        <?php endif; ?>
                        <?php if ($adminAccess || $vetAccess): ?>
                            <textarea class="animalDetail" name="animalDetail" id="animalDetail"><?= htmlspecialchars($animalDetail) ?></textarea>
                        <?php endif; ?>
                    
                    <p class="inputInfo">Date du dernier passage : 
                        <?php if ($employeAcces): ?>
                            <?= htmlspecialchars($lastPassage) ?>
                        <?php endif; ?>
                        <?php if ($adminAccess || $vetAccess): ?>
                            <input type="date" name="lastPassage" id="lastPassage" value="<?= htmlspecialchars($lastPassage) ?>">
                        <?php endif; ?>
                    </p>
                    <p class="inputInfo">Nourriture recommandée : 
                        <?php if ($employeAcces): ?>
                            <?= htmlspecialchars($food) ?>
                        <?php endif; ?>
                        <?php if ($adminAccess || $vetAccess): ?>
                            <input type="text" name="food" id="food" value="<?= htmlspecialchars($food) ?>">
                        <?php endif; ?>
                    </p>
                    <p class="inputInfo">Quantité : 
                        <?php if ($employeAcces): ?>
                            <?= htmlspecialchars($weight) ?>
                        <?php endif; ?>
                        <?php if ($adminAccess || $vetAccess): ?>
                            <input type="text" name="weight" id="weight" value="<?= htmlspecialchars($weight) ?>">
                        <?php endif; ?>
                    </p>

                    <input type="hidden" name="id" value="<?= htmlspecialchars($animal['animal_id']) ?>">
                    <button id="validBtn-<?= $animal['animal_id'] ?>" type="submit">Valider</button>
                </form>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endforeach; ?>
