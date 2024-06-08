<?php
    header('Content-Type: application/json');
    require '../config.php';

    $stmt = $pdo->query("SELECT * FROM template");
    $templates = $stmt->fetchAll();

    echo json_encode($templates);