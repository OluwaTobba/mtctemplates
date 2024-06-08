<?php
    require '../api/config.php';
    $id = $_GET['id'];
    $stmt = $pdo->prepare('SELECT * FROM template WHERE id = ?');
    $stmt->execute([$id]);
    $template = $stmt->fetch();
    include 'header.php';
?>
<main>
    <h1><?= htmlspecialchars($template['name']) ?></h1>
    <img src="<?= htmlspecialchars($template['thumbnail']) ?>" alt="<?= htmlspecialchars($template['name']) ?>" width="300">
    <p><?= htmlspecialchars($template['description']) ?></p>
    <p>Price: $<?= $template['price'] ?></p>
    <a href="<?= htmlspecialchars($template['preview_link']) ?>" target="_blank">Preview</a>
    <form action="checkout.php" method="post">
        <input type="hidden" name="template_id" value="<?= $template['id'] ?>">
        <button type="submit">Buy Now</button>
    </form>
</main>
<?php include 'footer.php'; ?>