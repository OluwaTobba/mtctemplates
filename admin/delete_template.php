<?php
    require '../api/config.php';

    if (isset($_GET['id'])) {
        $template_id = $_GET['id'];

        // Fetch the template details to get the thumbnail path
        $stmt = $pdo->prepare('SELECT thumbnail FROM template WHERE id = ?');
        $stmt->execute([$template_id]);
        $template = $stmt->fetch();

        if ($template) {
            // Delete the template record from the database
            $stmt = $pdo->prepare('DELETE FROM template WHERE id = ?');
            $stmt->execute([$template_id]);

            // Delete the thumbnail image file
            $thumbnail_path = '../uploads/' . basename($template['thumbnail']);
            if (file_exists($thumbnail_path)) {
                unlink($thumbnail_path);
            }

            echo "Template deleted successfully!";
        } else {
            echo "Template not found.";
        }
    } else {
        echo "Invalid request.";
    }

