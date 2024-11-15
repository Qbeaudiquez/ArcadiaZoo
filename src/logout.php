<?php
session_start();
session_unset();
session_destroy();


header("Location: ../public/html/main/index.php");
exit;
?>