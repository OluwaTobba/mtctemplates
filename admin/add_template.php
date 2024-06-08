<?php
    session_start();
    if (!isset($_SESSION['admin_id'])){
        header('Location: login.php');
        exit;
    }
    require '../api/config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $template_name = $_POST['template_name'];
        $template_description = $_POST['template_description'];
        $template_price = $_POST['template_price'];
        $thumbnail_image = $_FILES['thumbnail_image'];
        $template_file = $_FILES['template_file'];
        $preview_link = $_POST['preview_link'];

        $upload_dir = '../uploads/';
        $thumbnail_path = $upload_dir . basename($thumbnail_image['name']);
        $file_path = $upload_dir . basename($template_file['name']);

        $thumbnail_success = move_uploaded_file($thumbnail_image['tmp_name'], $thumbnail_path);
        $file_success = move_uploaded_file($template_file['tmp_name'], $file_path);

        if ($thumbnail_success && $file_success) {
            $stmt = $pdo->prepare('INSERT INTO template (name, description, price, thumbnail, preview_link, file_path) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute([$template_name, $template_description, $template_price, $thumbnail_path, $preview_link, $file_path]);
    
            echo "Template added successfully!";
            header("Location: manage_templates.php");
        } else {
            echo "Error uploading file(s).";
        }
    }

    // include 'header.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add A Template | Admin Dashboard - MTC Templates</title>
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
        height: 150px;
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

    <h2>ADD A TEMPLATE TO THE WEBSITE</h2>
    <h4><a class="btn" href="manage_templates.php">Manage Templates</a></h4>

    <form method="post" enctype="multipart/form-data">

        <label for="name">Template Name:</label>
        <input type="text" id="name" name="template_name" required>

        <label for="price">Template Description:</label>
        <textarea id="description" name="template_description" required></textarea>

        <label for="price">Price:</label>
        <input type="number" id="price" name="template_price" required>

        <label for="image">Upload Image</label>
        <label for="image" class="file-input-label">Choose Image</label>
        <input type="file" id="image" name="thumbnail_image" accept="image/*" required><br>

        <label for="file">Upload Template File</label>
        <label for="file" class="file-input-label">Choose File</label>
        <input type="file" id="file" name="template_file" required><br>

        <label for="preview_link">Preview Link:</label>
        <input type="url" id="preview_link" name="preview_link" required> <br>

        <button type="submit" class="btn-2">Upload Template 😀</button>

    </form>

</main>

<?php include 'footer.php'; ?>