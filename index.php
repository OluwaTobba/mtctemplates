<?php
    require 'api/config.php';

    try {
        $stmt = $pdo->query('SELECT * FROM template LIMIT 3');
        $templates = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }

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
    <title>MTC Templates</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <!-- <link href="style.css" rel="stylesheet"> -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="home">
    <header id="header" class="header-scroll top-header headrom">

        <nav class="navbar navbar-dark">

            <div class="container">
            
                <a class="navbar-brand" href="index.php">MTC TEMPLATES</a>
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
            
                <div class="collapse navbar-toggleable-md float-lg-right" id="mainNavbarCollapse">

                    <ul class="nav navbar-nav">
                        <li class="nav-item"><a class="nav-link active" href="index.php">HOME <span class="sr-only">(current)</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">ABOUT</a></li>
                        <li class="nav-item"><a class="nav-link" href="templates/template-list.php">TEMPLATES</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">CONTACT</a></li>
                        <li class="nav-item"><a class="nav-link" href="admin/login.php" target="_blank">ADMIN</a></li>
                    </ul>
            
                </div>

            </div>
        </nav>

    </header>

    <section class="hero bg-image" data-image-src="/assets/img/pink-desk.png">
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

    <section class="popular">
        <div class="container">
            <div class="title text-xs-center m-b-30">
                <h2>Popular Templates Of The Month</h2>
                <p>The easiest way to get your favorite website templates among these top picks.</p>
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
                                <!-- <p><?= $thumbnailUrl; ?></p> -->
                                <img src="<?php echo $thumbnailUrl; ?>" alt="<?php echo htmlspecialchars($template['name']); ?>">
                            </div>

                            <div class="content">
                                <h5><a href="<?= htmlspecialchars($template['preview_link']); ?>" target="_blank"><?= htmlspecialchars($template['name']); ?></a></h5>
                                <div class="product-name"><?= htmlspecialchars($template['description']); ?></div>
                                <div class="price-btn-block">
                                    <span class="price">$<?= htmlspecialchars($template['price']); ?></span>
                                    <a href="cart.php?id=<?= htmlspecialchars($template['id']); ?>" class="btn theme-btn-dash pull-right">Add To Cart</a>
                                </div>
                            </div>
                            
                        </div>

                    </div>                                     
                
                <?php endforeach; ?>
            </div>
            <div class="view-more">
                <button class="btn theme-btn-dash pull-right view-more-btn"><a href="templates/template-list.php">View More</a></button>
            </div>
        </div>
    </section>

    <section class="how-it-works">
        <div class="container">
            <div class="text-xs-center">
                <h2>Easy to Download</h2>
                <div class="row how-it-works-solution">
                    <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col1">
                        <div class="how-it-works-wrap">
                            <div class="step step-1">
                                <div class="icon" data-step="1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                                </div>
                                <h3>Choose a Template</h3>
                                <p>We"ve got your covered with menus from a variety of delivery restaurants online.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col2">
                        <div class="how-it-works-wrap">
                            <div class="step step-1">
                                <div class="icon" data-step="2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="20.5" r="1"/><circle cx="18" cy="20.5" r="1"/><path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1"/></svg>
                                </div>
                                <h3>Add to Cart and Check-out</h3>
                                <p>We"ve got your covered with a variety of delivery restaurants online.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col3">
                        <div class="how-it-works-wrap">
                            <div class="step step-1">
                                <div class="icon" data-step="3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"> <circle cx="12" cy="12" r="10"/><path d="M16 12l-4 4-4-4M12 8v7"/></svg> 
                                </div>
                                <h3>Download</h3>
                                <p>Get your food delivered! And enjoy your meal! </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p class="pay-info">Download On Check-Out</p>
                </div>
            </div>
        </div>
    </section>

    <section class="f-a-q">

        <div class="container">

            <h1>Frequently Asked Questions (FAQs)</h1>

            <div class="topic">
                <div class="open">
                <h2 class="question">1. What is MTC TEMPLATES?</h2>
                <span class="faq-t"></span>
                </div>
                <p class="answer">MTC TEMPLATES is a platform offering a variety of templates for different purposes. Our templates are designed to be customizable and easy to use.</p>
            </div>
            <div class="topic">
                <div class="open">
                <h2 class="question">2. How do I purchase a template?</h2>
                <span class="faq-t"></span>
                </div>
                <p class="answer">You can purchase a template by browsing through our template list, adding your chosen template to the cart, and proceeding to checkout.</p>
            </div>
            <div class="topic">
                <div class="open">
                <h2 class="question">3. What payment methods do you accept?</h2>
                <span class="faq-t"></span>
                </div>
                <p class="answer">We accept a variety of payment methods including credit/debit cards, PayPal, and other popular online payment systems.</p>
            </div>
            <div class="topic">
                <div class="open">
                <h2 class="question">4. Can I get a refund if I'm not satisfied with a template?</h2>
                <span class="faq-t"></span>
                </div>
                <p class="answer">No, we do not offer a money-back guarantee. Please refer to our refund policy for more details.</p>
            </div>
            <div class="topic">
                <div class="open">
                <h2 class="question">5. How can I contact customer support?</h2>
                <span class="faq-t"></span>
                </div>
                <p class="answer">You can contact our customer support via the contact form on our website, or by emailing support@mtctemplates.com. We're here to help you 24/7.</p>
            </div>
            <div class="topic">
                <div class="open">
                <h2 class="question">6. Do you offer custom template design services?</h2>
                <span class="faq-t"></span>
                </div>
                <p class="answer">Yes, we offer custom template design services. Please contact us with your requirements and we will provide a quote and timeline for the custom design.</p>
            </div>
            <div class="topic">
                <div class="open">
                <h2 class="question">7. Are your templates responsive?</h2>
                <span class="faq-t"></span>
                </div>
                <p class="answer">All our templates are fully responsive and optimized for different devices, including desktops, tablets, and mobile phones.</p>
            </div>
            <div class="topic">
                <div class="open">
                <h2 class="question">8. Can I modify the templates after purchase?</h2>
                <span class="faq-t"></span>
                </div>
                <p class="answer">Yes, our templates are designed to be easily customizable. You can modify them as per your needs using HTML, CSS, JavaScript and React.<</p>
            </div>
            <div class="topic">
                <div class="open">
                <h2 class="question">9. Do you provide documentation for the templates?</h2>
                <span class="faq-t"></span>
                </div>
                <p class="answer">Yes, each template comes with detailed documentation to help you get started and make the necessary customizations.</p>
            </div>
            <div class="topic">
                <div class="open">
                <h2 class="question">10. Can I use the templates for commercial purposes?</h2>
                <span class="faq-t"></span>
                </div>
                <p class="answer">Yes, you can use our templates for both personal and commercial purposes. However, redistribution or reselling of the templates is not allowed.</p>
            </div>

        </div>
        
    </section>

    <footer class="footer">
        <div class="container">
        
            <div class="bottom-footer">
                <div class="row">

                    <div class="col-lg-4 col-md-6 col-sm-12 footer-top-side">
                        <h5>Crafting Your Vision, One Template at a Time.</h5>
                        <p>MTC TEMPLATES offers a wide range of customizable templates for various purposes. Our goal is to provide users with easy-to-use and versatile templates.</p>
                        <!-- <p>Made with ❤️❤️ in Nigeria</p> -->
                    </div>

                    <div class="col-lg-2 col-md-6 col-sm-12 footer-top-side2">
                        <h5>Project</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Download</a></li>
                            <li><a href="#">Special Templates</a></li>
                            <li><a href="#">All Templates</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <h5>Community</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">GitHub</a></li>
                            <li><a href="#">Template Requests</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                    
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <h5>Help</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Refunds</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Feedback</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <h5>Sitemap</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Templates</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Admin</a></li>
                        </ul>
                    </div>

                </div>
                
                <div class="footer-bottom">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#">License</a></li>
                        <li class="list-inline-item"><a href="#">Terms & Conditions</a></li>
                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="#">Refund Policy</a></li>
                        <li class="list-inline-item"><a href="#">Support</a></li>
                    </ul>
                    <p class="text-center">© <?php echo date('Y'); ?> MichTobbaCares Inc.</p>
                </div>

            </div>
        
        </div>
    </footer>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/tether.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.isotope.min.js"></script>
    <script src="assets/js/headroom.js"></script>
    <script src="assets/js/foodpicky.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script>
        $(".open").click(function() {
            var container = $(this).parents(".topic");
            var answer = container.find(".answer");
            var trigger = container.find(".faq-t");
        
            answer.slideToggle(200);
        
            if (trigger.hasClass("faq-o")) {
            trigger.removeClass("faq-o");
            } else {
            trigger.addClass("faq-o");
            }
        
            if (container.hasClass("expanded")) {
            container.removeClass("expanded");
            } else {
            container.addClass("expanded");
            }
        });
    </script>

</body>
</html>