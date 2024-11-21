<?php require_once(__DIR__ . "/variables.php"); ?>

<?php
if (isset($_POST['animal_key'])) {
    $animal_id = $_POST['animal_key'];

    try {
        $stmt = $mysqlClient->prepare("UPDATE target_value SET value = value + 1 WHERE animal_id = :animal_id");
        $stmt->bindParam(':animal_id', $animal_id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo "Mise à jour effectuée avec succès.";
        } else {
            echo "Erreur lors de la mise à jour.";
        }
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour : " . $e->getMessage();
    }
}
?>
