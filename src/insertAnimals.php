<?php if (isset($_GET["habitat"])): ?>
    <?php foreach ($habitats as $habitat): ?>
        <?php $habitat["identifier"] = "habitat{$habitat['habitat_id']}"; ?>

        <?php if ($_GET["habitat"] === $habitat["identifier"]): ?>
            <?php foreach ($animals as $animal): ?>
                <?php if ($animal["habitat_id"] === $habitat['habitat_id']): ?>
                    <div class="cards">
                        <h4 class="animalName">Nom : <?= htmlspecialchars($animal["name"]) ?></h4>
                        <img class="animalImg" src="../../../asset/img_animals/<?= htmlspecialchars($animal["animal_id"]) ?>.png" alt="Image de l'animal">
                        <button class="showDisplay" data-animal-id="<?= $animal['animal_id'] ?>">Clic pour plus de détail</button>

                        <?php
                        
                        $animalReports = array_filter($reports, fn($report) => $report["animal_id"] === $animal["animal_id"]);
                        ?>

                        <?php if (!empty($animalReports)): ?>
                            <?php foreach ($animalReports as $report): ?>
                                <div class="report">
                                    <h4 class="animalRace">Race : <?= htmlspecialchars($animal["race"]) ?></h4>
                                    <h4 class="animalHabitat">Habitat : <?= htmlspecialchars($habitat["name"]) ?></h4>
                                    <h4 class="vetReport">Rapport du vétérinaire</h4>
                                    <p class="animalEtat">État de l'animal : </p>
                                    <p class="animalFood">Alimentation : <?= htmlspecialchars($report["food"]) ?></p>
                                    <p class="animalFoodWeight">Quantité : <?= htmlspecialchars($report["weight"]) ?></p>
                                    <p>Détails : <?= htmlspecialchars($report["detail"]) ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="report">
                                <h4 class="animalRace">Race : <?= htmlspecialchars($animal["race"]) ?></h4>
                                <h4 class="animalHabitat">Habitat : <?= htmlspecialchars($habitat["name"]) ?></h4>
                                <p class="vetReport">Aucun rapport vétérinaire disponible pour le moment.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
