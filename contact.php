<!-- <?php include 'header.php'; ?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Contact Us | MTC Templates</title>

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
                        <li class="nav-item"><a class="nav-link" href="index.php">HOME</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">ABOUT</a></li>
                        <li class="nav-item"><a class="nav-link" href="templates/template-list.php">TEMPLATES</a></li>
                        <li class="nav-item"><a class="nav-link active" href="contact.php">CONTACT <span class="sr-only">(current)</span></a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="admin/login.php" target="_blank">ADMIN</a></li> -->
                    </ul>
            
                </div>

            </div>
        </nav>

    </header>

    <section class="contact-page">

        <section class="hero about-page-hero">
            <div class="hero-inner">
                <div class="container text-center hero-text font-white">
                    <h1>CONTACT US</h1>
                    <h4>We would like to hear from you!</h4>
                </div>
            </div>
        </section>

        <div class="container m-t-30">

            <?php if (isset($_GET['status'])): ?>
                <?php if ($_GET['status'] === 'success'): ?>
                    <div class="alert alert-success" role="alert" id="status-alert">
                        Your message has been sent successfully!
                    </div>
                <?php elseif ($_GET['status'] === 'error'): ?>
                    <div class="alert alert-danger" role="alert" id="status-alert">
                        There was an error sending your message. Please try again.
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="row">

                <div class="col-md-6">
                    <h3>Contact Form</h3>
                    <form action="send_contact.php" method="post">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success theme-btn-dash">Send Message</button>
                    </form>
                </div>

                <div class="location col-md-6">
                    <h3>Our Location</h3>
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509685!2d144.95592331531946!3d-37.81720997975167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577e6edb7a3e25c!2sEnvato!5e0!3m2!1sen!2sau!4v1485713452495" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>

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
                            <li><a href="about.php">About</a></li>
                            <li><a href="templates/download.php">Download</a></li>
                            <li><a href="#">Special Templates</a></li>
                            <li><a href="templates/template-list.php">All Templates</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <h5>Community</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">GitHub</a></li>
                            <li><a href="contact.php">Template Requests</a></li>
                            <li><a href="https://x.com/@mtcinc2023" target="_blank">Twitter</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                    
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <h5>Help</h5>
                        <ul class="list-unstyled">
                            <li><a href="support.php">Support</a></li>
                            <li><a href="refunds.php">Refunds</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                            <li><a href="feedback.php">Feedback</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <h5>Sitemap</h5>
                        <ul class="list-unstyled">
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="template-list.php">Templates</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                            <li><a href="admin/login.php">Admin</a></li>
                        </ul>
                    </div>

                </div>
                
                <div class="footer-bottom">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="license.php">License</a></li>
                        <li class="list-inline-item"><a href="terms_cond.php">Terms & Conditions</a></li>
                        <li class="list-inline-item"><a href="privacy_policy.php">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="refund_policy.php">Refund Policy</a></li>
                        <li class="list-inline-item"><a href="support.php">Support</a></li>
                    </ul>
                    <p class="text-center">© <?php echo date('Y'); ?> MichTobbaCares Inc.</p>
                </div>

            </div>
        
        </div>
    </footer>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/tether.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/animsition.min.js"></script>
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.isotope.min.js"></script>
    <script src="assets/js/headroom.js"></script>
    <script src="assets/js/foodpicky.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#status-alert').fadeOut('slow');
            }, 5000);
        });
    </script>
</body>
</html>