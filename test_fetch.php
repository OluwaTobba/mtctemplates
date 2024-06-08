<?php
    require 'api/config.php';

    $stmt = $pdo->query("SELECT * FROM template");
    $templates = $stmt->fetchAll();

    foreach ($templates as $template) {
        echo '<h2>' . htmlspecialchars($template['name']) . '</h2>';
        echo '<p>' . htmlspecialchars($template['description']) . '</p>';
        echo '<p>Price: $' . htmlspecialchars($template['price']) . '</p>';
    }
