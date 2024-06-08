<?php
session_start();
if (isset($_SESSION['admin_id'])) {
    header('Location: dashboard.php');
    exit;
}
require '../api/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admins WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['username' => $username]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['id'];
            header('Location: dashboard.php');
            exit;
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Invalid Login Details.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ccc;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            margin: 0;
            padding: 0;
            /* display: flex;
            justify-content: center;
            align-items: center; */
            height: 100vh;
        }
        .container {
            position: relative;
            z-index: 1;
            max-width: 500px;
            margin: 0 auto;
        }
        .container .info {
            margin: 50px auto;
            text-align: center;
        }
        .container h1 {
            display: block;
            font-size: 2em;
            margin-block-start: 0.67em;
            margin-block-end: 0.67em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
            unicode-bidi: isolate;
        }

        .login-container {
            position: relative;
            z-index: 1;
            background: #ffffff;
            max-width: 300px;
            margin: 0 auto 100px;
            margin-top: 50px;
            padding: 30px;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            border-bottom-left-radius: 3px;
            border-bottom-right-radius: 3px;
            text-align: center;
        }
        .login-container .thumbnail {
            background: #5c4ac7;
            width: 150px;
            height: 150px;
            margin: 0 auto 30px;
            padding: 50px 30px;
            border-top-left-radius: 100%;
            border-top-right-radius: 100%;
            border-bottom-left-radius: 100%;
            border-bottom-right-radius: 100%;
            box-sizing: border-box;
        }
        .login-container .thumbnail img {
            display: block;
            width: 100%;
        }
        .login-container h1 {
            margin-bottom: 20px;
            color: #5e3bcd;
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            display: none;
        }
        .form-group input {
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 10px;
            padding: 15px;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            border-bottom-left-radius: 3px;
            border-bottom-right-radius: 3px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .form-group input:focus {
            border-color: #5e3bcd;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #5e3bcd;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #4b2fa1;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="info">
    <h1>Welcome Back, Admin!</h1>
    </div>
</div>

    <div class="login-container">

        <!-- <h1>Welcome Back, Admin!</h1> -->

        <div class="thumbnail">
            <img src="../assets/img/admin.png" alt="admin">
        </div>

        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>

    </div>

</body>
</html>
