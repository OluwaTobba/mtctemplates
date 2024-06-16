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
    <h1>TEMPLATES</h1>
    <ul>
        <?php foreach ($templates as $template): ?>
        <li>
            <img src="<?= htmlspecialchars($template['thumbnail']) ?>" alt="<?= htmlspecialchars($template['name']) ?>" width="100">
            <a href="template-detail.php?id=<?= $template['id'] ?>">
                <?= htmlspecialchars($template['name']) ?> - $<?= $template['price'] ?>
            </a>
            <a href="<?= htmlspecialchars($template['preview_link']) ?>" target="_blank">Preview</a>
        </li>
        <?php endforeach; ?>
    </ul>

    <!-- <section class="popular">
        <div class="container">
            <div class="title text-xs-center m-b-30">
                <h2>Go Ahead! Select Your Choice!</h2>
                <p>The easiest way to get your favorite website templates among these top picks.</p>
            </div>
            <div class="row">
                <?php foreach ($templates as $template):?>
                                
                    <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                        
                        <div class="food-item-wrap">

                            <div class="figure-wrap bg-image">
                                <img src="<?= htmlspecialchars($template['thumbnail']) ?>" alt="<?= htmlspecialchars($template['name']) ?>">
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
    </section> -->
</body>
</html>

<?php include 'footer.php'; ?>