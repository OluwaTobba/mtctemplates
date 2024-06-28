<?php
    session_start();

    // Check if the payment was successful and the cart is not empty
    if (!isset($_SESSION['payment_success']) || !$_SESSION['payment_success'] || !isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        header('Location: template-list.php');
        exit();
    }

    $purchasedTemplates = $_SESSION['cart'];

    // Clear the session variables to prevent re-download without payment
    unset($_SESSION['cart']);
    unset($_SESSION['payment_success']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Download Template | MTC Templates</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/animate.css" rel="stylesheet">
    <link href="../assets/css/animsition.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body class="home">

    <header id="header" class="header-scroll top-header headrom">
        <nav class="navbar navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="../index.php">MTC TEMPLATES</a>
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                <div class="collapse navbar-toggleable-md float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="../index.php">HOME</a></li>
                        <li class="nav-item"><a class="nav-link" href="../about.php">ABOUT</a></li>
                        <li class="nav-item"><a class="nav-link active" href="template-list.php">TEMPLATES <span class="sr-only">(current)</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="../contact.php">CONTACT</a></li>
                        <li class="nav-item"><a class="nav-link" href="../admin/login.php" target="_blank">ADMIN</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="download-page">
        <div class="container">
            <a href="template-list.php">Templates</a> / Check-out / <a>Download</a>
            <div class="title text-xs-center m-b-30">
                <h2>Download Your Template(s)</h2>
                <p>Thank You For Your Purchase! You can download your template(s) below. Hope To Do More Business With You! 😊</p>
            </div>

            <div class="row">
                <?php foreach ($purchasedTemplates as $template): ?>
                    <div class="col-xs-12 col-sm-4 col-md-4 food-item">
                        <div class="food-item-wrap">
                            <div class="figure-wrap bg-image">
                                <img src="uploads/<?= htmlspecialchars($template['thumbnail']); ?>" alt="<?= htmlspecialchars($template['name']); ?>">
                            </div>
                            <div class="content">
                                <h5><?= htmlspecialchars($template['name']); ?></h5>
                                <a href="downloads/<?= htmlspecialchars($template['file_path']); ?>" class="btn btn-success theme-btn-dash">Download</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/tether.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/animsition.min.js"></script>
    <script src="../assets/js/bootstrap-slider.min.js"></script>
    <script src="../assets/js/jquery.isotope.min.js"></script>
    <script src="../assets/js/headroom.js"></script>
    <script src="../assets/js/foodpicky.min.js"></script>
</body>
</html>

<?php include 'footer.php'; ?>