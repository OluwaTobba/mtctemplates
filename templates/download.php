<?php
    // echo "Thank You For Your Purchase! Hope To Do More Business With You! <a href='' download=''>Download Template</a>";

    require '../api/config.php';
    
    // if (!isset($_GET['id'])) {
    //     die('Invalid request.');
    // }
    
    $template_id = $_GET['id'];
    
    // Fetch the template details to get the file path
    $stmt = $pdo->prepare('SELECT * FROM template WHERE id = ?');
    $stmt->execute([$template_id]);
    $template = $stmt->fetch();
    
    if (!$template) {
        die('Template not found.');
    }
    
    $file_path = $template['file_path'];
    
    if (!file_exists($file_path)) {
        die('File not found.');
    }
    
    // Serve the file for download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file_path));
    readfile($file_path);
    exit;
    