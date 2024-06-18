<?php
    require '../api/config.php';

    try {
        $stmt = $pdo->query('SELECT * FROM template');
        $templates = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }

    // include 'header.php';
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

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/animate.css" rel="stylesheet">
    <link href="../assets/css/animsition.min.css" rel="stylesheet">
    <!-- <link href="../style.css" rel="stylesheet"> -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body class="home">

    <header id="header" class="header-scroll top-header headrom">
        <nav class="navbar navbar-dark">

            <div class="container">
            
                <a class="navbar-brand" href="index.php">MTC TEMPLATES</a>
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

    <section class="template-page">

        <section class="popular">
            <div class="container">

                <div class="title text-xs-center m-b-30">
                    <h2>Behold! All the Templates you need!</h2>
                    <p>Crafting Your Vision, One Template at a Time.</p>
                </div>

                <div class="sticky-cart">
                    <h4>Your Cart</h4>
                    <ul id="cart-items">
                        <!-- Cart items will be injected here by JavaScript -->
                    </ul>
                    <div class="cart-total">
                        <h5>TOTAL</h5>
                        <h3 id="cart-total">$0</h3>
                        <!-- <p>Download After Checkout</p> -->
                        <button class="btn btn-danger theme-btn-dash" id="checkout">Checkout</button>
                    </div>
                </div>

                <div class="row">

                    <?php foreach ($templates as $template):

                        if (!isset($template['thumbnail'])) {
                            echo "<p>Error: Thumbnail not found for template ID " . htmlspecialchars($template['id']) . "</p>";
                            continue;
                        }
                        $thumbnailUrl = 'uploads/' . htmlspecialchars($template['thumbnail']);

                    ?>
                                    
                        <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                            
                            <div class="food-item-wrap">

                                <div class="figure-wrap bg-image">
                                    <img src="<?php echo htmlspecialchars($template['thumbnail']); ?>" alt="<?php echo htmlspecialchars($template['name']); ?>">
                                </div>

                                <div class="content">
                                    <h5><a href="<?= htmlspecialchars($template['preview_link']); ?>" target="_blank"><?= htmlspecialchars($template['name']); ?></a></h5>
                                    <div class="product-name"><?= htmlspecialchars($template['description']); ?></div>
                                    <div class="price-btn-block">
                                        <span class="price">$<?= htmlspecialchars($template['price']); ?></span>
                                        <button class="btn theme-btn-dash pull-right add-to-cart" data-id="<?php echo $template['id']; ?>" data-name="<?php echo $template['name']; ?>" data-price="<?php echo $template['price']; ?>">Add to Cart</button>
                                    </div>
                                </div>
                                
                            </div>

                        </div>                                     
                    
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

    </section>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/tether.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/animsition.min.js"></script>
    <script src="../assets/js/bootstrap-slider.min.js"></script>
    <script src="../assets/js/jquery.isotope.min.js"></script>
    <script src="../assets/js/headroom.js"></script>
    <script src="../assets/js/foodpicky.min.js"></script>
    <script>
        $(document).ready(function() {
            let cart = [];

            function updateCart() {
                let cartItems = '';
                let total = 0;
                cart.forEach(item => {
                    cartItems += `<li>${item.name} - $${item.price} <span class="remove" data-id="${item.id}">Remove</span></li>`;
                    total += parseFloat(item.price);
                });
                $('#cart-items').html(cartItems);
                $('#cart-total').text('$' + total.toFixed(2));
            }

            $('.add-to-cart').on('click', function() {
                const id = $(this).data('id');
                const name = $(this).data('name');
                const price = $(this).data('price');

                if (!cart.some(item => item.id === id)) {
                    cart.push({ id, name, price });
                    updateCart();
                }
            });

            $(document).on('click', '.remove', function() {
                const id = $(this).data('id');
                cart = cart.filter(item => item.id !== id);
                updateCart();
            });

            $('#checkout').on('click', function() {
                if (cart.length === 0) {
                    alert('Your cart is empty. Please add items to your cart before checking out.');
                    return;
                }

                $.ajax({
                    type: 'POST',
                    url: 'store_cart.php',
                    data: { cart: cart },
                    success: function() {
                        window.location.href = 'checkout.php';
                    }
                });
            });
        });
    </script>
</body>
</html>

<?php include 'footer.php'; ?>