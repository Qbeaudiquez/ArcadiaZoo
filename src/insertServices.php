<script src="../../../public/js/dashbord/hiddenForm.js" defer></script>

<?php if (isset($_GET['service'])) : ?>

<?php foreach ($services as $service) : ?>
    <?php $service["identifier"] = "service{$service["service_id"]}"; ?>

    <?php if ($_GET['service'] === "services" || $_GET['service'] === "dashbord") : ?>
        <div class='cards'>
            <h3><?php echo htmlspecialchars($service["name"]); ?></h3>

            <?php if($_GET['service'] === "services" ){
                echo "<a href='/zoo-arcadia/public/html/main/services.php?service={$service['identifier']}#scrolldown'>";}?>
                <img src='../../../asset/img_service/<?php echo htmlspecialchars($service['identifier']); ?>.png' alt='photo service'>
            <?php if($_GET['service'] === "services" ){
                echo "</a>";}?>
        
            <?php if ($_GET['service'] === "dashbord") : ?>
                <h3>Description : </h3>
                <p><?php echo $service['description']; ?></p>
                    <form class="editServiceForm formulaire" method="POST" action="../../../src/moderateServices.php" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($service['service_id']); ?>">

                        <label for="serviceName">Nom du service</label>
                        <input type="text" name="serviceName" id="serviceName" value="<?= htmlspecialchars($service['name']); ?>" required>

                        <label for="serviceDesc">Description</label>
                        <textarea name="serviceDesc" id="serviceDesc" required><?= htmlspecialchars($service['description']); ?></textarea>

                        <label for="image">Choisir une image :</label>
                        <input type="file" name="image" id="image" accept="image/*">

                        <button type="submit">Editer</button>
                    </form>
                    <form method="POST" action="../../../src/moderateServices.php">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?= $service['service_id'] ?>">
                        <button type="submit">Supprimer</button>
                    </form>
            <?php endif ?>
        </div>
    <?php endif; ?>

    <?php if ($_GET['service'] === $service["identifier"]) : ?>
        <div class='cardIndivContainer'>
            <div class='indivImg'>
                <img src='../../../asset/img_service/<?php echo htmlspecialchars($service['identifier']); ?>.png' alt='photo service'>
            </div>
            <div class='indivContent'>
                <h3 class='indicTitle'><?php echo htmlspecialchars($service["name"]); ?></h3>
                <p class='indivText'><?php echo htmlspecialchars($service["description"]); ?></p>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>

<?php endif; ?>
