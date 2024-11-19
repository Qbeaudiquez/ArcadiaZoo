<?php if (isset($_GET["habitat"])): ?>
    <?php foreach ($habitats as $habitat): ?>
        <?php $habitat["identifier"] = "habitat{$habitat['habitat_id']}"; ?>

        <?php if ($_GET["habitat"] === $habitat["identifier"] || $_GET["habitat"] === "dashbord"): ?>
            <?php foreach ($animals as $animal): ?>
                <?php if ($animal["habitat_id"] === $habitat['habitat_id']): ?>
                    <div class="cards">
                        <h4 class="animalName">Nom : <?= htmlspecialchars($animal["name"]) ?></h4>
                        <img class="animalImg" src="../../../asset/img_animals/<?= htmlspecialchars($animal["animal_id"]) ?>.png" alt="Image de l'animal">
                        <button class="showDisplay">Clic pour plus de détail</button>
                        <?php foreach ($reports as $report): ?>

                            <?php if ($report["animal_id"] === $animal['animal_id']): ?>
                                <?php if ($_GET["habitat"] === $habitat["identifier"]): ?>
                                    
                                <?php endif; ?>
                                
                                <div class="report">
                                    <h4 class="animalRace">Race : <?= htmlspecialchars($animal["race"]) ?></h4>
                                    <p class="etat">État de l'animal : <?= htmlspecialchars($report["etat"]) ?></p>
                                    <p>Détails : <?= htmlspecialchars($report["detail"]) ?></p>

                                    <?php foreach ($employeReports as $employeReport): ?>
                                        <?php if ($employeReport["animal_id"] === $animal["animal_id"]): ?>
                                            <h4 class="reportTitle">Compte rendu Employé(e)</h4>
                                            <p>Dernier repas : <?= htmlspecialchars($employeReport["last_meal"]) ?></p>
                                            <p>Date Dernier repas : <?= htmlspecialchars($employeReport["last_passage"]) ?></p>
                                        <?php endif; ?>
                                        
                                    <?php endforeach; ?>
                                    
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>