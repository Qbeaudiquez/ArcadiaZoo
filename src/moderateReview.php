<?php require_once(__DIR__ . "/../public/html/header-footer/header.php"); ?>

<?php
if (!isset($_POST['action']) || !isset($_POST['id'])) {
    die("Requête invalide");
}

$action = $_POST['action'];
$id = (int)$_POST['id'];

if ($action === 'keep') {

    $stmt = $mysqlClient->prepare("UPDATE review SET isVisible = 1 WHERE review_id = :id");
    $stmt->execute([':id' => $id]);
    echo "L'avis a été conservé avec succès.";
} elseif ($action === 'delete') {

    $stmt = $mysqlClient->prepare("DELETE FROM review WHERE review_id = :id");
    $stmt->execute([':id' => $id]);
    echo "L'avis a été supprimé avec succès.";
} else {
    echo "Action non reconnue.";
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>
