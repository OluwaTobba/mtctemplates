<?php
    session_start();

    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        header('Location: template-list.php');
        exit();
    }

    require '../api/config.php';

    $cart = $_SESSION['cart'];
    $total = array_reduce($cart, function($sum, $item) {
        return $sum + $item ['price'];
    }, 0);

    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
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
    <title>Checkout | MTC Templates</title>

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

    <section class="checkout-page">
        
        <div class="container">
        <a href="template-list.php">Templates</a> / <a>Checkout</a>
            <div class="title text-xs-center m-b-30">
                <h2>Checkout</h2>
                <p>Review your cart and proceed to payment</p>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="cart">
                        <h4>Your Cart</h4>
                        <ol>
                            <?php foreach ($cart as $item): ?>
                                <li><?php echo htmlspecialchars($item['name']); ?> - $<?php echo htmlspecialchars($item['price']); ?></li>
                            <?php endforeach; ?>
                        </ol>
                        <div class="cart-total">
                            <h5>TOTAL</h5>
                            <h3>$<?php echo array_sum(array_column($cart, 'price')); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4>Payment</h4>
                    <form action="process_payment.php" method="POST" id="paymentForm">
                        <!-- Add your payment fields here -->

                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="text">Phone Number</label>
                            <input type="phone" class="form-control" id="phone" name="phone" required>
                        </div>
                        
                        <input type="hidden" name="amount" value="<?php echo $total; ?>">
                        <button type="submit" class="btn btn-success theme-btn-dash">Proceed to Payment</button>
                    </form>
                </div>
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
