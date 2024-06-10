<?php
    session_start();
    if (!isset($_SESSION['admin_id'])) {
        header('Location: login.php');
        exit;
    }
    require '../api/config.php';

    if (isset($_POST['delete_template'])) {
        $id = $_POST['template_id'];
        $stmt = $pdo->prepare('DELETE FROM template WHERE id = ?');
        $stmt->execute([$id]);
    }

    $stmt = $pdo->query('SELECT * FROM template');
    $templates = $stmt->fetchAll();
    // include 'header.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Templates | Admin Dashboard - MTC Templates</title>
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
        /* width: 90%; */
        max-width: 1200px;
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

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #5e3bcd;
        color: white;
    }

    img {
        max-width: 100px;
    }

    .btn {
        padding: 6px 10px;
        color: white;
        background-color: #5e3bcd;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }
    .btn:hover {
        background-color: #4b2fa1;
    }

    .btn-1 {
        background-color: #008000;
    }
    .btn-1:hover {
        background-color: #0b6623;
    }

    .btn-2 {
        padding: 8px 12px;
        margin-top: 10px;
        color: white;
        font-weight: 600;
        background-color: #FF0000;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }
    .btn-2:hover {
        background-color: #9b1003;
    }
</style>

<header>
    <h1>ADMIN DASHBOARD</h1>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="manage_templates.php">Manage Templates</a>
        <a href="../index.php" target="_blank">Go to Website</a>
        <!-- <a href="manage_users.php">Manage Users</a> -->
        <a href="logout.php">Logout</a>
    </nav>
</header>

<main>

    <h2>MANAGE ALL TEMPLATES HERE</h2>
    <h4><a class="btn" href="add_template.php">Add New Template</a></h4>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Preview Link</th>
                <th>File Path</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($templates as $template): ?>

            <tr>
                <td><?= htmlspecialchars($template['id']) ?></td>
                <td><?= htmlspecialchars($template['name']) ?></td>
                <td><?= htmlspecialchars($template['description']) ?></td>
                <td><?= $template['price'] ?></td>
                <td><img src="<?= htmlspecialchars($template['thumbnail']) ?>" alt="<?= htmlspecialchars($template['name']) ?>" width="50"></td>
                <!-- <td><?= htmlspecialchars($template['preview_link']) ?></td> -->
                <td>
                    <a href="<?php echo htmlspecialchars($template['preview_link']); ?>" target="_blank">Preview Link</a>
                </td>
                <td>
                    <a href="<?php echo htmlspecialchars($template['file_path']); ?>" target="_blank"><?php echo htmlspecialchars(basename($template['file_path'])); ?></a>
                </td>
                <td>
                    <a class="btn btn-1" href="edit_template.php?id=<?= $template['id'] ?>">Edit</a>
                    <!-- <a class="btn" href="delete_template.php?id=<?= $template['id'] ?>" onclick="return confirm('Are You Sure You Want To Delete This Template?')">Delete</a> -->
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="template_id" value="<?= $template['id'] ?>">
                        <button type="submit" name="delete_template" class="btn-2" onclick="return confirm('Are You Sure You Want To Delete This Template?')">Delete</button>
                    </form>
                </td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

</main>

<?php include 'footer.php'; ?>