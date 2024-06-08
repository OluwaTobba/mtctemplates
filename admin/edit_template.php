<?php
    session_start();
    if (!isset($_SESSION['admin_id'])){
        header('Location: login.php');
        exit;
    }
    require '../api/config.php';

    $template_id = $_GET['id'];
    $stmt = $pdo->prepare('SELECT * FROM template WHERE id =?');
    $stmt->execute([$template_id]);
    $template = $stmt->fetch();

    if (!$template) {
        die('Template not found.');
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $template_name = $_POST['template_name'];
        $template_description = $_POST['template_description'];
        $template_price = $_POST['template_price'];
        $preview_link = $_POST['preview_link'];
        $thumbnail = $_FILES['thumbnail'];
        $template_file = $_FILES['template_file'];

        // Thumbnail Upload
        if ($thumbnail['size'] > 0) {
            $upload_dir = '../uploads/';
            $thumbnail_path = $upload_dir . basename($thumbnail['name']);

            move_uploaded_file($thumbnail['tmp_name'], $thumbnail_path);
        } else {
            $thumbnail_path = $template['thumbnail'];
        }

        // Template File Upload
        if ($template_file['size'] > 0) {
            $upload_dir = '../uploads/';
            $file_path = $upload_dir . basename($template_file['name']);

            move_uploaded_file($template_file['tmp_name'], $file_path);
        } else {
            $file_path = $template['file_path'];
        }

        // if ($_FILES['thumbnail']['error'] == UPLOAD_ERR_OK) {
        //     $upload_dir = '../uploads/';
        //     $upload_file = $upload_dir . basename($_FILES['thumbnail']['name']);
        //     if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $upload_file)) {
        //         $thumbnail = $upload_file;
        //     } else {
        //         echo 'Error uploading file.';
        //         exit;
        //     }
        // }

        $stmt = $pdo->prepare('UPDATE template SET name = ?, description = ?, price = ?, thumbnail = ?, preview_link = ?, file_path = ? WHERE id = ?');
        $stmt->execute([$template_name, $template_description, $template_price, $thumbnail_path, $preview_link, $file_path, $template_id]);

        echo 'Template updated successfully';
        header("Location: manage_templates.php");
        exit;
    }

    // include 'header.php';
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Current Template | Admin Dashboard - MTC Templates</title>
</head>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f0f2f5;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #5e3bcd;
        color: white;
        padding: 10px 20px;
        text-align: center;
    }

    nav a {
        color: white;
        text-decoration: none;
        margin: 0 15px;
    }
    nav a:hover {
        text-decoration: underline;
    }

    main {
        padding: 20px;
        max-width: 600px;
        margin: 20px auto;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    h2 {
        color: #5e3bcd;
        margin-bottom: 20px;
        text-align: center;
        margin-bottom: 30px;
    }

    h4 a {
        color: #5e3bcd;
        margin-bottom: 20px;
        text-decoration: none;
    }
    h4 a:hover {
        text-decoration: underline;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 10px;
        color: #333;
    }

    input, textarea {
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    textarea {
        height: 170px;
    }

    input[type="file"] {
        display: none;
    }

    .file-input-label {
        padding: 10px;
        background-color: #0b6623;
        color: white;
        text-align: center;
        border-radius: 4px;
        cursor: pointer;
        margin-bottom: 15px;
    }

    .btn {
        padding: 10px 15px;
        color: white;
        background-color: #5e3bcd;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }
    .btn:hover {
        background-color: #4b2fa1;
    }

    .btn-2 {
        padding: 10px 15px;
        font-size: 18px;
        font-weight: 700;
        color: white;
        background-color: #5e3bcd;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }
    .btn-2:hover {
        background-color: #4b2fa1;
    }
</style>

<header>
    <h1>Admin Dashboard</h1>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="manage_templates.php">Manage Templates</a>
        <a href="../index.php">Go to Website</a>
        <!-- <a href="manage_users.php">Manage Users</a> -->
        <a href="logout.php">Logout</a>
    </nav>
</header>

<main>
    <h2>EDIT THIS TEMPLATE</h2>
    <h4><a class="btn" href="manage_templates.php">Go Back</a></h4>

    <form method="post" enctype="multipart/form-data">

        <label for="name">Edit Template Name:</label>
        <input type="text" name="template_name" value="<?= htmlspecialchars($template['name']) ?>" required>

        <label for="name">Edit Template Description:</label>
        <textarea id="description" name="template_description" required><?= htmlspecialchars($template['description']) ?></textarea>

        <label for="name">Edit Template Price:</label>
        <input type="number" name="template_price" value="<?= htmlspecialchars($template['price']) ?>" required>

        Current Image: <img src="<?php echo htmlspecialchars($template['thumbnail']); ?>" alt="<?= htmlspecialchars($template['name']) ?>" width="50"> <br>
        <label for="image">Upload New Image: </label>
        <label for="image" class="file-input-label">Choose Image</label>
        <input type="file" id="image" name="thumbnail" accept="image/*"> <br>

        Current Template File: <?php echo htmlspecialchars(basename($template['file_path'])); ?> <br>
        <label for="file">Upload New Template File:</label> 
        <label for="file" class="file-input-label">Choose File</label>
        <input type="file" id="file" name="template_file"> <br>

        <label for="name">Edit Preview Link:</label>
        <input type="url" name="preview_link" value="<?= htmlspecialchars($template['preview_link']) ?>" required><br>

        <button type="submit" class="btn btn-2">Update Template</button>
    </form>
</main>

<?php include 'footer.php'; ?>