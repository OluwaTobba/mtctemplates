<?php
    session_start();
    if (!isset($_SESSION['admin_id'])) {
        header("Location: login.php");
        exit;
    }
    require '../api/config.php';

    include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        main {
            padding: 20px;
            max-width: 900px;
            margin: 30px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        .heading {
            text-align: center;
        }

        .card {
            padding: 20px;
            margin: 20px 0;
            background-color: #fafafa;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .card h3 {
            margin-top: 0;
            color: #007bff;
        }

        .card p {
            color: #555;
        }

        .card a {
            color: #5e3bcd;
            text-decoration: none;
            font-weight: bold;
        }

        .card a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <main>
        
        <div class="heading">
            <h2>Welcome To The Admin Dashboard</h2>
            <p>Control And manage the Website from here! Use the links above to navigate through the admin panel.</p>
        </div>

        <div class="card">
            <h3>Manage Templates</h3>
            <p>In the <a href="manage_templates.php">Manage Templates</a> section, you can add, edit, and delete website templates. Make sure to keep the templates updated and remove any outdated ones.</p>
        </div>
        
        <div class="card">
            <h3>Manage Users</h3>
            <P>Coming soon: Details about users who have access to the website.</P>
            <!-- <p>The <a href="manage_users.php">Manage Users</a> section allows you to view and manage the users who have access to the website. You can add new users, edit their details, and remove inactive accounts.</p> -->
        </div>
        
        <div class="card">
            <h3>Site Analytics</h3>
            <p>Coming soon: Detailed analytics about the website's performance, user interactions, and more.</p>
        </div>

    </main>

</body>
</html>

<?php include 'footer.php'; ?>