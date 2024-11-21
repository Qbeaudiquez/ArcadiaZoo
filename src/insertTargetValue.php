<?php if($adminAccess):?>
    <h3>Compteurs de vue par animaux</h3>
    <div class="dashbordContainer targetValue">
        <div class="compterContainer">
            <?php foreach($animals as $animal):?>
                <?php foreach($targets as $target):?>
                    <?php if($animal["animal_id"] === $target["animal_id"]) :?>
                        <div class="compter">
                            <h4><?= $animal["name"]?></h4>
                            <p><?= $target["value"]?></p>
                        </div>
                    <?php endif?>
                <?php endforeach?>    
            <?php endforeach?>
        </div>
    </div>
<?php endif?>