<?php
    require '../api/config.php';

    // Admin Credentials
    $username = 'mtctemp-admin247';
    $password = 'mtcinc@2023';

    // Hash Authentication
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert to Database
    $stmt = $pdo->prepare('INSERT INTO admin (username, password) VALUES (?, ?)');
    $stmt->execute([$username, $hashed_password]);

    echo "Admin Created Successfully";