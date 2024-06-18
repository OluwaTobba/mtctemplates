<?php
    require '../api/config.php';

    try {
        $stmt = $pdo->query('SELECT * FROM template');
        $templates = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }

    // include '../header.php';
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
    <title>Templates | MTC Templates</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <!-- <link href="style.css" rel="stylesheet"> -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="home">

    <section class="contact-page">

    <section class="hero bg-image" style="background-image: url('assets/img/footer-bg.png');">
        <div class="hero-inner">
            <div class="container text-center hero-text font-white">
                <h1>Choose, Check-Out & Download </h1>
                
                <div class="banner-form">
                    <!-- <form class="form-inline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </form> -->
                </div>

                <div class="steps">
                    <div class="step-item step1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                        <h4><span style="color:white;">1. </span>Choose Template</h4>
                    </div>
            
                    <div class="step-item step2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="20.5" r="1"/><circle cx="18" cy="20.5" r="1"/><path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1"/></svg>
                        <h4><span style="color:white;">2. </span>Add to Cart & Check-Out</h4>
                    </div>
            
                    <div class="step-item step3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"> <circle cx="12" cy="12" r="10"/><path d="M16 12l-4 4-4-4M12 8v7"/></svg>
                        <h4><span style="color:white;">3. </span>Download</h4>
                    </div>
                </div>
            
            </div>
        </div>
    </section>



    </section>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/tether.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.isotope.min.js"></script>
    <script src="assets/js/headroom.js"></script>
    <script src="assets/js/foodpicky.min.js"></script>
</body>
</html>

<?php include 'footer.php'; ?>