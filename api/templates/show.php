<?php
    header('Content-Type: application/json');
    require '../config.php';

    $id = $_GET['id'];
    $stmt = $pdo->prepare('SELECT * FROM template WHERE id = ?');
    $stmt->execute([$id]);
    $template = $stmt->fetch();

    echo json_encode($template);